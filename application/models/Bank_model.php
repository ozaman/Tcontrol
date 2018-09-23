<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank_model extends CI_Model {
  
  public function add_bank(){
  
	 	$bank[bank_name] = $_POST[bank_name];
	 	$bank[bank_id] = $_POST[bank];
	 	$bank[bank_number] = $_POST[bank_number];
	 	$bank[bank_branch] = $_POST[bank_branch];
	 	$bank[status] = 1;
	 	$bank[post_date] = time();
	 	$bank[last_update] = time();
	 	$bank[driver_id] = $_GET[driver_id];
	 	
		$bank[result] = $this->db->insert('web_bank_driver', $bank);
		$last_id_bank = mysql_insert_id();
		$return[last_id] = $last_id_bank;
		$return[data] = $bank;
		$return[rand] = $_POST[rand];

		$return[p] = rename("../data/pic/driver/book_bank/".$_POST[rand].".jpg", "../data/pic/driver/book_bank/".$last_id_bank.".jpg");
		
		return $return;
  }
  
  public function edit_bank(){
  		$bank[bank_name] = $_POST[bank_name];
	 	$bank[bank_id] = $_POST[bank];
	 	$bank[bank_number] = $_POST[bank_number];
	 	$bank[bank_branch] = $_POST[bank_branch];
	 	$bank[status] = 1;
	 	$bank[post_date] = time();
	 	$bank[last_update] = time();
//	 	$bank[driver_id] = $_GET[driver_id];
		
		$this->db->where('id', $_GET[id]);
		$bank[result] = $this->db->update('web_bank_driver', $bank); 
		$return[data] = $bank;
		$return[id] = $_GET[id];
		return $return;
  }
  
  public function change_status_bank(){
  	
  	if($_POST[status]==0){
			$query = $this->db->query('SELECT id FROM web_bank_driver where driver_id = "'.$_POST[driver_id].'" and status = 1 ');
			$check = $query->num_rows();
			if($check<=1){
				$return[check] = false;
				$return[data] = $check;
				return $return;
			}
			
		}
  			
			$bank[status] = $_POST[status];
			$this->db->where('id', $_POST[bank_id]);
			$bank[result] = $this->db->update('web_bank_driver', $bank); 
			$bank[bank_id] = $_POST[bank_id];
			
			$data_often[status_often] = 0;
			$this->db->where('id', $_POST[bank_id]);
			$data_often[result] = $this->db->update('web_bank_driver', $data_often); 
			
			
			$return[check] = true;
			$return[data] = $bank;
			$return[data_often] = $data_often;
  		
  		return $return;
  		
  }
  
  public function change_bank_often(){
  		$update[status_often] = 0;
  		$this->db->where('driver_id', $_POST[driver_id]);
  		$this->db->update('web_bank_driver', $update); 
  		
  		$bank[status_often] = 1;
		$this->db->where('id', $_POST[bank_id]);
		$bank[result] = $this->db->update('web_bank_driver', $bank); 
		$bank[bank_id] = $_POST[bank_id];
  		return $bank;
  }
  
  public function running_single_often_bank(){
  	
  	$query = $this->db->query('SELECT id FROM web_bank_driver where driver_id = "'.$_POST[driver_id].'" and status = 1 ');
	$check = $query->num_rows();
		if($check>=1){
			$data_often[status_often] = 0;
			$this->db->where('driver_id', $_POST[driver_id]);
			$data_often[result] = $this->db->update('web_bank_driver', $data_often); 
			
			$row = $query->row();
			$data[status_often] = 1;
			$this->db->where('id', $row->id);
			$this->db->limit(1);
			$bank[result] = $this->db->update('web_bank_driver', $data); 
			$bank[driver] = $_POST[driver_id];
			$bank[id_bank] = $row->id;
		}else{
			$bank[driver] = $_POST[driver_id];
			$bank[mg] = "More than 1";
		}
		
	return $bank;	
  }
  
  /**
  * 
  * 
  * *********** End
  * 
  */
}