<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Car_model extends CI_Model {
  
  public function add_car(){
  
	 	$car[plate_num] = $_POST[plate_num];
		$car[drivername] = $_GET[driver_id];
		$car[car_type] = $_POST[car_type];
		$car[car_brand] = $_POST[car_brand_txt];
		$car[i_car_brand] = $_POST[car_brand];
		$car[i_car_color] = $_POST[car_color];
		$car[car_color] = $_POST[car_color_txt];
		$car[plate_color] = $_POST[plate_color_txt];
		$car[i_plate_color] = $_POST[plate_color];
		$car[i_province] = $_POST[car_province];
		$car[status] = 1;
		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		$car[result] = $this->db->insert('web_carall', $car);
		$last_id_car = mysql_insert_id();
		$return[last_id] = $last_id_car;
		$return[data] = $car;

		$return[p1] = rename("../data/pic/car/".$_POST[rand]."_1.jpg", "../data/pic/car/".$last_id_car."_1.jpg");
		$return[p2] = rename("../data/pic/car/".$_POST[rand]."_2.jpg", "../data/pic/car/".$last_id_car."_2.jpg");
		$return[p3] =  rename("../data/pic/car/".$_POST[rand]."_3.jpg", "../data/pic/car/".$last_id_car."_3.jpg");
		
		return $return;
  }
  
  public function edit_car(){
  		$car[plate_num] = $_POST[plate_num];
//		$car[drivername] = $_GET[driver_id];
		$car[car_type] = $_POST[car_type];
		$car[car_brand] = $_POST[car_brand_txt];
		$car[i_car_brand] = $_POST[car_brand];
		$car[i_car_color] = $_POST[car_color];
		$car[car_color] = $_POST[car_color_txt];
		$car[plate_color] = $_POST[plate_color_txt];
		$car[i_plate_color] = $_POST[plate_color];
		$car[i_province] = $_POST[car_province];
		$car[status] = 1;
//		$car[status_usecar] = 0;
		$car[post_date] = time();
		$car[update_date] = time();
		
		$this->db->where('id', $_GET[car_id]);
		$car[result] = $this->db->update('web_carall', $car); 
		$return[data] = $car;
		$return[id] = $_GET[car_id];
		return $return;
  }
  
  public function change_car_often(){
  		
  		$update[status_usecar] = 0;
  		$this->db->where('drivername', $_POST[driver_id]);
  		$this->db->update('web_carall', $update); 
  		
  		$car[status_usecar] = 1;
		$this->db->where('id', $_POST[car_id]);
		$car[result] = $this->db->update('web_carall', $car); 
		$car[car_id] = $_POST[car_id];
  		return $car;
  }

  public function change_status_car(){
  		if($_POST[status]==0){
			$query = $this->db->query('SELECT id FROM web_carall where drivername = "'.$_POST[driver_id].'" and status = 1 ');
			$check = $query->num_rows();
			if($check<=1){
				$return[check] = false;
				$return[data] = $check;
				return $return;
			}
			
		}
  			
			$car[status] = $_POST[status];
			$this->db->where('id', $_POST[car_id]);
			$car[result] = $this->db->update('web_carall', $car); 
			$car[car_id] = $_POST[car_id];
			
			$data_often[status_usecar] = 0;
			$this->db->where('id', $_POST[car_id]);
			$data_often[result] = $this->db->update('web_carall', $data_often); 
			
			
			$return[check] = true;
			$return[data] = $car;
			$return[data_often] = $data_often;
  		
  		return $return;
  }

  public function running_single_often_car(){
  	$query = $this->db->query('SELECT id FROM web_carall where drivername = "'.$_POST[driver_id].'" and status = 1 ');
	$check = $query->num_rows();
		if($check>=1){
			$data_often[status_usecar] = 0;
			$this->db->where('drivername', $_POST[driver_id]);
			$data_often[result] = $this->db->update('web_carall', $data_often); 
			
			$row = $query->row();
			$data[status_usecar] = 1;
			$this->db->where('id', $row->id);
			$this->db->limit(1);
			$car[result] = $this->db->update('web_carall', $data); 
			$car[driver] = $_POST[driver_id];
			$car[id_car] = $row->id;
		}else{
			$car[driver] = $_POST[driver_id];
			$car[mg] = "More than 1";
		}
		
	return $car;	
  }
  /**
  * 
  * 
  * *********** End
  * 
  */
}