<?php
use  \Firebase\JWT\JWT; //namespace in jwt
class Example extends REST_Controller {
 	public function __construct()
	{
		parent::__construct();
		$nombre_fichero = APPPATH."keys/id_rsa" ;
        $gestor = fopen($nombre_fichero, "r");
        $contenido = fread($gestor, filesize($nombre_fichero));
        $this->secret=$contenido;
        fclose($gestor);
	}
    function index_get()
    {
    		 $date = new DateTime();
        $payload['id']      = 1;
        $payload['email']   = "elias@collaborativeperks.com";
        $payload['name']   = "Elias Espino";
        $payload['iat']     = $date->getTimestamp();
        $payload['exp']     = $date->getTimestamp() + 60;
        $output['id_token'] = JWT::encode($payload, $this->secret);
        $this->response($output,200);
    }
     
    function users_get()
    {
        // respond with information about several users
    }
}