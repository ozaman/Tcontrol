<?php
//	 $address3 = "system.goldenbeachgroup@gmail.com";
	 $address3 = "izudsuarez@gmail.com";
	$this->load->library('email');
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;

    $this->email->initialize($config);

    $this->email->from('systeminfo-transfer@t-booking.com','TShare');
    $this->email->to($address3);
   // $this->email->cc('another@another-example.com');
    //$this->email->bcc('them@their-example.com');

    $this->email->subject('Email Test อ่านได้ไหม');
    $this->email->message('Testing the email class. อ่านได้ไหม');

    echo $this->email->send();

    echo $this->email->print_debugger();
?>
