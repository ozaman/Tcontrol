<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting_model extends CI_Model {
	
	public function add_car_type(){
		
  
	 	$car[name_th] = $_POST[name_th];
		$car[status] = 1;
		$car[post_date] = time();
		$car[last_update] = time();
		
		$car[result] = $this->db->insert('web_car_use_type', $car);

		return $car;
  
	}
	
	public function change_status_car_type(){
		
		$car[status] = $_POST[status];
		$car[last_update] = time();
		$this->db->where('id', $_POST[id]);
		$car[result] = $this->db->update('web_car_use_type', $car); 
		return $car;
	}
	
	public function update_car_type(){
		
		$car[name_th] = $_POST[name_th];
//		$car[status] = 1;
//		$car[post_date] = time();
		$car[last_update] = time();
		$this->db->where('id', $_POST[id]);
		$car[result] = $this->db->update('web_car_use_type', $car); 
		return $car;
	}
	
	public function delete_car_type(){
		$this->db->where('id', $_GET[id]);
		$result[result] = $this->db->delete('web_car_use_type');
		$result[id] = $_GET[id];
		return $result;
	}
 
  /**
  * *********** End
  */
	  public function add_car_gen(){
			
		 	$car[name_en] = $_POST[name_en];
		 	$car[name_th] = $_POST[name_en];
		 	$car[name_cn] = $_POST[name_en];
		 	$car[i_brand] = $_POST[i_brand];
			$car[status] = 1;
			$car[post_date] = time();
			$car[last_update] = time();
			
			$car[result] = $this->db->insert('web_car_gen', $car);

			return $car;
	}
	public function change_status_car_gen(){
		
		$car[status] = $_POST[status];
		$car[last_update] = time();
		$this->db->where('id', $_POST[id]);
		$car[result] = $this->db->update('web_car_gen', $car); 
		return $car;
		
	}
	public function update_car_gen(){
		
		$car[name_en] = $_POST[name_en];
		$car[name_th] = $_POST[name_en];
		$car[name_cn] = $_POST[name_en];
//		$car[status] = 1;
//		$car[post_date] = time();
		$car[last_update] = time();
		$this->db->where('id', $_POST[id]);
		$car[result] = $this->db->update('web_car_gen', $car); 
		$car[id] = $_POST[id];
		return $car;
	}
	
	public function delete_car_gen(){
		$this->db->where('id', $_GET[id]);
		$result[result] = $this->db->delete('web_car_gen');
		$result[id] = $_GET[id];
		return $result;
	}
	
	 /**
  * *********** End
  */
	  public function add_car_brand(){
			
		 	$car[name_en] = $_POST[name_en];
		 	$car[name_th] = $_POST[name_en];
		 	$car[name_cn] = $_POST[name_en];
//		 	$car[i_brand] = $_POST[i_brand];
			$car[status] = 1;
			$car[post_date] = time();
			$car[last_update] = time();
			
			$car[result] = $this->db->insert('web_car_brand', $car);

			return $car;
	}
	public function change_status_car_brand(){
		
		$car[status] = $_POST[status];
		$car[last_update] = time();
		$this->db->where('id', $_POST[id]);
		$car[result] = $this->db->update('web_car_brand', $car); 
		return $car;
		
	}
	public function update_car_brand(){
		
		$car[name_en] = $_POST[name_en];
		$car[name_th] = $_POST[name_en];
		$car[name_cn] = $_POST[name_en];
//		$car[status] = 1;
//		$car[post_date] = time();
		$car[last_update] = time();
		$this->db->where('id', $_POST[id]);
		$car[result] = $this->db->update('web_car_brand', $car); 
		$car[id] = $_POST[id];
		return $car;
	}
	
	public function delete_car_brand(){
		$this->db->where('id', $_GET[id]);
		$result[result] = $this->db->delete('web_car_brand');
		$result[id] = $_GET[id];
		return $result;
	}
}