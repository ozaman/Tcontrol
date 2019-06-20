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
				
			//  $result = $this->db->insert(TBL_WEB_ADMIN, $data);
			// $res[i_status] = $result;
			$res[icon] = 'suecess';
			if ($_POST[username] == '') {
				$txt_massage = 'กรุณาป้อนชื่อผู้ใช้งาน';
			}
			if ($_POST[password] == '') {
				$txt_massage = 'กรุณาป้อนรหัสผ่าน';
			}
			if ($_POST[product_id] == '') {
				$txt_massage = 'กรุณาเลือกชื่อร้านค้า';
			}
			if ($_POST[name] == '') {
				$txt_massage = 'กรุณาป้อนชื่อ-นามสกุล';
			}
			if ($_POST[nickname] == '') {
				$txt_massage = 'กรุณาป้อนชื่อเล่น';
			}
			
			if ($_POST[phone] == '') {
				$txt_massage = 'กรุณาป้อเบอร์โทรศัพท์';
			}
			if ($_POST[email] == '') {
				$txt_massage = 'กรุณาป้อนอีเมล์';
			}
			$res[s_msg] = $txt_massage;
			 $res[data] = $data;
			 $res[post] = $_POST;

			return $res;
		
	}
	
	
}