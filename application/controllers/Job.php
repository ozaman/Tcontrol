<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Job_model');
  }

  public function job_manage_shop() {
    $menu[menu] = 'usecontrol';
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('job/shop_manage');
    $this->load->view('mainpage/page_footer');
  }

  public function job_nopaid_shop() {
    $menu[menu] = 'usecontrol';
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('job/shop_nopaid');
    $this->load->view('mainpage/page_footer');
  }

  public function job_history_shop() {
    $menu[menu] = 'usecontrol';
    $this->load->view('mainpage/page_header',$menu);
    $this->load->view('job/shop_history');
    $this->load->view('mainpage/page_footer');
  }

  public function render_shop() {
    $this->load->view('job/list_job_shop');
//    echo "<pre>";
//print_r($_POST[data]);
//echo "</pre>";
  }

  public function render_shop_his() {
    $this->load->view('job/list_job_shop_his');
  }
  
  public function render_shop_pay_tran() {
    $this->load->view('job/list_job_shop_pay_trans');
  }

  public function count_shop_job() {
    session_start();

    $_where = array();
    $_where[id] = $_SESSION['admin_use'];
    $this->db->select('product_id');
    $admins = $this->db->get_where(TBL_WEB_ADMIN,$_where);
    $admin = $admins->row();

//    echo $_SESSION['admin_use'];
//    echo json_encode($admin);
//    exit();

    $_where = array();
    $_where[transfer_date] = $_POST[date];
    if ($admin->product_id > 0) {
      $_where[program] = $admin->product_id;
    }
    $this->db->select('id');
    $query_all = $this->db->get_where(TBL_ORDER_BOOKING,$_where);


    $result[all] = $query_all->num_rows();

    $_where = array();
    $_where[transfer_date] = $_POST[date];
    $_where[check_tran_job] = 0;
    $_where[driver_complete] = 0;
    if ($admin->product_id > 0) {
      $_where[program] = $admin->product_id;
    }
    $this->db->select('id');
    $query_all = $this->db->get_where(TBL_ORDER_BOOKING,$_where);
    $result[process] = $query_all->num_rows();

    $_where = array();
    $_where[transfer_date] = $_POST[date];
    $_where[check_tran_job] = 1;
    $_where[check_lab_pay] = 1;
    $_where[transfer_money] = 0;
    if ($admin->product_id > 0) {
      $_where[program] = $admin->product_id;
    }
    $this->db->select('id');
    $query_waittrans = $this->db->get_where(TBL_ORDER_BOOKING,$_where);

    $result[wait_trans] = $query_waittrans->num_rows();
    $result[admin] = $admin;
    echo json_encode($result);
  }

  public function get_id_web_driver() {
    session_start();
    $_where = array();
    $_where[id] = $_SESSION['admin_use'];
    $this->db->select('product_id');
    $admins = $this->db->get_where(TBL_WEB_ADMIN,$_where);
    $admin = $admins->row();

    if ($admin->product_id > 0) {
      $_where = array();
      $_where[i_company] = $admin->product_id;
      $this->db->select('id, username');
      $dvs = $this->db->get_where(TBL_WEB_DRIVER,$_where);
      $dv = $dvs->row();
      $return[dv] = $dv;
    }
    $return[admin] = $admin->product_id;
    echo json_encode($return);
  }

  // ================================================================================================
  ################################ SHOP #################################
}

?>