<?php    
use  \Firebase\JWT\JWT; //namespace in jwt 
class Test extends REST_Controller{
	 private $secret;
	public function __construct()
	{
    parent::__construct();
		$nombre_fichero = APPPATH."keys/id_rsa" ;
        $gestor = fopen($nombre_fichero, "r");
        $contenido = fread($gestor, filesize($nombre_fichero));
        $this->secret=$contenido;
        fclose($gestor);
	}
    function index()
    {
      $email="elias@collaborativeperks.com";
      $partes=explode("@", $email);
      var_dump($partes);
    }

    function checkToken_get()
    {
      $token                                 = $this->input->get("token");
      $tokenData                             = $this->decodeToken($token);

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
}