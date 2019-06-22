<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct() {
    parent::__construct();
     $this->load->model('Users_model');
    // $this->load->model('Shop_model');
  }

  public function content() {
    session_start();
    if ($_SESSION['level'] < 8) {
       $this->db->select('id,main,sub,product_id');
      $where = array();
      $where[id] = $_SESSION['admin_use'];
      $query = $this->db->get_where(TBL_WEB_ADMIN,$where);
      $admin = $query->row();
      $this->load->view('mainpage/page_header',$menu);
      $this->load->view('user/index');
      $this->load->view('mainpage/page_footer');
    }
   $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $menu[menu] = 'user';
    $data['categorie'] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);
    $this->load->view('mainpage/page_header',$menu);
     $this->load->view('user/index');
    $this->load->view('mainpage/page_footer');
    
  }
  
    public function func_openFormadd() {
    $this->load->view('user/form');
  }
  
   public function func_SaveData() {
     header('Content-Type: application/json');
     
    $data = $this->Users_model->func_SaveData();
    echo json_encode($data);
  }
   public function get_form_data() {
    $this->load->view('user/form_data');
  }
  
  
  

  //////////////////////////// End
}

?>