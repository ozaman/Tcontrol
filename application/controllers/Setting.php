<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends CI_Controller {
  public function __construct() {
    parent::__construct();
//     $this->load->model('Main_model');
     $this->load->model('Setting_model');
    
  }
  
	public function car_type()	{
	    $_select = array('*');
	    $_order = array();
	    $_order['id'] = 'asc';
	    $data['car_type'] = $this->Main_model->fetch_data('','',"web_car_use_type",'',$_select,$_order);
	    $this->load->view('mainpage/page_header');
	    $this->load->view('setting/car_type', $data);
	    $this->load->view('mainpage/page_footer');
	}
	
	public function car_brand()	{
		$_select = array('*');
	    $_order = array();
	    $_order['id'] = 'asc';
	    $data['brand'] = $this->Main_model->fetch_data('','',"web_car_brand",'',$_select,$_order);
	    $this->load->view('mainpage/page_header');
	    $this->load->view('setting/car_brand',$data);
	    $this->load->view('mainpage/page_footer');
	}
	
	public function car_gen($id)	{
		$_select = array('*');
	    $_order = array();
	    $_where = array();
	    $_order['id'] = 'asc';
	    $_where['i_brand'] = $id;
	    $data['gen'] = $this->Main_model->fetch_data('','',"web_car_gen",$_where,$_select,$_order);
	    
	    $_select = array('*');
	    $_order = array();
	    $_where = array();
	    $_where['id'] = $id;
	    $data['brand'] = $this->Main_model->rowdata("web_car_brand",$_where,$_select);
	    
	    $this->load->view('mainpage/page_header');
	    $this->load->view('setting/car_gen',$data);
	    $this->load->view('mainpage/page_footer');
	}
	
	public function add_car_type(){
		$data['res'] = $this->Setting_model->add_car_type();
		echo json_encode($data['res']);
	}
	
	public function change_status_car_type(){
		$data['res'] = $this->Setting_model->change_status_car_type();
		echo json_encode($data['res']);
	}
	
	public function update_car_type(){
		$data['res'] = $this->Setting_model->update_car_type();
		echo json_encode($data['res']);
	}
	
	public function delete_car_type(){
		$data['res'] = $this->Setting_model->delete_car_type();
		echo json_encode($data['res']);
	}
	/**
	* *
	* 
	* @return
	*/
	public function add_car_gen(){
		$data['res'] = $this->Setting_model->add_car_gen();
		echo json_encode($data['res']);
	}
	public function change_status_car_gen(){
		$data['res'] = $this->Setting_model->change_status_car_gen();
		echo json_encode($data['res']);
	}
	public function update_car_gen(){
		$data['res'] = $this->Setting_model->update_car_gen();
		echo json_encode($data['res']);
	}
	public function delete_car_gen(){
		$data['res'] = $this->Setting_model->delete_car_gen();
		echo json_encode($data['res']);
	}
	/**
	* *
	*/
	public function add_car_brand(){
		$data['res'] = $this->Setting_model->add_car_brand();
		echo json_encode($data['res']);
	}
	public function change_status_car_brand(){
		$data['res'] = $this->Setting_model->change_status_car_brand();
		echo json_encode($data['res']);
	}
	public function update_car_brand(){
		$data['res'] = $this->Setting_model->update_car_brand();
		echo json_encode($data['res']);
	}
	public function delete_car_brand(){
		$data['res'] = $this->Setting_model->delete_car_brand();
		echo json_encode($data['res']);
	}


  //////////////////////////// End
}
?>