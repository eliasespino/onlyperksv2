<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

  function getUsers(){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $response = $q->result_array();

    return $response;
  }

    function getUser($id){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $q=$this->db->get_where('core_user', array('id' => $id));
    $response = $q->result_array();

    return $response;
  }

  function login($user,$pass)
  {
    // Select record
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $q=$this->db->get_where('core_user', array('email' => $user,'password'=>$pass));
    $response = $q->result_array();
    return $response;
  }



}