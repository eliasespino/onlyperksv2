<?php    
use  \Firebase\JWT\JWT; //namespace in jwt 
class Test extends MX_Controller 
{
	 private $secret;
	public function __construct()
	{
		$nombre_fichero = APPPATH."keys/id_rsa" ;
        $gestor = fopen($nombre_fichero, "r");
        $contenido = fread($gestor, filesize($nombre_fichero));
        $this->secret=$contenido;
        fclose($gestor);
	}
    function index()
    {
        echo "hola";
    }
}