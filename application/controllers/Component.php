<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Component extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
  }


public function cpn_user_province()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/province');
		
	}
public function cpn_car_type()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_type');
		
	}
	
	public function cpn_car_brand()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_brand');
		
	}
	
	public function cpn_car_color()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_color');
		
	}
	
	public function cpn_car_plate()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/car_plate');
		
	}
	
	public function cpn_bank_list()
	{
//		$data['data'] = $this->Main_model->query_province();
		$this->load->view('component/bank_list');
		
	}
	
}
?>