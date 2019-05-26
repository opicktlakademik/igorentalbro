<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('security_model', 'satpam');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->satpam->is_loggedin();
    $this->load->view('LoginView');
  }

  function checkLogin()
  {
    // code...
    if ($_POST['username'] AND $_POST['password']) {
      // code...
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));

      $check = $this->satpam->loginCheck($username, $password);
      if ($check) {
        $data = $check[0];
        $data['login'] = true;
        $this->session->set_userdata($data);
        redirect('admin/dashboard');
      //var_dump($data);
      }else {
        $this->session->set_flashdata('Error', "<b style='color:red;'>Username or password is incorrect!</b>");
        redirect('admin/Login');
      }
    }else {
      redirect('admin/login', 'refresh');
    }
  }

  function logout()
  {
    $this->session->unset_userdata('login');
    $this->session->unset_userdata('id_admin');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('password');
    $this->session->unset_userdata('foto_admin');
    $this->session->unset_userdata('nama_admin');
    $message = "Thank you for coming, Bitch!";
    $this->session->set_flashdata('Error', $message);
    redirect('admin/login');
    // code...
  }
}
