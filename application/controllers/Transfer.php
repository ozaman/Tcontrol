<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transfer extends CI_Controller {
  public function __construct() {
    parent::__construct();
//    $this->load->model('Main_model');
  }


public function transfer_job()
	{
		$this->load->view('page/transfer_view',$data);
	}

}
?>