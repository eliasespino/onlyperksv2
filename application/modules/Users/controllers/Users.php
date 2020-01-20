<?php
use  \Firebase\JWT\JWT; //namespace in jwt
class Users extends REST_Controller {
    private $secret ;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
          ///Allowing CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
        $nombre_fichero = APPPATH."keys/id_rsa" ;
        $gestor = fopen($nombre_fichero, "r");
        $contenido = fread($gestor, filesize($nombre_fichero));
        $this->secret=$contenido;
        fclose($gestor);

    }

    public function index_get()
    {
         $data = $this->UsersModel->getUsers();
     		 $this->response($data,200);
    }
    public function id_get($id)
    {
    		$data = $this->UsersModel->getUser($id);
     		$this->response($data,200);
    }
    public function tokenDecode_post()
    {
        $token=$this->post('token');
        try 
          { 
            $decodejwt = (array) JWT::decode($token, $this->secret, array('HS256'));
            $output['token'] = $decodejwt;
            $output['success'] = true;
            $output['code'] = 200;
             $this->response($output,200);
          } 
          catch (\Firebase\JWT\ExpiredException $e)
          { 
                $output['success'] = false;
                $output['errors'][] = $e->errorMessage();
                $output['code'] = 401;
                $this->response($output,401);
          }
    }
    public function login_post()
    {
        $user=$this->post('user');
        $pass=hash("sha256",$this->post('pass'));
        $data = $this->UsersModel->login($user,$pass);
        if (count($data)>0)
        {
            $user=$data[0];
            $date = new DateTime();
            $payload['id']           = $user["id"];
            $payload['email']        =$user["email"];
            $payload['first_name']   = $user["first_name"];
            $payload['last_name']    =   $user["last_name"];
            $payload['type']         = $user["type"];
            $payload['iat']          = $date->getTimestamp();
            $payload['exp']          = $date->getTimestamp() + 60*60;
            $output['id_token']      = JWT::encode($payload, $this->secret);
            $this->response($output,200);
        }
        else{
            $output["message"]="Authentication Failed ";
            $output["error_code"]="401";
            $this->response($output,401);
        }
       

    }
    public function isLogin_get()
    {

        try 
          { 
            //$token=$this->input->get("token");
            $token = trim(str_replace("Bearer", "", $this->input->get_request_header('Authorization'))  );
            $decodejwt = (array) JWT::decode($token, $this->secret, array('HS256'));
           $this->response($decodejwt,200);
            
          } 
          catch (\Firebase\JWT\ExpiredException $e)
          { 
                $output['success'] = false;
                $output['errors'][] = $e->errorMessage();
                $output['code'] = 401;
                $this->response($output,401);
          }

    }

}
