<?php
/**
 * Template of Module
 *
 * @author Elias Espino
 */
class Carpooling extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CarpoolingModel');
          ///Allowing CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
    }

    function index() {
        
    }

    function getCards_get()
    {
    	$offset=$this->input->get("offset");
    	$data=$this->CarpoolingModel->getTripsCards($offset);
    	$this->response($data,200);
    }
   

}