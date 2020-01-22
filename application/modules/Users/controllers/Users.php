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
        $this->load->helpers(array('Mailing'));

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
    /**
       * @api {post} /login login into api
       * @apiName login
       * @apiGroup Users
       *
       * @apiParam user username required.
       *
       * @apiParam pass  password required.
       *
       * @apiSuccess {json} Results login information.
       * @apiError {json} Results Failed information.
       */
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
            $payload['email']        = $user["email"];
            $payload['first_name']   = $user["first_name"];
            $payload['last_name']    = $user["last_name"];
            $payload['type']         = $user["type"];
            $payload['iat']          = $date->getTimestamp();
            $payload['exp']          = $date->getTimestamp() + 60*60;
            $output["code"]          = 200;
            $output['token']         = JWT::encode($payload, $this->secret);
            $output["data"]          = array('user'=>$user);
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
                $output['message'][] = $e->errorMessage();
                $output['code'] = 401;
                $this->response($output,401);
          }

    }

    private function checkToken($token)
    {
        $tokenClean=trim(str_replace("Bearer", "", $token ));
        try
        {
               $decodejwt = (array) JWT::decode($token, $this->secret, array('HS256'));
               return true;
        }
        catch(\Firebase\JWT\ExpiredException $e)
        {
              return false;
        }
    }
    private function decodeToken($token)
    {
         try 
          { 
            $decodejwt = (array) JWT::decode($token, $this->secret, array('HS256'));
           
             return $decodejwt;
          } 
          catch (\Firebase\JWT\ExpiredException $e)
          { 
                  $output=array();
                  return $output;

          }
    }
    public function requestPassword_post()
    {
        $email=$this->input->post("email");
        echo $email;
        if ($this->UsersModel->emailIsValid($email)) {
           $date = new DateTime();
            $payload['email']        = $email;
            $payload['iat']          = $date->getTimestamp();
            $payload['exp']          = $date->getTimestamp() + 60*60;
            $output['token']         = JWT::encode($payload, $this->secret);
            $url=site_url('Users/forgotPassword?token='.$output['token']);
            $r["message"]="Mail sent";
            
            $r["code"]=200;
            $sender= new Mailing();
            $correo= new stdClass;
            $correo->from= "info@collaborativeperks.com";
            $correo->to= $email;
            $correo->subject="Reset Password";
            $correo->message=$url;
            $r["data"]=array("mailResponse"=>$sender->send($correo));
            $this->response($r,200);
        }
        else
        {
             $data["message"]="Invalid Email";
             $data["code"]=401;
              $this->response($email,401);
        }
      
   
    }
    public function forgotPassword_post()
    {
        $token=$this->input->get("token");
        $password=hash("sha256",$this->input->post('password'));
        $tokenData=$this->decodeToken($token);
        if (!empty($tokenData))
        {
            if ($this->UsersModel->changePassword($tokenData["email"],$password))
            {
                $data["message"]="Password Changed";
                $data["data"]=array();
                $data["code"]=200;
                $this->response($data,200);
            }
            else
            {
                $data["message"]="Error trying to change password";
                $data["code"]=401;
                $this->response($data,401);
            }
        }
    }

}
