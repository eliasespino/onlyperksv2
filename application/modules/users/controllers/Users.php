<?php
use  \Firebase\JWT\JWT; //namespace in jwt
defined('BASEPATH') OR exit('No direct script access allowed');
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

    public function index_get(){

             $data = $this->UsersModel->getUsers();
     		 $this->response($data,200);
      
      
      
    }
    public function id_get($id)
    {
    		$data = $this->UsersModel->getUser($id);
     		$this->response($data,200);

    }

    public function token_get()
    {
        // Collect data
        $date = new DateTime();
        $payload['id']      = 1;
        $payload['email']   = "elias@collaborativeperks.com";
        $payload['name']   = "Elias Espino";
        $payload['iat']     = $date->getTimestamp();
        $payload['exp']     = $date->getTimestamp() + 60;
        $output['id_token'] = JWT::encode($payload, $this->secret);
        $this->response($output,200);
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
        $this->response($data,200);
    }
    private function isLogin($token)
    {

      try 
        { 
          $decodejwt = (array) JWT::decode($token, $this->secret, array('HS256'));
          $decodejwt;
          
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
