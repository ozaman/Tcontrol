<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounting extends CI_Controller {
  public function __construct() {
    parent::__construct();
     $this->load->model('Main_model');
     $this->load->model('Accounting_model');
    
  }
  
	public function transfer_com()	{
	    
//	    echo json_encode($data);
	    $this->load->view('mainpage/page_header');
	    $this->load->view('accounting/transfer_com');
	    $this->load->view('mainpage/page_footer');
	}
	
	public function manage_shop_trans(){
		 $this->load->view('accounting/manage_shop');
	}
	
	public function load_shop_com(){
		$_select = array('*');
	    $_order = array();
	    $_order['id'] = 'desc';
	    $where['program'] = 1;
	    $where['check_tran_job'] = 1;
	    $where['check_guest_register'] = 1;
	    $where['transfer_date'] = $_POST[date];
	    $data['order'] = $this->Main_model->fetch_data('','',"order_booking",$where,$_select,$_order);
	    if($data[order]){
			$this->load->view('accounting/list_transfer_com', $data);
		}else{
			echo '<h3><span style="color: #ff0000;">ไม่มีงาน</span></h3>';
		}
	    
	    
	}
  //////////////////////////// End
}
?>