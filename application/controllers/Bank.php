<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Bank_model');
  }


public function add_bank(){
		$data['res'] = $this->Bank_model->add_bank();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
public function edit_bank(){
		$data['res'] = $this->Bank_model->edit_bank();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
	
public function change_status_bank(){
		$data['res'] = $this->Bank_model->change_status_bank();
  		header('Content-Type: application/json');
//  		$data['res'] = 'test';
  		echo json_encode($data['res']);
	}
public function change_bank_often(){
		$data['res'] = $this->Bank_model->change_bank_often();
  		header('Content-Type: application/json');
//  		$data['res'] = 'test';
  		echo json_encode($data['res']);
	}	
public function check_num_bank(){
		$data['res'] = $this->Bank_model->running_single_often_bank();
  		header('Content-Type: application/json');
  		echo json_encode($data);
	}	
	
}
?>