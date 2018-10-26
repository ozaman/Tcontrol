<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loadpost {

  public function __construct() {
    $this->CI = & get_instance();
  }

  public function check_login() {
    if ($this->CI->session->userdata('admin_use') == NULL) {
      $class = $this->CI->router->fetch_class();
      if ($class != 'login') {
        redirect('login', 'refresh');
        exit();
      }
    } else {
      
    }
  }

}
