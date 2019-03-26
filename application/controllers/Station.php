<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Station extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Station_model');
		
	}
	

	/************** REGION OR PLAN PRICE ******************/
	public function place_car_station(){
		$_where = array();
		$_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$menu[menu] = 'station';
		$data['station'] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION_ORTHER,$_where,$_select,$_order);
		$this->load->view('mainpage/page_header',$menu);
		$this->load->view('station/place_car_station',$data);
		$this->load->view('mainpage/page_footer');

	}
	public function add_station(){
		$_where = array();
		$_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		// $menu[menu] = 'station';
		$data['station'] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION,$_where,$_select,$_order);
		// $this->load->view('mainpage/page_header',$menu);
		$this->load->view('station/box_add_station',$data);
		// $this->load->view('mainpage/page_footer');
		
	}
	public function box_edit_station(){
		$_where = array();
		$_where['status'] = 1;
		$_select = array('*');
		
		// $menu[menu] = 'station';
		$_where = array();
    $_where[id] = $_POST[id];
   
    $_select = array('*');
    $data['station'] = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_ORTHER,$_where,$_select);
		 
		// $this->load->view('mainpage/page_header',$menu);
		$this->load->view('station/box_edit_station',$data);
		// $this->load->view('mainpage/page_footer');
		
	}
	public function save_station(){
		header('Content-Type: application/json');		
		$data = $this->Station_model->save_station();
		echo json_encode($data);
	}
	public function save_edit_station(){
		header('Content-Type: application/json');		
		$data = $this->Station_model->save_edit_station();
		echo json_encode($data);
	}
	
	
	################################ SHOP #################################
}



?>