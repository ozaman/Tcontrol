<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// $this->load->model('Shop_model');
	}

//$limit,$start,$table,$arr_where,$arr_select,$arr_order
	public function get_profile(){
		 // $_where = array();
      // $_where['i_status'] = ;
		
		// $data['shop'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,'',$_select,$_order);
		$this->load->view('profile/page_profile');
  		// echo json_encode($data['res']);
	}
	public function data_shop_categorie(){
		$_select = array('*');
		$_order = array();
		$_order['topic_en'] = 'asc';
		$data['categorie'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);
		$this->load->view('shop/page_categories', $data);
	}
	public function categorie_sub(){
		$_where = array();
      	$_where['main'] = $_POST[id];
      	// $_where['main'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['topic_en'] = 'asc';
		$data['categorie_bub'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
		$this->load->view('shop/page_categories_sub', $data);
	}
	public function shop_ordertype(){
		$_where = array();
      	$_where['sub'] = $_POST[id];
      	// $_where['main'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['topic_en'] = 'asc';
		$data['shop_ordertype'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$_where,$_select,$_order);
		$this->load->view('shop/page_shop_ordertype', $data);
	}
// public function cancel_shop()
}



?>