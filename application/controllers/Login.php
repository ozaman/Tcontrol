<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Login_model');
    
  }

  public function index() {
    $this->load->view('login/index');
  }

  public function login() {
    header('Content-Type: application/json');
    $data = $this->Login_model->login();
    echo json_encode($data);

  }


  }
