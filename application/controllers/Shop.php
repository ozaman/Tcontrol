<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Shop_model');
    // if ($_GET[option] == 1) {
    // 	$tbl = '';
    // }
    // if ($_GET[option] == 2) {
    // 	$tbl = '_company';
    // }
    // if ($_GET[option] == 3) {
    // 	$tbl = '_gui';
    // }
  }
  // ================================================================================================
  public function func_openForm() {
    $this->load->view('shop/form/'.$_POST[tbl]);
  }
  public function func_openList() {
    $this->load->view('shop/list/'.$_POST[tbl]);
  }
  public function func_SaveDataFormAction() {
    header('Content-Type: application/json');
    $data = $this->Shop_model->func_SaveDataFormAction();
    echo json_encode($data);
  }
  public function func_SaveDeleteBase() {
    $this->db->where('id',$_POST[id]);
    $this->db->delete($_POST[tbl]);
  }
  // ================================================================================================
  // ================================================================================================
  public function func_UpdateSubTypelist() {
    $_where = array();
    $_where[i_main_typelist] = $_POST[i_main_typelist];
    $_where[main] = $_POST[main];
    $_where[sub] = $_POST[sub];
    $sub_type_list = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
    if ($sub_type_list->id == null) {
      $params = array();
      $params[i_main_typelist] = $_POST[i_main_typelist];
      $params[main] = $_POST[main];
      $params[sub] = $_POST[sub];
      $params[i_status] = 1;
      $data = $this->db->insert(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$params);
    }
    else {
      $params[i_status] = ($sub_type_list->i_status == 1)?0:1;
      $data = $this->db->update(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$params,$_where);
    }


    echo json_encode($data);
  }
  // ================================================================================================
  public function func_UpdateTypeListPercent() {
    $_where = array();
    $_where[i_main_typelist] = $_POST[i_main_typelist];
    $_where[main] = $_POST[i_main];
    $_where[sub] = $_POST[i_sub];
    $_where[product] = $_POST[product];
    $_where[i_list_price] = $_POST[i_list_price];
    $sub_type_list = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT,$_where);
    if ($sub_type_list->id == null) {
      $params = array();
      $params[product] = $_POST[product];
      $params[i_main_typelist] = $_POST[i_main_typelist];
      $params[main] = $_POST[i_main];
      $params[sub] = $_POST[i_sub];
      $params[i_list_price] = $_POST[i_list_price];
      $params[i_status] = 1;
      $data = $this->db->insert(TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT,$params);
    }
    else {
      if($_POST[s_col] == 'i_status'){
        $params[$_POST[s_col]] = ($sub_type_list->i_status == 1)?0:1;
      }else{
        $params[$_POST[s_col]] = $_POST[s_val];
      }
      $data = $this->db->update(TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT,$params,$_where);
    }
    $data_j[where] = $_where;
    $data_j[params] = $params;
    $data_j[data] = $data;
    echo json_encode($data_j);
  }
  // ================================================================================================
  // ================================================================================================
  public function func_withholding_update() {
    $s_tbl = $_POST[s_tbl];
    $_where = array($_POST[s_where] => $_POST[i_id]);
    $_update = array();
    $_update[$_POST[s_col]] = $_POST[s_val];
    $data = $this->db->update($s_tbl,$_update,$_where);
    echo json_encode($data);
  }
  // ================================================================================================

  public function data_shop_all() {
    $_select = array('*');
    $_order = array();
    $_order['status'] = 'DESC';
    $_order['topic_en'] = 'asc';
    $menu[menu] = 'shop';
    $data['shop'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,'',$_select,$_order);
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('shop/shop_all',$data);
    $this->load->view('mainpage/page_footer');
  }
  // ================================================================================================
  public function data_shop_categorie() {
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $menu[menu] = 'shop';
    $data['categorie'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('shop/page_categories',$data);
    $this->load->view('mainpage/page_footer');
  }
  // ================================================================================================
  public function categorie_sub() {
    $_where = array();
    $_where['main'] = $_GET[id];
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $data['categorie_bub'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
    $menu[menu] = 'shop';
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('shop/page_categories_sub',$data);
    $this->load->view('mainpage/page_footer');
  }
  // ================================================================================================
  public function shop_ordertype() {
    $_where = array();
    $_where['sub'] = $_GET[id];
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $data['shop_ordertype'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$_where,$_select,$_order);
    $menu[menu] = 'shop';
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('shop/page_shop_ordertype',$data);
    $this->load->view('mainpage/page_footer');
  }
  public function shop_manage() {
    $_where = array();
    $_where['product_id'] = $_GET[id];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $data['shop_time'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME,$_where,$_select,$_order);
    $_where = array();
    $_where['id'] = $_GET[id];
    $_select = array('*');
    $data['shop'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
    $menu[menu] = 'shop';
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('shop/page_shop_manage',$data);
    $this->load->view('mainpage/page_footer');
  }
  public function get_shop_map() {
    $_where = array();
    $_where['id'] = $_POST[id];
    $_select = array('*');
    $data['map'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
    $this->load->view('shop/page_shop_map',$data);
  }
  public function shop_manage_com() {
    $_where = array();
    $_where['id'] = $_POST[id];
    $_select = array('*');
    $data['map'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
    $_where = array();
    $_where['status'] = 1;
    $_select = array('id','country_code','name_en','name_th','name_cn');
    $_order = array();
    $_order['name_th'] = 'asc';
    $data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
    $this->load->view('shop/page_shop_manage_com',$data);
  }
  public function add_region() {
    $data = $this->Shop_model->add_region();
    echo json_encode($data);
  }
  /*   * ************ REGION OR PLAN PRICE ***************** */
  public function get_region() {
    $_where = array();
    $_where['i_shop'] = $_POST[i_shop];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY.$_GET[option],$_where,$_select,$_order);
    $data['shop'] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,array('id'=>$_POST[i_shop]));
    $this->load->view('shop/box_region',$data);
  }
  public function get_region_sub() {
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
    $data['region_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM.$_GET[option],array('i_shop_country' => $_POST[country_id]),$_select,'');
    $data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON.$_GET[option],array('i_shop_country' => $_POST[country_id]),$_select,'');
    foreach ($data['region_icon'] as $val) {
      $this->db->where('id<>',$val->i_country);
    }
    $data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
    $this->load->view('shop/box_region_sub',$data);
  }
  public function add_region_sub() {
    $data = $this->Shop_model->add_region_sub();
    echo json_encode($data);
  }
  public function add_plan_price() {
    $data = $this->Shop_model->add_plan_price();
    echo json_encode($data);
  }
  public function get_plan_price_sub() {
    $_where = array();
    $_where['status'] = 1;
    $_select = array('*');
    $_order = array();
    $_order['s_topic_th'] = 'asc';
    $data['COM'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM.$_GET[option],array('i_shop_country' => $_POST[i_shop_country_com]),$_select,'');
    $data['COM_LIST'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST.$_GET[option],array('i_shop_country_com' => $_POST[i_shop_country_com]),$_select,'');
    foreach ($data['COM_LIST'] as $val) {
      $this->db->where('id<>',$val->i_shop_country_icon);
    }
    $data['plan'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,'');
    $_where = array();
    $_where['i_shop_country'] = $_POST[i_shop_country];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON.$_GET[option],$_where,$_select,$_order);
    $this->load->view('shop/box_plan_price',$data);
  }
  public function add_plan_price_sub() {
    $data = $this->Shop_model->add_plan_price_sub();
    echo json_encode($data);
  }
  public function updateStatus() {
    $data = $this->Main_model->updateStatus();
    echo json_encode($data);
  }
  public function updateStatusSHOP() {
    $data = $this->Main_model->updateStatusSHOP();
    echo json_encode($data);
  }
  public function get_plan_com() {

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
    $data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON.$_GET[option],array('i_shop_country' => $_POST[i_shop_country]),$_select,'');
    $this->load->view('shop/box_plan_com',$data);
  }
  public function save_plan_price() {
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
      $data = $this->Shop_model->save_plan_price();
      $this->load->view('shop/box_plan_com');
      echo json_encode($data);
    }
  }
  public function box_plan_comision() {
    $this->load->view('shop/box_plan_comision');
  }
  public function box_plan_time() {
    $this->load->view('shop/box_plan_time');
  }
  public function box_region_icon() {
    $this->load->view('shop/box_region_icon');
  }
  public function box_price_plan() {
    $this->load->view('shop/box_price_plan');
  }
  public function box_select_region_icon() {
    $this->load->view('shop/box_select_region_icon');
  }
  public function delete() {
    $id = $this->input->post('id');
    $table = $this->input->post('tbl');

    $data = $this->Main_model->delete($id,$table);
    echo json_encode($data);
  }
  public function box_region_show() {
    // $tbl = '';
    $_where = array();
    $_where['i_shop'] = $_POST[id];
    // $_where['i_shop'] = 1;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY.$_GET[option],$_where,$_select,$_order);
    $this->load->view('shop/box_region_show',$data);
    // echo json_encode(TBL_SHOP_COUNTRY.$_GET[option]);
  }
  public function save_edit_com() {
    $data = $this->Shop_model->save_edit_com();
    echo json_encode($data);
  }
  public function submit_data_plan_time() {
    //header('Content-Type: application/json');
    $data = $this->Shop_model->submit_data_plan_time();
    echo json_encode($data);
  }
  public function select_type() {
    header('Content-Type: application/json');
    $_where = array();
    $_order = array();
    if ($_GET[table] == 'shop_sub') {
      $table = TBL_SHOPPING_PRODUCT_SUB;
      $_where['main'] = $_GET[id_sub];
      $_order['topic_en'] = 'asc';
    }
    if ($_GET[table] == 'province') {
      $table = TBL_WEB_PROVINCE;
      $_where['area'] = $_GET[id_sub];
      $_order['name_th'] = 'asc';
    }
    if ($_GET[table] == 'amphur') {
      $table = TBL_WEB_AMPHUR;
      $_where['PROVINCE_ID'] = $_GET[id_sub];
      $this->db->where('name_th<>','');
      $_order['name_th'] = 'asc';
    }
    $_select = array('*');
    $arr = $this->Main_model->fetch_data('','',$table,$_where,$_select,$_order);
    echo json_encode($arr); // $this->load->view('shop/select/select_type');
  }
  public function updatetype() {
    $data = $this->Shop_model->updatetype();
    echo json_encode($data);
  }
  public function detail_contact() {
    $this->load->view('shop/box_contact_edit');
  }
  public function submit_submit_detail_contact() {
    $data = $this->Shop_model->submit_submit_detail_contact();
    echo json_encode($data);
  }
  public function box_contact() {
    $this->load->view('shop/box_contact');
  }
  /*   * ******* document ******** */
  public function box_document() {
    $this->load->view('shop/box_document');
  }
  public function save_document() {

    $data = $this->Shop_model->save_document();
    echo json_encode($data);
  }
  public function box_img() {
    $this->load->view('shop/box_img');
  }
  public function save_uploadimg() {

    $data = $this->Shop_model->save_uploadimg();
    echo json_encode($data);
  }
  public function box_img_book() {
    $this->load->view('shop/box_img_book');
  }
  public function open_detail_pay() {
    $this->load->view('shop/box_detail_pay');
  }
  public function submit_detail_pay() {

    $data = $this->Shop_model->submit_detail_pay();
    echo json_encode($data);
  }
  public function deleteimg() {
    header('Content-Type: application/json');
    $data = $this->Shop_model->deleteimg();
    echo json_encode($data);
  }
  public function get_car_price() {
    $this->load->view('shop/box_car_price');
  }
  ################################ SHOP #################################
}

?>