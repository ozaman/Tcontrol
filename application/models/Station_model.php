<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Station_model extends CI_Model {

	
	public function save_station(){
		if ($_GET[opt] == 'ADD') {
			$res = array();
			$data = array();
			$data[topic_en] = $_POST[topic_en];
			$data[topic_th] = $_POST[topic_th];
			$data[topic_cn] = $_POST[topic_cn];
			$data[company] = $_POST[company];
			$data[province] = $_POST[province];
			$data[region] = $_POST[region];
			$data[amphur] = $_POST[select_amphur];
			$data[address] = $_POST[address];		
			$data[phone] = $_POST[phone];		
			$result = $this->db->insert(TBL_PLACE_CAR_STATION, $data);
			$res[status] = $result;
			$res[icon] = 'suecess';//warning
			$res[msg] = 'บันทึกคิวสำเร็จ';

			return $res;
		}
		else{

		}
		
	}
	
}