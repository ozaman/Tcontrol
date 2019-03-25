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
  
  public function count_shop_job() {
    $_where = array();
    $_where[transfer_date] = $_POST[date];
    $query_all = $this->db->get_where(TBL_ORDER_BOOKING, $_where);
    
    $result[all] = $query_all->num_rows();
    
    $_where = array();
    $_where[transfer_date] = $_POST[date];
    $_where[check_tran_job] = 1;
    $_where[check_lab_pay] = 1;
    $_where[transfer_money] = 0;
    $query_waittrans = $this->db->get_where(TBL_ORDER_BOOKING, $_where);
    
    $result[wait_trans] = $query_waittrans->num_rows();
    echo json_encode($result);
  }

  // ================================================================================================
  ################################ SHOP #################################
}

?>