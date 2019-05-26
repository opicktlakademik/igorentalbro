<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function loginCheck($username, $password)
  {
    // code...
    $data = $this->db->get_where('admin', array('username' => $username, 'password' => $password), 1);
    if ($data->num_rows() > 0) {
      // code...
      return $data->result_array();
    }else {
      return false;
    }

  }

  function loginChecked()
  {
    // code...
    if (!$this->session->userdata('login') OR !$this->session->userdata('id_admin')) {
      // code...
      $this->session->set_flashdata('Error', "<b style='color:red;'> Fuck Off!! Access denied!</b>");
      redirect('admin/Login');
    }
  }

  function is_loggedin()
  {
    // code...
    if ($this->session->userdata('login') AND $this->session->userdata('id_admin')) {
      // code...
      redirect('admin/dashboard');
    }
  }

}
