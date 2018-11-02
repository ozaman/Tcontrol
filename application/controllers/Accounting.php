<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounting extends CI_Controller {
  public function __construct() {
    parent::__construct();
     $this->load->model('Main_model');
     $this->load->model('Accounting_model');
    
  }
  
	public function transfer_com()	{
	    $_select = array('*');
	    $_order = array();
	    $_order['id'] = 'desc';
	    $where['program'] = 1;
	    $where['check_tran_job'] = 1;
	    $where['check_guest_register'] = 1;
	    $data['order'] = $this->Main_model->fetch_data('','',"order_booking",$where,$_select,$_order);
//	    echo json_encode($data);
	    $this->load->view('mainpage/page_header');
	    $this->load->view('accounting/transfer_com', $data);
	    $this->load->view('mainpage/page_footer');
	}
  //////////////////////////// End
}
?>