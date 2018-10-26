<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model
{
	
	public function login(){
		$data =array();
		$data[post] = $_POST;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($username == '') {
			$data[status] = false;
			$data[icon] = 'warning';
			$data[msg] = 'กรุณาป้อน ยูเซอร์เนมผู้ใช้งาน';
			return $data;
		}
		if ($password == '') {
			$data[status] = false;
			$data[icon] = 'warning';
			$data[msg] = 'กรุณาป้อน รหัสผู้ใช้งาน';
			return $data;

		}
		$_where = array();
		$_where[username] = $username;
		$_select = array('*');
		$data[ADMIN] = $this->Main_model->rowdata(TBL_WEB_ADMIN,$_where,$_select);
		if (count($data[ADMIN]) != 0) {
			if ($data[ADMIN]->password == $password) {
				$data[status] = true;
				$data[icon] = 'success';
				$data[msg] = 'สำเร็จ';
				// session_start();
				$this->session->set_userdata(array(
					'admin_use' => $data[ADMIN]->id,
					'level' => $data[ADMIN]->level

				));
				
				return $data;
				// redirect('shop/data_shop_categorie', 'refresh');
			}
			else{
				$data[status] = false;
				$data[icon] = 'warning';
				$data[msg] = 'รหัสไม่ถูกต้อง';
				return $data;
			}
		}
		else{
			
			$data[status] = false;
			$data[icon] = 'warning';
			$data[msg] = 'ยูเซอร์เนมนี่ ไม่มีในระบบ';
			return $data;

		}
		// return $data;
		
		

	}


}
