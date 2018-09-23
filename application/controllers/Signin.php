<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller {
  public function __construct() {
    parent::__construct();
	$this->load->model('Main_model');
  }
  public function index() {
//   echo "123";
//	$data['res'] = $this->Main_model->check_user_signin();
//	echo json_encode($data['res']);
    $this->load->view('signin_view');
  }
  
  public function check_signin(){
  	$data['res'] = $this->Main_model->check_user_signin();
//  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function register(){
  	$data['res'] = $this->Main_model->register();
//  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function signout(){
  	
  	
  	
  }
 
//////////////////////////// End
}