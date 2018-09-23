<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
  public function __construct() {
    parent::__construct();
	$this->load->model('Main_model');
	$this->load->model('Mobile_model');
  }
  public function index() {

  }
  
  public function check_idcard(){
  	$data['res'] = $this->Main_model->check_idcard_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function check_car_plate(){
  	$data['res'] = $this->Main_model->check_car_plate_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function check_phone(){
  	$data['res'] = $this->Main_model->check_phone_overlap();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_id_province(){
  	$data['res'] = $this->Main_model->get_id_province_only();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function get_data_province(){
  	$data['res'] = $this->Main_model->get_data_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function update_num_place(){
  	$data['res'] = $this->Main_model->update_num_place_all();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  /**
  * Query Data
  * 
  * @return
  */
  public function data_car_brand(){
  	$data['res'] = $this->Main_model->query_car_brand();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  
  public function data_car_type(){
  	$data['res'] = $this->Main_model->query_car_type();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_color(){
  	$data['res'] = $this->Main_model->query_car_color();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_plate(){
  	$data['res'] = $this->Main_model->query_car_plate();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_car_province(){
  	$data['res'] = $this->Main_model->query_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_user_province(){
  	$data['res'] = $this->Main_model->query_province();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function data_bank_list(){
  	$data['res'] = $this->Main_model->query_bank_list();
  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  /**
  * *end
  */
  public function update_user(){
  	$data['res'] = $this->Main_model->update_user();
//	$data['res'] = 123;
//  	header('Content-Type: application/json');
  	echo json_encode($data['res']);
  }
  public function rowdata($table,$arr_where,$arr_select) {
    $chk = explode('_',$table);
    $table = ($chk[0] == 'tbl' ? $table : 'tbl_'.$table);
    if ($arr_where) {
      foreach ($arr_where as $key => $value) {
        $this->db->where($key,$value);
      }
    }
    if ($arr_select) {
      foreach ($arr_select as $val_select) {
        $this->db->select($val_select);
      }
    }
    else {
      $this->db->select('*');
    }
    $query = $this->db->get($table)->row();
    return $query;
  }
 
// public function detect
//////////////////////////// End
}