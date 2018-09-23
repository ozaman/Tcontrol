<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');
    $this->load->model('Mobile_model');
  }


public function index()
	{
    $this->load->view('mainpage/page_header');
    $this->load->view('mainpage/page_body');
    $this->load->view('mainpage/page_footer');
    
	}
	


  //////////////////////////// End
}
?>