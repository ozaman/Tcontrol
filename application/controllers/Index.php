<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // $this->load->model('Main_model');
    // $this->load->model('Shop_model');
  }

  public function index() {
    session_start();
    if ($_SESSION['level'] < 8) {
      $this->db->select('id,main,sub,product_id');
      $where = array();
      $where[id] = $_SESSION['admin_use'];
      $query = $this->db->get_where(TBL_WEB_ADMIN,$where);
      $admin = $query->row();
      
      header("Location: ".base_url()."shop/shop_manage?sub=".$admin->sub."&main=".$admin->main."&id=".$admin->product_id, true, 301);
      exit();
    }
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $menu[menu] = 'shop';
    $data['categorie'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('shop/page_categories',$data);
    $this->load->view('mainpage/page_footer');
  }

  //////////////////////////// End
}

?>