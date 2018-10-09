<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Company_model');
	}
	public function add_region_company(){
		$data = $this->Company_model->add_region_company();
		echo json_encode($data);
	}
	public function get_region_company(){
		$_where = array();
		$_where['i_shop'] = $_POST[i_shop];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COMPANY,$_where,$_select,$_order);
		$this->load->view('shop/company/box_region_company',$data);
	}
	public function get_region_sub_company(){
		$_where = array();
		$_select = array('*');
		$_order = array();
		$_order['sort_index'] = 'ASC';
		$data['plan_price'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,$_order);
		$_where = array();
		$_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['name_th'] = 'asc';
		$data['region_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_COMPANY,array('i_shop_country'=>$_POST[country_id]),$_select,'');
		$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_COMPANY,array('i_shop_country'=>$_POST[country_id]),$_select,'');
		foreach ($data['region_icon'] as $val) {
			$this->db->where('id<>',$val->i_country);
		}
		$data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
		$this->load->view('shop/company/box_region_sub_company',$data);
	}
	public function add_region_sub_company(){
		$data = $this->Company_model->add_region_sub_company();
		echo json_encode($data);
	}
	public function add_plan_price_company(){
		$data = $this->Company_model->add_plan_price_company();
		echo json_encode($data);
	}
	public function get_plan_price_sub_company(){
		$_where = array();
		$_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['s_topic_th'] = 'asc';
		$data['COM'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_COMPANY,array('i_shop_country'=>$_POST[i_shop_country_com]),$_select,'');
		$data['COM_LIST'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_COMPANY,array('i_shop_country_com'=>$_POST[i_shop_country_com]),$_select,'');
		foreach ($data['COM_LIST'] as $val) {
			$this->db->where('id<>',$val->i_shop_country_icon);
		}
		$data['plan'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,'');
		$_where = array();
		$_where['i_shop_country'] = $_POST[i_shop_country];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_COMPANY,$_where,$_select,$_order);
		$this->load->view('shop/company/box_plan_price_company',$data);
	}

	public function add_plan_price_sub_company(){
		$data = $this->Company_model->add_plan_price_sub_company();
		echo json_encode($data);
	}
	public function updateStatus(){
		$data = $this->Main_model->updateStatus();
		echo json_encode($data);
	}
	public function get_plan_com_company(){

		$_where = array();
		$_where['i_plan_price'] = $_POST[i_plan_price];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);
		$_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_COMPANY,array('i_shop_country'=>$_POST[i_shop_country]),$_select,'');
		$this->load->view('shop/company/box_plan_com_company',$data);
	}
	public function save_plan_price_company(){
		$_where = array();
		$_where['i_plan_price'] = $_POST[i_price_plan];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);
		$chk = 1;
		foreach ($data['plan_com'] as $val) {
			if ($_POST[money_.$val->element] == '') {
				$chk = 0;
			}
		}
		if ($chk == 1) {
			$data = $this->Company_model->save_plan_price();
			$this->load->view('shop/company/box_plan_com_company');
			echo json_encode($data);
		}
	}
	public function box_plan_comision_company(){
		$this->load->view('shop/company/box_plan_comision_company');
	}
	public function box_plan_time_company(){
		$this->load->view('shop/company/box_plan_time_company');
	}
	public function box_region_icon_company(){
		$this->load->view('shop/company/box_region_icon_company');
	}
	public function box_price_plan_company(){
		$this->load->view('shop/company/box_price_plan_company');
	}
	public function box_select_region_icon_company(){
		$this->load->view('shop/company/box_select_region_icon_company');
	}
	public function box_region_show_company(){
		$_where = array();
		$_where['i_shop'] = $_POST[id];
		// $_where['i_shop'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COMPANY,$_where,$_select,$_order);
		$this->load->view('shop/company/box_region_show_company',$data);
	}
	public function save_edit_com_company(){
		$data = $this->Company_model->save_edit_com();
		echo json_encode($data);
	}
	public function shop_manage_com_company(){
		$_where = array();
		$_where['id'] = $_POST[id];
		// $_where['id'] = 1;
		$_select = array('*');
		$data['map'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
		$_where = array();
		$_where['status'] = 1;
		$_select = array('id','country_code','name_en','name_th','name_cn');
		$_order = array();
		$_order['name_th'] = 'asc';
		$data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
		$this->load->view('shop/company/page_shop_manage_com_company',$data);
	}
	
}



?>