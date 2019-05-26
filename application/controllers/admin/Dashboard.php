<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('security_model', 'satpam');
    $this->satpam->loginChecked();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $include['title'] = "Dashboard | IGO RENTAL BRO";
    $data['content'] = $this->load->view('admin/dashboard', $include, true);
    $this->load->view('admin/outfit', $data);
  }

}
