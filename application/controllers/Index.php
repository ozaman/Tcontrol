<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
  public function __construct() {
    parent::__construct();
    // $this->load->model('Main_model');
    // $this->load->model('Shop_model');
    
  }


public function index()	{
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $data['categorie'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);
    $this->load->view('mainpage/page_header');
    $this->load->view('shop/page_categories', $data);
    $this->load->view('mainpage/page_footer');
    
	}
	


  //////////////////////////// End
}
?>