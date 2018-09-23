<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Car_model');
  }


public function add_car(){
		$data['res'] = $this->Car_model->add_car();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
	
public function edit_car(){
		$data['res'] = $this->Car_model->edit_car();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
	
public function change_car_often(){
		$data['res'] = $this->Car_model->change_car_often();
  		header('Content-Type: application/json');
  		echo json_encode($data['res']);
	}
public function change_status_car(){
		$data['res'] = $this->Car_model->change_status_car();
  		header('Content-Type: application/json');
  		echo json_encode($data);
	}
public function check_num_car(){
		$data['res'] = $this->Car_model->running_single_often_car();
  		header('Content-Type: application/json');
  		echo json_encode($data);
	}	
	
}
?>