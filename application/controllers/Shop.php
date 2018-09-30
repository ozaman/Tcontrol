<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Shop_model');
	}

//$limit,$start,$table,$arr_where,$arr_select,$arr_order
	public function data_shop_all(){
		 // $_where = array();
      // $_where['i_status'] = ;
		// $_where['i_type'] = $i_type;
		$_select = array('*');
		$_order = array();
		$_order['status'] = 'DESC';
		$_order['topic_en'] = 'asc';
		$data['shop'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,'',$_select,$_order);
		// if ($_GET[chk_page] == 1) {
		$this->load->view('mainpage/page_header');
			// $this->load->view('mainpage/page_body');
		// }

		$this->load->view('shop/shop_all', $data);
		// if ($_GET[chk_page] == 1) {
		$this->load->view('mainpage/page_footer');
		// }
		
		
		
  		// echo json_encode($data['res']);
	}
	public function data_shop_categorie(){
		$_select = array('*');
		$_order = array();
		$_order['topic_en'] = 'asc';
		$data['categorie'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);
		$this->load->view('mainpage/page_header');
		$this->load->view('shop/page_categories', $data);
		$this->load->view('mainpage/page_footer');
	}
	public function categorie_sub(){
		$_where = array();
		$_where['main'] = $_GET[id];
      	// $_where['main'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['topic_en'] = 'asc';
		$data['categorie_bub'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
		$this->load->view('mainpage/page_header');
		$this->load->view('shop/page_categories_sub', $data);
		$this->load->view('mainpage/page_footer');
	}
	public function shop_ordertype(){
		$_where = array();
		$_where['sub'] = $_GET[id];
      	// $_where['main'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['topic_en'] = 'asc';
		$data['shop_ordertype'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$_where,$_select,$_order);
		$this->load->view('mainpage/page_header');
		$this->load->view('shop/page_shop_ordertype', $data);
		$this->load->view('mainpage/page_footer');
	}
	//rowdata($table,$arr_where,$arr_select)
	public function shop_manage(){
		$_where = array();
		$_where['product_id'] = $_GET[id];
      	// $_where['main'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['shop_time'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME,$_where,$_select,$_order);
		$_where = array();
		$_where['id'] = $_GET[id];
      	// $_where['main'] = 1;
		$_select = array('*');
		
		$data['shop'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
		$this->load->view('mainpage/page_header');
		$this->load->view('shop/page_shop_manage', $data);
		$this->load->view('mainpage/page_footer');
	}
	public function get_shop_map(){
		$_where = array();
      	// $_where['id'] = $_POST[id];
		$_where['id'] = 1;
      	// $_where['main'] = 1;
		$_select = array('*');
		
		$data['map'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
		$this->load->view('shop/page_shop_map', $data);
	}
	public function shop_manage_com(){
		$_where = array();
		$_where['id'] = $_POST[id];
      	//$_where['id'] = 1;
      	// $_where['main'] = 1;
		$_select = array('*');

		
		$data['map'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
		$_where = array();
      	// $_where['product_id'] = $_POST[id];
		$_where['status'] = 1;
		$_select = array('id','country_code','name_en','name_th','name_cn');
		
		$_order = array();
		$_order['name_th'] = 'asc';
		$data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
		$this->load->view('shop/page_shop_manage_com',$data);
	}
	public function add_region(){
		$data = $this->Shop_model->add_region();
		echo json_encode($data);
	}
	public function get_region(){

		$_where = array();
		$_where['i_shop'] = $_POST[i_shop];
      	// $_where['i_shop'] = 1;
      	// $_where['i_status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['id'] = 'asc';
		$data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY,$_where,$_select,$_order);
		//echo json_encode($data);
		$this->load->view('shop/box_region',$data);
	}
	public function get_region_sub(){
		$_where = array();
      	// $_where['i_shop'] = $_POST[i_shop];
      	// $_where['i_shop'] = 1;
      	// $_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['sort_index'] = 'ASC';
		$data['plan_price'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,$_order);
		$_where = array();
      	// $_where['id'] != $_POST[country_id];
		$_where['status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['name_th'] = 'asc';
		// echo $_POST[country_id];
		$data['region_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM,array('i_shop_country'=>$_POST[country_id]),$_select,'');
		
		$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON,array('i_shop_country'=>$_POST[country_id]),$_select,'');
		//echo json_encode($shop_country);
		
		foreach ($data['region_icon'] as $val) {
			$this->db->where('id<>',$val->i_country);
			// echo $val->i_country;
		}
		
		$data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
		$this->load->view('shop/box_region_sub',$data);
	}
	public function add_region_sub(){
		$data = $this->Shop_model->add_region_sub();
		echo json_encode($data);
	}
	public function add_plan_price(){
		$data = $this->Shop_model->add_plan_price();
		echo json_encode($data);
	}
	public function get_plan_price_sub(){
	 	// $_POST[i_shop_country_com] = 8;
	 // 	$_where = array();
  //     	// $_where['i_shop'] = $_POST[i_shop];
  //     	// $_where['i_shop'] = 1;
  //     	$_where['status'] = 1;
		// $_select = array('*');
		// $_order = array();
		// $_order['id'] = 'ASC';
		// $data['plan_price'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,$_order);
		$_where = array();
      	// $_where['id'] != $_POST[country_id];
		$_where['status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['s_topic_th'] = 'asc';
		// echo $_POST[country_id];
		$data['COM'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM,array('i_shop_country'=>$_POST[i_shop_country_com]),$_select,'');
		
		$data['COM_LIST'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST,array('i_shop_country_com'=>$_POST[i_shop_country_com]),$_select,'');
		//echo json_encode($shop_country);
		
		foreach ($data['COM_LIST'] as $val) {
			$this->db->where('id<>',$val->i_shop_country_icon);
			// echo $val->i_country;
		}
		
		$data['plan'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,'');
		

		$_where = array();
		$_where['i_shop_country'] = $_POST[i_shop_country];
      	//$_where['status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['id'] = 'asc';
		$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON,$_where,$_select,$_order);
		$this->load->view('shop/box_plan_price',$data);
	 	//print_r(json_encode($data));
	}

	public function add_plan_price_sub(){
		$data = $this->Shop_model->add_plan_price_sub();
		echo json_encode($data);
	}
	public function updateStatus(){
		$data = $this->Main_model->updateStatus();
		echo json_encode($data);
	}
	public function get_plan_com(){

		$_where = array();
		$_where['i_plan_price'] = $_POST[i_plan_price];
      	// $_where['i_shop'] = 1;
      	// $_where['i_status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['id'] = 'asc';
		$data['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);
		//echo json_encode($data);
		//$_where = array();
      	// $_where['id'] != $_POST[country_id];
		$_where['status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['id'] = 'asc';
		// echo $_POST[country_id];
		// $data['region_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM,array('i_shop_country'=>$_POST[country_id]),$_select,'');
		
		$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON,array('i_shop_country'=>$_POST[i_shop_country]),$_select,'');
		$this->load->view('shop/box_plan_com',$data);
	}
	public function save_plan_price(){
		$data = $this->Shop_model->save_plan_price();
		$this->load->view('shop/box_plan_com',$data);
		echo json_encode($data);
	}
	public function box_plan_comision(){
		$this->load->view('shop/box_plan_comision');
	}
	public function box_region_icon(){
		$this->load->view('shop/box_region_icon');
	}
	public function box_price_plan(){
		$this->load->view('shop/box_price_plan');
	}
	public function delete(){
		$id = $this->input->post('id');
		$table = $this->input->post('tbl');
		$data = $this->Main_model->delete($id,$table);
		echo json_encode($data);
	}
	public function box_region_show(){

		$_where = array();
		$_where['i_shop'] = 1;
      	// $_where['i_shop'] = 1;
      	// $_where['i_status'] = 1;
		$_select = array('*');
		
		$_order = array();
		$_order['id'] = 'asc';
		$data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY,$_where,$_select,$_order);
		//echo json_encode($data);
		$this->load->view('shop/box_region_show',$data);
	}

}



?>