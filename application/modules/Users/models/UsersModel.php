<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

  function getUsers()
  {
 
    $response = array();
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $response = $q->result_array();
    return $response;
  }

  function getUser($id)
  {
    $response = array();
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $q=$this->db->get_where('core_user', array('id' => $id));
    $response = $q->result_array();
    return $response;
  }

  function login($user,$pass)
  {
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $q=$this->db->get_where('core_user', array('email' => $user,'password'=>$pass));
    $response = $q->result_array();
    return $response;
  }

  function  emailIsValid($user)
  {
    $this->db->select('*');
    $q = $this->db->get('core_user');
    $q=$this->db->get_where('core_user', array('email' => $user));
    $response = $q->result_array();
    return $response;
    if (count($response)>0)
    {
      return true;
    }
    return false ;
  }
  function changePassword($email,$password)
  {
    $data = array(
                   
                    'password' => $password,
            );

    $this->db->where('email', $email);
    $r=$this->db->update('core_user', $data);
    if ($r>0)
    {
     return true;
    }
    else
    {
      return false;
    }

  }



}