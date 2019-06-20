<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {

	
	public function func_SaveData(){
		
			$res = array();
			$data = array();
			$data[username] = $_POST[username];
			$data[password] = $_POST[password];
			$data[product_id] = $_POST[shop_product];
			$data[name] = $_POST[name_nickname];
			$data[nickname] = $_POST[nickname];
			$data[phone] = $_POST[phone];
			$data[email] = $_POST[email];
				
			//  
			// $res[i_status] = $result;
			$res[post] = $_POST;
			$res[icon] = 'suecess';
			if ($_POST[username] == '') {
				$txt_massage = 'กรุณาป้อนชื่อผู้ใช้งาน';
				$res[s_msg] = $txt_massage;
				return $res;
			}
			if ($_POST[password] == '') {
				$txt_massage = 'กรุณาป้อนรหัสผ่าน';
				$res[s_msg] = $txt_massage;
				return $res;
			}
			if ($_POST[shop_product] == '') {
				$txt_massage = 'กรุณาเลือกชื่อร้านค้า';
				$res[s_msg] = $txt_massage;
				return $res;
			}
			if ($_POST[name_nickname] == '') {
				$txt_massage = 'กรุณาป้อนชื่อ-นามสกุล';
				$res[s_msg] = $txt_massage;
				return $res;
			}
			if ($_POST[nickname] == '') {
				$txt_massage = 'กรุณาป้อนชื่อเล่น';
				$res[s_msg] = $txt_massage;
				return $res;

			}
			
			if ($_POST[phone] == '') {
				$txt_massage = 'กรุณาป้อเบอร์โทรศัพท์';
				$res[s_msg] = $txt_massage;
				return $res;
			}
			// if ($_POST[email] == '') {
			// 	$txt_massage = 'กรุณาป้อนอีเมล์';
			// 	$res[s_msg] = $txt_massage;
			// 	return $res;
			// }
			$result = $this->db->insert(TBL_WEB_ADMIN, $data);
			$res[s_msg] = $txt_massage;
			 $res[data] = $data;
			 $res[post] = $_POST;
			 $res[i_status] = $result;
			return $res;
		
	}
	
	
}