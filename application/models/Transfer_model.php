<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transfer_model extends CI_Model {
  
  public function driver_deposit($username){
  
	$sql = "select balance,id from deposit where username = '".$username."' ";
	$query = $this->db->query($sql);
	$bl = $query->row();
	
	return $bl;
	
  }
  
  /**
  * *********** End
  */
}