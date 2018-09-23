<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Main_model');

  }

public function send_mail(){
//	$address3 = "system.goldenbeachgroup@gmail.com";
	 $address3 = "izudsuarez@gmail.com";
	$this->load->library('email');
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;

    $this->email->initialize($config);

    $this->email->from('system.goldenbeachgroup@gmail.com','TShare');
    $this->email->to($address3);
   // $this->email->cc('another@another-example.com');
    //$this->email->bcc('them@their-example.com');

    $this->email->subject('Email Test อ่านได้ไหม');
    $this->email->message('Testing the email class. อ่านได้ไหม');

    echo $this->email->send();

    echo $this->email->print_debugger();
//	$this->load->view('api/mail2');
//	echo 123;
}

public function get_my_transfer_job(){
		$url = "http://www.welovetaxi.com:3000/countOrderbydriver";  
		$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';                            
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$decode = 	json_decode($result);
//		header('Content-Type: application/json');
		echo json_encode($decode);
	}
	
public function manage_booking(){
		$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
//		$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';                            
		$curl_post_data = '{"driver": 153,"date": "2018-09-16","driver_checkcar" : 0 }';                            
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$decode = 	json_decode($result);
//		header('Content-Type: application/json');
		echo json_encode($decode);
	}

public function transfer_hisorty(){
	$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : '.$_POST[driver_checkcar].' }';                            
//	$curl_post_data = '{"driver": 153,"date": "2018-09-20","driver_checkcar" : 1 }';                            
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
//	header('Content-Type: application/json');
	echo json_encode($decode);
//	echo $curl_post_data;
}

}

?>