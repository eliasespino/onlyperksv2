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
          
    }
       /**
       * @api {get} /Users/id/:id Get  user information
       * @apiName id
       * @apiGroup Users
       *
       * @apiParam id  id user required.
       *
       *
       * @apiSuccess {json} Results user information.
       *
       * @apiSuccessExample Success-Response:
       *     HTTP/1.1 200 OK
       *     {
       *       "code": "200",
       *       "message": "OK",
       *       "data": {
       *             "user":[
       *                {
       *                    "id": "88",
       *                     "created": "2019-11-29 14:14:30",
       *                     "modified": "2020-01-23 10:38:15",
       *                     "first_name": "Pepito",
       *                     "last_name": "De los palotes",
       *                     "emp_number": null,
       *                     "dob": "1965-01-01",
       *                     "prefix_telephone": "34",
       *                     "telephone": "682663120",
       *                     "workphone": null,
       *                     "username": "pepito_collaborativeperks_com",
       *                     "password": "13ab622eda738da765d87cbac52b9e54bf7e4080572efb4fdc445fc6d23b8f61",
       *                     "email": "pepito@collaborativeperks.com",
       *                     "address": "",
       *                     "gender": "man",
       *                     "type": "user",
       *                     "is_paid": null,
       *                     "is_active": "1",
       *                     "is_delete": "0",
       *                     "is_sms_verified": "1",
       *                     "is_whatsapp_user": "1",
       *                     "is_subscribed_newsletter": "1",
       *                     "is_cookie": "1",
       *                     "expiration_date": null,
       *                     "about_me": "",
       *                     "platform_language": "149",
       *                     "place_id": null,
       *                     "company_id": null,
       *                     "subsidiary": null,
       *                     "is_promoted": "0",
       *                     "newsletter_frequency": "all",
       *                     "country_name": "Spain"
       *                }
       *              ]   
       *          }  
       *     }
       *
       * @apiSuccess (Success 204){json} Results User empty.
       * @apiSuccessExample No Content-Response:
       *     HTTP/1.1 204 No Content
       *     {
       *       "code": "204",
       *       "message": "No Content",
       *       "data": {}
       *     }
       * @apiError Users/id 404 userid The id of the User was not found.
       *
       * @apiErrorExample Error-Response:
       *     HTTP/1.1 404 Not Found
       *     {
       *       "code": "404",
       *       "message": "Not Found"
       *       "data": "{}"
       *     }
       */
    public function id_get($id)
    {
        $token = trim(str_replace("Bearer", "", $this->input->get_request_header('Authorization'))  );
        if ($this->checkToken($token)==true)
        {
            $user                    = $this->UsersModel->getUser($id);
            if (count($user)>0)
            {
            $output["code"]          = 200;
            $output["message"]       = "OK";
            $output["data"]          = array('user'=>$user);
            $this->response($output,200);
            }
            else
            {
            $output["code"]          = 204;
            $output["message"]       = "No Content";
            $output["data"]          = array('user'=>$user);
            $this->response($output,204);
            }
            
        }
        else
        {
            $data = $this->UsersModel->getUser($id);
            $this->response($data,401);
        }

    }
    /**
       * @api {post} Users/login Login into api
       * @apiName login
       * @apiGroup Users
       *
       * @apiParam user username required.
       *
       * @apiParam pass  password required.
       *
       * @apiSuccess {json} Results login information.
       * @apiSuccessExample Success-Response:
       *     HTTP/1.1 200 OK
       *     {
       *       "code": "200",
       *       "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9d.eyJpZCI6IjEyMyIsImVtYWlsIjoiZWxpYXNAY29sbGFib3JhdGl2ZXBlcmtzLmNvbSIsImZpcnN0X25hbWUiOiJFbGlhcyIsImxhc3RfbmFtZSI6ImVzcGlubyIsInR5cGUiOiJhZG1pbiIsImlhdCI6MTU3OTc3MzI2NywiZXhwIjoxNTc5Nzc2ODY3fQ.4MYQ8KlLXhO1ajpIdE7pAEiVV5F0-ZMQIFyiv6cE9zQ0",
       *       "data": {
       *             "user":[
       *                {
       *                    "id": "88",
       *                     "created": "2019-11-29 14:14:30",
       *                     "modified": "2020-01-23 10:38:15",
       *                     "first_name": "Pepito",
       *                     "last_name": "De los palotes",
       *                     "emp_number": null,
       *                     "dob": "1965-01-01",
       *                     "prefix_telephone": "34",
       *                     "telephone": "682663120",
       *                     "workphone": null,
       *                     "username": "pepito_collaborativeperks_com",
       *                     "password": "13ab622eda738da765d87cbac52b9e54bf7e4080572efb4fdc445fc6d23b8f61",
       *                     "email": "pepito@collaborativeperks.com",
       *                     "address": "",
       *                     "gender": "man",
       *                     "type": "user",
       *                     "is_paid": null,
       *                     "is_active": "1",
       *                     "is_delete": "0",
       *                     "is_sms_verified": "1",
       *                     "is_whatsapp_user": "1",
       *                     "is_subscribed_newsletter": "1",
       *                     "is_cookie": "1",
       *                     "expiration_date": null,
       *                     "about_me": "",
       *                     "platform_language": "149",
       *                     "place_id": null,
       *                     "company_id": null,
       *                     "subsidiary": null,
       *                     "is_promoted": "0",
       *                     "newsletter_frequency": "all",
       *                     "country_name": "Spain"
       *                }
       *              ]   
       *          }  
       *     }
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
     /**
       * @api {post} /Users/requestPassword/ Request user password
       * @apiName requestPassword_post
       * @apiGroup Users
       *
       * @apiParam email  User's emails.
       *
       *
       * @apiSuccess {json} Results login information.
       * @apiError {json} Results Failed information.
       */
    public function requestPassword_post()
    {
        $email=$this->input->post("email");
        $ci =& get_instance();
        if ($this->UsersModel->emailIsValid($email)) {
           $date = new DateTime();
            $payload['email']        = $email;
            $payload['iat']          = $date->getTimestamp();
            $payload['exp']          = $date->getTimestamp() + 60*60;
            $output['token']         = JWT::encode($payload, $this->secret);
            $site_url                = site_url('Users/forgotPassword?token='.$output['token']);
            $r["message"]            = "Mail sent";
            $r["code"]               = 200;
            $sender                  = new Mailing();
            $correo                  = new stdClass;
            $correo->from            = "info@collaborativeperks.com";
            $correo->to              = $email;
            $correo->subject         = "Reset Password";
            $correo->name            = $this->getNameByEmail($email);
            $correo->token           = $output['token']  ;
            $r["data"]               = array("mailResponse"=>$sender->send($correo));
            $this->response($r,200);
        }
        else
        {
             $data["message"] = "Invalid Email";
             $data["code"]    = 401;
             $this->response($data,401);
        }
      
   
    }
       /**
       * @api {post} /Users/forgotPassword/ reset user password
       * @apiName forgotPassword
       * @apiGroup Users
       *
       * @apiParam token  bear token.
       * @apiParam password  new password.
       *
       *
       * @apiSuccessExample {json} Success-Response:
       *     HTTP/1.1 200 OK
       *     {
       *       "message": "Password Changed",
       *       "code": "200",
       *       "data": {}
       *    
       * @apiError {json} Results Failed information.
       */
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
/*Funciones  de apoyo */


    private function getNameByEmail($email)
    {
      $user= $this->UsersModel->getNameByEmail($email);
     return $user[0]["first_name"] ;
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
    private function checkToken($token)
    {
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
}
