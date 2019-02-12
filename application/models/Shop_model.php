<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model {

  // ================================================================================================
  public function func_SaveDataFormAction() {
    switch ($_POST[tbl]) {
      case 'shopping_product_main':
        $response = $this->func_Saveshopping_product_main();
        break;
      case 'shopping_product_sub':
        $response = $this->func_Saveshopping_product_sub();
        break;
      case 'shopping_product_main_typelist':
        $response = $this->func_Saveshopping_product_main_typelist();
        break;
      case 'shopping_product_sub_typelist':
        $response = $this->func_Saveshopping_product_sub_typelist();
        break;
      default :
        $response = $this->default_res();
    }
    return $response;
  }

  // ================================================================================================
  public function func_Saveshopping_product_main() {
    $response = array();
    $response[i_status] = 0;
    $response[s_focus] = 'topic_en';
    $response[s_msg] = 'กรุณากรอกหมวดหมู่ EN ด้วยค่ะ';
    if ($_POST[topic_en] != '') {
      $response[i_status] = 1;
      $response[s_focus] = '';
      $response[s_msg] = '';
      $params = array();
      $params[topic_en] = $_POST[topic_en];
      $params[topic_th] = $_POST[topic_th];
      $params[topic_cn] = $_POST[topic_cn];
      $params[i_update_utf] = 1;
      if ($_POST[id] == NULL) {
        $this->db->insert($_POST[tbl],$params);
      }
      else {
        $this->db->update($_POST[tbl],$params,array('id' => $_POST[id]));
      }
      @setcookie('savedata',1,60); // 86400 = 1 day
    }
    return $response;
  }

  // ================================================================================================
  public function func_Saveshopping_product_sub() {
    $response = array();
    $response[i_status] = 0;
    $response[s_focus] = 'topic_en';
    $response[s_msg] = 'กรุณากรอกประเภท EN ด้วยค่ะ';
    if ($_POST[topic_en] != '') {
      $response[i_status] = 1;
      $response[s_focus] = '';
      $response[s_msg] = '';
      $params = array();
      $params[topic_en] = $_POST[topic_en];
      $params[topic_th] = $_POST[topic_th];
      $params[topic_cn] = $_POST[topic_cn];
      $params[main] = $_POST[i_main];
      $params[i_update_utf] = 1;
      if ($_POST[id] == NULL) {
        $this->db->insert($_POST[tbl],$params);
      }
      else {
        $this->db->update($_POST[tbl],$params,array('id' => $_POST[id]));
      }
      @setcookie('savedata',1,60); // 86400 = 1 day
    }
    return $response;
  }

  // ================================================================================================
  public function func_Saveshopping_product_main_typelist() {
    $response = array();
    $response[i_status] = 0;
    $response[s_focus] = 'topic_en';
    $response[s_msg] = 'กรุณากรอกประเภท EN ด้วยค่ะ';
    if ($_POST[topic_en] != '') {
      $response[i_status] = 1;
      $response[s_focus] = '';
      $response[s_msg] = '';
      $params = array();
      $params[topic_en] = $_POST[topic_en];
      $params[topic_th] = $_POST[topic_th];
      $params[topic_cn] = $_POST[topic_cn];
      $params[main] = $_POST[main];
      $params[i_update_utf] = 1;
      if ($_POST[id] == NULL) {
        $this->db->insert($_POST[tbl],$params);
      }
      else {
        $this->db->update($_POST[tbl],$params,array('id' => $_POST[id]));
      }
      @setcookie('savedata',1,60); // 86400 = 1 day
    }
    return $response;
  }

  // ================================================================================================
  public function func_Saveshopping_product_sub_typelist() {
    $response = array();
    $response[i_status] = 0;
    $response[s_focus] = 'topic_en';
    $response[s_msg] = 'กรุณากรอกประเภท EN ด้วยค่ะ';
    if ($_POST[topic_en] != '') {
      $response[i_status] = 1;
      $response[s_focus] = '';
      $response[s_msg] = '';
      $params = array();
      $params[topic_en] = $_POST[topic_en];
      $params[topic_th] = $_POST[topic_th];
      $params[topic_cn] = $_POST[topic_cn];
      $params[main] = $_POST[i_main];
      $params[sub] = $_POST[sub];
      $params[i_update_utf] = 1;
      if ($_POST[id] == NULL) {
        $this->db->insert($_POST[tbl],$params);
      }
      else {
        $this->db->update($_POST[tbl],$params,array('id' => $_POST[id]));
      }
      @setcookie('savedata',1,60); // 86400 = 1 day
    }
    return $response;
  }

  // ================================================================================================
  // ================================================================================================

  public function add_region() {
    $data[i_shop] = $_POST[i_shop];
    $result = $this->db->insert(TBL_SHOP_COUNTRY.$_GET[option],$data);
    $last_id = mysql_insert_id();

    $data2[i_shop_country] = $last_id;
    $data2[i_country] = $_POST[id];
    $data2[s_country_code] = $_POST[country_code];
    $data2[s_topic_en] = $_POST[name_en];
    $data2[s_topic_th] = $_POST[name_th];
    $data2[s_topic_cn] = $_POST[name_cn];
    $result2 = $this->db->insert(TBL_SHOP_COUNTRY_ICON.$_GET[option],$data2);
    return $result2;
  }

  public function add_region_sub() {
    $data[i_shop_country] = $_POST[id_shop_country];
    $data[i_country] = $_POST[id];
    $data[s_country_code] = $_POST[country_code];
    $data[s_topic_en] = $_POST[name_en];
    $data[s_topic_th] = $_POST[name_th];
    $data[s_topic_cn] = $_POST[name_cn];
    $result = $this->db->insert(TBL_SHOP_COUNTRY_ICON.$_GET[option],$data);

    return $result;
  }

  public function add_plan_price() {
    $data[i_shop_country] = $_POST[i_shop_country];
    $data[i_plan_price] = $_POST[i_plan_price];
    $result = $this->db->insert(TBL_SHOP_COUNTRY_COM.$_GET[option],$data);
    $last_id = mysql_insert_id();
    $data2[i_shop_country_com] = $last_id;
    $data2[i_shop_country_icon] = $_POST[i_plan_price];
    $data2[s_topic_en] = $_POST[topic_en];
    $data2[s_topic_th] = $_POST[topic_th];
    $data2[s_topic_cn] = $_POST[topic_cn];
    $result2 = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST.$_GET[option],$data2);
    return $result;
  }

  public function add_plan_price_sub() {
    $data[i_shop_country_com] = $_POST[i_shop_country_com];
    $data[i_shop_country_icon] = $_POST[i_plan_price];
    $data[s_topic_en] = $_POST[topic_en];
    $data[s_topic_th] = $_POST[topic_th];
    $data[s_topic_cn] = $_POST[topic_cn];
    $result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST.$_GET[option],$data);
    return $result;
  }

  public function save_plan_price($msg) {
    $res = array();
    $_where = array();
    $_where['i_plan_price'] = $_POST[i_price_plan];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $plan_com = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);

    if ($msg == '') {

      $plan = array();
      $plan[i_shop_country_icon] = $_POST[i_country_icon_plan];
      $plan[i_plan_price] = $_POST[i_price_plan];




      $result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST.$_GET[option],$plan);
      $last_id = mysql_insert_id();

      foreach ($plan_com as $val) {
        $data = array();
        $data[i_shop_country_com_list] = $last_id;
        $data[i_shop_country_icon] = $_POST[i_country_icon_plan];
        $data[i_plan_price] = $_POST[i_price_plan];
        $data[s_topic_th] = $val->s_topic_th;
        if ($val->i_plan_com == 5) {
          $s_topic_en = 'park';
        }
        if ($val->i_plan_com == 6) {
          $s_topic_en = 'person';
        }
        if ($val->i_plan_com == 7) {
          $s_topic_en = 'comision';
        }
        $data[i_plan_product_price_name] = $val->i_plan_com;
        $data[s_topic_en] = $s_topic_en;
        if ($val->i_plan_product_price_name == 6) {
          $data[i_price] = $_POST[$val->element];
        }
        else {
          $data[i_price] = 0;
        }

        $data[s_payment] = $_POST[money_.$val->element];
        $data[i_type_pay] = $_POST[typepark];

        $result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST_PRICE.$_GET[option],$data);
      }
      $res[post] = $_POST;
      $res[data] = $data;
      $res[insert] = $result;
      $res[last_id] = $last_id;
      $res[typepark] = $_POST[typepark];

      $res[i_plan_price] = $_POST[i_price_plan];
      $res[plan_com] = $plan_com;
      $res[option] = $_GET[option];
      $res[status] = true;
      $res[msg] = $msg;
      return $res;
    }
    else {
      $res[post] = $_POST;
      $res[status] = false;
      $res[msg] = $msg;
      $res[typepark] = $_POST[typepark];
      $res[i_plan_price] = $_POST[i_price_plan];
      $res[plan_com] = $plan_com;
      $res[option] = $_GET[option];
      return $res;
    }
  }

  public function save_edit_com() {
    $_where = array();
    $_where['i_shop_country_com_list'] = $_GET[i_shop_country_com_list];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $arr['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE.$_GET[option],$_where,$_select,$_order);
    foreach ($arr['plan_com'] as $val) {
      $this->db->where('id',$val->id);
      if ($val->i_plan_product_price_name == 5) {
        $data[i_type_pay] = $_POST[typepark.'_'.$val->id];
      }
      $data[i_price] = $_POST[input_.$_GET[i_shop_country_com_list]._.$val->id];

      $result = $this->db->update(TBL_SHOP_COUNTRY_COM_LIST_PRICE.$_GET[option],$data);
    }


    return $result;
  }

  public function submit_data_plan_time() {
    $day = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
    for ($i = 1; $i <= 24; $i ++) {
      $invID = str_pad($i,2,'0',STR_PAD_LEFT);
      $hour[] = $invID;
    }
    for ($i = 0; $i <= 11; $i ++) {
      $cal = $i * 5;
      $invID = str_pad($cal,2,'0',STR_PAD_LEFT);
      $time[] = $invID;
    }
    if ($_GET[op] == 'time') {
      $data = array();
      // $data[topic_cn] =  $_POST[topic_cn];
      // $data[topic_th] =  $_POST[topic_th];
      // $data[topic_en] =  $_POST[topic_en];
      // $data[map] =  $_POST[map];
      // $data[lat] =  $_POST[lat_db];
      // $data[lng] =  $_POST[lng_db];
      // $data[address] =  $_POST[address];
      // $data[phone] =  $_POST[phone];
      // $data[email] =  $_POST[email];
      // $data[province] =  $_POST[province];
      // $data[return_guest] =  $_POST[return_guest];
      // $data[amphur] =  $_POST[select_amphur];
      // $data[region] =  $_POST[region];
      // $data[main] =  $_POST[main];
      // $data[sub] =  $_POST[sub];
      $data[open_Sun] = $_POST[Sun];
      $data[open_Mon] = $_POST[Mon];
      $data[open_Tue] = $_POST[Tue];
      $data[open_Wed] = $_POST[Wed];
      $data[open_Thu] = $_POST[Thu];
      $data[open_Fri] = $_POST[Fri];
      $data[open_Sat] = $_POST[Sat];
      $this->db->where('id',$_GET[shop_id]);
      $result = $this->db->update(TBL_SHOPPING_PRODUCT,$data);
      $last_id = $_GET[shop_id];
      $data_loop = '';
      foreach ($day as $value) {
        $hour_open = 'hour_open_'.$value;
        $time_open = 'time_open_'.$value;
        $hour_close = 'hour_close_'.$value;
        $time_close = 'time_close_'.$value;
        $open_alway = "open_alway_".$value;
        if ($_POST[$value] == NULL or $_POST[$value] == "") {
          $status = 0;
        }
        else {
          $status = 1;
        }
        if ($_POST[$open_alway] == NULL or $_POST[$open_alway] == "") {
          $status_alway = 0;
        }
        else {
          $status_alway = 1;
        }

        if ($_POST[$hour_open] == NULL or $_POST[$hour_open] == "") {
          $hour_open_val = 00;
        }
        else {
          $hour_open_val = $_POST[$hour_open];
        }
        if ($_POST[$time_open] == NULL or $_POST[$time_open] == "") {
          $time_open_val = 00;
        }
        else {
          $time_open_val = $_POST[$time_open];
        }
        if ($_POST[$hour_close] == NULL or $_POST[$hour_close] == "") {
          $hour_close_val = 00;
        }
        else {
          $hour_close_val = $_POST[$hour_close];
        }
        if ($_POST[$time_close] == NULL or $_POST[$time_close] == "") {
          $time_close_val = 00;
        }
        else {
          $time_close_val = $_POST[$time_close];
        }
        $day_row = array();
        $day_row['product_id'] = $last_id;
        $day_row['product_day'] = $value;
        $day_row['status'] = $status;
        $day_row['open_always'] = $status_alway;
        $day_row['type'] = 1;

        $day_row['start_h'] = $hour_open_val;
        $day_row['start_m'] = $time_open_val;
        $day_row['finish_h'] = $hour_close_val;
        $day_row['finish_m'] = $time_close_val;
        $_where = array();
        $_where['product_id'] = $last_id;
        $_where['product_day'] = $value;
        $num_row = $this->Main_model->num_row(TBL_SHOPPING_OPEN_TIME,$_where);
        if ($num_row <= 0) {
          $result = $this->db->insert(TBL_SHOPPING_OPEN_TIME,$day_row);
        }
        else {
          $this->db->where('product_id',$last_id);
          $this->db->where('product_day',$value);
          $result = $this->db->update(TBL_SHOPPING_OPEN_TIME,$day_row);
        }
        $time_other = 'time_other_'.$value;
        if ($_POST[$time_other] != "" or $_POST[$time_other] != null) {
          $hour_open2 = 'hour_open_'.$value.'_2';
          $time_open2 = 'time_open_'.$value.'_2';
          $hour_close2 = 'hour_close_'.$value.'_2';
          $time_close2 = 'time_close_'.$value.'_2';
          if ($_POST[$hour_open2] == NULL or $_POST[$hour_open2] == "") {
            $hour_open_val2 = 00;
          }
          else {
            $hour_open_val2 = $_POST[$hour_open2];
          }
          if ($_POST[$time_open2] == NULL or $_POST[$time_open2] == "") {
            $time_open_val2 = 00;
          }
          else {
            $time_open_val2 = $_POST[$time_open2];
          }
          if ($_POST[$hour_close2] == NULL or $_POST[$hour_close2] == "") {
            $hour_close_val2 = 00;
          }
          else {
            $hour_close_val2 = $_POST[$hour_close2];
          }
          if ($_POST[$time_close2] == NULL or $_POST[$time_close2] == "") {
            $time_close_val2 = 00;
          }
          else {
            $time_close_val2 = $_POST[$time_close2];
          }
          $day_row_other = array();
          $day_row_other['product_id'] = $last_id;
          $day_row_other['product_day'] = $value;
          $day_row_other['status'] = $_POST[$time_other];
          $day_row_other['open_always'] = $status_alway;
          $day_row_other['type'] = 1;

          $day_row_other['start_h'] = $hour_open_val2;
          $day_row_other['start_m'] = $time_open_val2;
          $day_row_other['finish_h'] = $hour_close_val2;
          $day_row_other['finish_m'] = $time_close_val2;
          $day_row_other['time_other_number'] = 2;
          $data_loop .= json_encode($day_row_other);
          $_where = array();
          $_where['product_id'] = $last_id;
          $_where['product_day'] = $value;
          $_where['time_other_number'] = 2;
          $num_row_other = $this->Main_model->num_row(TBL_SHOPPING_OPEN_TIME,$_where);
          if ($num_row_other <= 0) {
            $result = $this->db->insert(TBL_SHOPPING_OPEN_TIME,$day_row_other);
          }
          else {
            $this->db->where('product_id',$last_id);
            $this->db->where('product_day',$value);
            $this->db->where('time_other_number',2);
            $result = $this->db->update(TBL_SHOPPING_OPEN_TIME,$day_row_other);
          }
        }
        else {
          $day_row_other = array();
          $day_row_other['status'] = $_POST[$time_other];
          $this->db->where('product_id',$last_id);
          $this->db->where('product_day',$value);
          $this->db->where('time_other_number',2);
          $result = $this->db->update(TBL_SHOPPING_OPEN_TIME,$day_row_other);
        }
      }
      return $data_loop;
    }

    $gen_map1 = explode('<iframe src="',$_POST[map]);

    //$_POST[map] = 

    if ($_GET[op] == 'shop') {
      $data = array();
      $data[topic_cn] = $_POST[topic_cn];
      $data[topic_th] = $_POST[topic_th];
      $data[topic_en] = $_POST[topic_en];
      $data[map] = $_POST[map];
      $data[lat] = $_POST[lat_db];
      $data[lng] = $_POST[lng_db];
      $data[address] = $_POST[address];
      $data[s_website] = $_POST[s_website];
      $data[phone] = $_POST[phone];
      $data[email] = $_POST[email];
      $data[province] = $_POST[province];
      $data[return_guest] = $_POST[return_guest];
      $data[amphur] = $_POST[select_amphur];
      $data[region] = $_POST[region];
      $data[main] = $_POST[main];
      $data[sub] = $_POST[sub];
      $this->db->where('id',$_GET[shop_id]);
      $result[result] = $this->db->update(TBL_SHOPPING_PRODUCT,$data);
      $result[id] = $_GET[shop_id];
      $result[url] = base_url().'shop/shop_manage?sub='.$_POST[sub].'&main='.$_POST[main].'&id='.$_GET[shop_id];
      return $result;
    }


    if ($_GET[op] == 'add') {
      $data_return = array();
      $data = array();
      $data[topic_cn] = $_POST[topic_cn];
      $data[topic_th] = $_POST[topic_th];
      $data[topic_en] = $_POST[topic_en];
      $data[map] = $_POST[map];
      $data[lat] = $_POST[lat_db];
      $data[lng] = $_POST[lng_db];
      $data[address] = $_POST[address];
      $data[s_website] = $_POST[s_website];
      $data[phone] = $_POST[phone];
      $data[email] = $_POST[email];
      $data[province] = $_POST[province];
      $data[return_guest] = $_POST[return_guest];
      $data[amphur] = $_POST[select_amphur];
      $data[region] = $_POST[region];
      $data[main] = $_POST[main];
      $data[sub] = $_POST[sub];
      /*
        $data[open_Sun] = $_POST[Sun];
        $data[open_Mon] = $_POST[Mon];
        $data[open_Tue] = $_POST[Tue];
        $data[open_Wed] = $_POST[Wed];
        $data[open_Thu] = $_POST[Thu];
        $data[open_Fri] = $_POST[Fri];
        $data[open_Sat] = $_POST[Sat];
        // */
      $data[open_Sun] = 1;
      $data[open_Mon] = 1;
      $data[open_Tue] = 1;
      $data[open_Wed] = 1;
      $data[open_Thu] = 1;
      $data[open_Fri] = 1;
      $data[open_Sat] = 1;
      $result = $this->db->insert(TBL_SHOPPING_PRODUCT,$data);
      $last_id = mysql_insert_id();
      $data_return[product_id] = $last_id;
      $data_return[sub] = $_POST[sub];

      foreach ($day as $value) {
        $hour_open = 'hour_open_'.$value;
        $time_open = 'time_open_'.$value;
        $hour_close = 'hour_close_'.$value;
        $time_close = 'time_close_'.$value;
        $open_alway = "open_alway_".$value;
        if ($_POST[$value] == NULL or $_POST[$value] == "") {
          $status = 0;
        }
        else {
          $status = 1;
        }
        if ($_POST[$open_alway] == NULL or $_POST[$open_alway] == "") {
          $status_alway = 0;
        }
        else {
          $status_alway = 1;
        }
        if ($_POST[$hour_open] == NULL or $_POST[$hour_open] == "") {
          $hour_open_val = 00;
        }
        else {
          $hour_open_val = $_POST[$hour_open];
        }
        if ($_POST[$time_open] == NULL or $_POST[$time_open] == "") {
          $time_open_val = 00;
        }
        else {
          $time_open_val = $_POST[$time_open];
        }
        if ($_POST[$hour_close] == NULL or $_POST[$hour_close] == "") {
          $hour_close_val = 00;
        }
        else {
          $hour_close_val = $_POST[$hour_close];
        }
        if ($_POST[$time_close] == NULL or $_POST[$time_close] == "") {
          $time_close_val = 00;
        }
        else {
          $time_close_val = $_POST[$time_close];
        }
        $day_row = array();
        $day_row['product_id'] = $last_id;
        $day_row['product_day'] = $value;
        $day_row['status'] = $status;
        $day_row['open_always'] = $status_alway;
        $day_row['type'] = 1;
        $day_row['start_h'] = $hour_open_val;
        $day_row['start_m'] = $time_open_val;
        $day_row['finish_h'] = $hour_close_val;
        $day_row['finish_m'] = $time_close_val;
        $result = $this->db->insert(TBL_SHOPPING_OPEN_TIME,$day_row);
        $time_other = 'time_other_'.$value;
        if ($_POST[$time_other] != "" or $_POST[$time_other] != null) {
          $hour_open2 = 'hour_open_'.$value.'_2';
          $time_open2 = 'time_open_'.$value.'_2';
          $hour_close2 = 'hour_close_'.$value.'_2';
          $time_close2 = 'time_close_'.$value.'_2';
          if ($_POST[$hour_open2] == NULL or $_POST[$hour_open2] == "") {
            $hour_open_val2 = 00;
          }
          else {
            $hour_open_val2 = $_POST[$hour_open2];
          }
          if ($_POST[$time_open2] == NULL or $_POST[$time_open2] == "") {
            $time_open_val2 = 00;
          }
          else {
            $time_open_val2 = $_POST[$time_open2];
          }
          if ($_POST[$hour_close2] == NULL or $_POST[$hour_close2] == "") {
            $hour_close_val2 = 00;
          }
          else {
            $hour_close_val2 = $_POST[$hour_close2];
          }
          if ($_POST[$time_close2] == NULL or $_POST[$time_close2] == "") {
            $time_close_val2 = 00;
          }
          else {
            $time_close_val2 = $_POST[$time_close2];
          }
          $day_row_other = array();
          $day_row_other['product_id'] = $last_id;
          $day_row_other['product_day'] = $value;
          $day_row_other['status'] = $_POST[$time_other];
          $day_row_other['open_always'] = $status_alway;
          $day_row_other['type'] = 1;
          $day_row_other['start_h'] = $hour_open_val2;
          $day_row_other['start_m'] = $time_open_val2;
          $day_row_other['finish_h'] = $hour_close_val2;
          $day_row_other['finish_m'] = $time_close_val2;
          $day_row_other['time_other_number'] = 2;
          $result = $this->db->insert(TBL_SHOPPING_OPEN_TIME,$day_row_other);
        }
      }
      $data_return[result] = $result;
      $data_return[day_row_other] = $day_row_other;
      $data_return[data] = $data;
      $data_return[post] = $_POST;

      $data_return[id] = $last_id;
      $data_return[url] = base_url().'shop/shop_manage?sub='.$_POST[sub].'&main='.$_POST[main].'&id='.$last_id;

      return $data_return;
    }
  }

  public function submit_submit_detail_contact() {
    $data_return = array();

    if ($_GET[op] == 'add') {
      $data = array();
      $data[name] = $_POST[contact_name];
      $data[usertype] = $_POST[contact_usertype];
      $data[admintype] = $_POST[contact_admintype];
      $data[phone] = $_POST[contact_phone];
      $data[phone_2] = $_POST[contact_phone_2];
      $data[email] = $_POST[contact_email];
      $data[email_2] = $_POST[contact_email_2];
      $data[line_id] = $_POST[contact_line_id];
      $data[wechat_id] = $_POST[contact_wechat_id];
      $data[skype_id] = $_POST[contact_skype_id];
      $data[whatsapp_id] = $_POST[contact_whatsapp_id];
      $data[zello_id] = $_POST[contact_zello_id];
      $data[product_id] = $_POST[contact_product_id];
      $result = $this->db->insert(TBL_SHOPPING_CONTACT,$data);
      $last_id = mysql_insert_id();
      $data_return[id] = $_POST[contact_product_id];//$last_id;
      $data_return[result] = $result;
      return $data_return;
    }





    if ($_GET[op] == 'edit') {

      $data = array();

      $data[name] = $_POST[contact_name];
      $data[usertype] = $_POST[contact_usertype];
      $data[admintype] = $_POST[contact_admintype];
      $data[phone] = $_POST[contact_phone];
      $data[phone_2] = $_POST[contact_phone_2];
      $data[email] = $_POST[contact_email];
      $data[email_2] = $_POST[contact_email_2];
      $data[line_id] = $_POST[contact_line_id];
      $data[wechat_id] = $_POST[contact_wechat_id];
      $data[skype_id] = $_POST[contact_skype_id];
      $data[whatsapp_id] = $_POST[contact_whatsapp_id];
      $data[zello_id] = $_POST[contact_zello_id];
      $this->db->where('id',$_POST[contact_id]);
      $result = $this->db->update(TBL_SHOPPING_CONTACT,$data);
      $data_return[id] = '';
      $data_return[result] = $result;
      return $data_return;
    }
  }

  public function save_document() {
    header('Content-Type: application/json');



    // if ($_FILES["file"]["name"]) {
    $product_id = $_POST[product_id];
    $type_doc = $_POST[type_doc];
    if ($_POST[check_expired] == 1) {
      $start_expired = $_POST[date1];
      $end_expired = $_POST[date2];
    }
    else {
      $start_expired = '';
      $end_expired = '';
    }
    $result = array();
    $type = explode('.',$_FILES[file_doc][name]);


    $type = strtolower($type[count($type) - 1]);

    // $url = "../data/pic/document/place/";

    $num = time();

    $doc_name = $type_doc.'_'.$product_id.'_'.$num.'.'.$type;
    $target_file = "../data/pic/document/place/".$doc_name;
    $result[target_file] = $target_file;
    if ($_POST[type_doc] < 1) {
      $result[status] = false;
      $result[msg] = 'กรุณาเลือกประเภท';
    }
    elseif ($_FILES[file_doc][name] == '') {
      $result[status] = false;
      $result[msg] = 'กรุณาเลือกไฟล์';
    }
    elseif (in_array($type,array("jpg","jpeg","gif","png","PDF"))) {
      // return  $type;
      if (is_uploaded_file($_FILES[file_doc][tmp_name])) {
        // return $target_file;
        if (move_uploaded_file($_FILES[file_doc][tmp_name],$target_file)) {
          $data = array();
          $data[product_id] = $product_id;
          $data[type] = $type_doc;
          $data[document_name] = $doc_name;
          $data[s_name] = $_POST[s_name];
          if ($start_expired != '') {
            $data[start_expired] = $start_expired;
          }
          if ($end_expired != '') {
            $data[end_expired] = $end_expired;
          }
          if ($_POST[set_day_alert] != '') {
            $data[day_alert] = $_POST[set_day_alert];
          }
          if ($_POST[alert_phone] != '') {
            $data[alert_phone] = $_POST[alert_phone];
          }
          if ($_POST[alert_email] != '') {
            $data[alert_email] = $_POST[alert_email];
          }
          if ($_POST[email] != '') {
            $data[email] = $_POST[email];
          }
          if ($_POST[phone] != '') {
            $data[phone] = $_POST[phone];
          }



          $add = $this->db->insert(TBL_PLACE_DOCUMENT_FILE,$data);
          $result[status] = $add;
          $result[msg] = 'อัพโหลดไฟล์สำเร็จ';
        }
      }
    }
    else {
      $result[status] = false;
      $result[msg] = 'ไฟล์ที่อับโหลดไม่ถูกต้อง กรุณาอับโหลดใหม่';
      // return  '$type';
    }






    // $num = time();
    // $ext = pathinfo($_FILES['file']['name'][0], PATHINFO_EXTENSION);
    // $doc_name = $type_doc.'_'.$product_id.'_'.$num.'.'.$ext;
    // $target_file = "../data/pic/document/place/".$doc_name;
    // if(move_uploaded_file($tmpFilePath, $target_file)) {
    // 	$array = array(
    // 		"product_id"=>$product_id, 
    // 		"document_name"=>$doc_name, 
    // 		"type"=>$type_doc,
    // 		"start_expired"=>$start_expired,
    // 		"end_expired"=>$end_expired,
    // 		"email"=>$_POST[email_send],
    // 		"phone"=>$_POST[phone_send],
    // 		"alert_phone"=>$_POST[alert_phone],
    // 		"alert_email"=>$_POST[alert_email],
    // 		"day_alert"=>$_POST[day_alert],
    // 		"status"=>1
    // 	);	
    // for($i=0; $i<count($_FILES['file']['name']); $i++) {
// 
    // $tmpFilePath = $_FILES['file']['tmp_name'][$i];
    // if($tmpFilePath != ""){
    // $ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
    // $num = time();
    // $doc_name = $type_txt.$product_id."_".$num.$i.".".$ext;
    // $target_file = "../data/pic/document/place/".$type_txt.$product_id."_".$num.$i.".".$ext;
    // if(move_uploaded_file($tmpFilePath, $target_file)) {
    // 	$array = array(
    // 		"product_id"=>$product_id, 
    // 		"document_name"=>$doc_name, 
    // 		"type"=>$type_doc,
    // 		"start_expired"=>$start_expired,
    // 		"end_expired"=>$end_expired,
    // 		"email"=>$_POST[email_send],
    // 		"phone"=>$_POST[phone_send],
    // 		"alert_phone"=>$_POST[alert_phone],
    // 		"alert_email"=>$_POST[alert_email],
    // 		"day_alert"=>$_POST[day_alert],
    // 		"status"=>1
    // 	);	
    //  	// $reuslt = $db->add_db('place_document_file',$array);
    // }
    // }
    // }
    $xx[post] = $_POST;
    $xx[files] = $_FILES;
    $xx[type] = $type;
    $xx[doc_name] = $doc_name;
    $xx[target_file] = $target_file;

    return $result;
  }

  public function save_uploadimg() {
    header('Content-Type: application/json');
    // if ($_FILES["file"]["name"]) {
    $xx[post] = $_POST;
    $xx[files] = $_FILES;
    // return $xx;
    $product_id = $_POST[shop_id_upload];
    $result = array();
    $type = explode('.',$_FILES[file][name]);
    $type = strtolower($type[count($type) - 1]);
    // return $type.'---';
    // $url = "../data/pic/document/place/";

    $num = time();
    if ($_GET[opt] == 'logo') {
      $doc_name = $_GET[opt].$product_id.'.'.$type;
    }
    else {
      $doc_name = $_GET[opt].$product_id.'_'.$num.'.'.$type;
    }

    $target_file = "../data/pic/place/".$doc_name;
    // return $_FILES[file][name].'-----'.$_FILES[file][tmp_name];
    if (in_array($type,array("jpg","jpeg","gif","png"))) {
      // return  $type;
      if (is_uploaded_file($_FILES[file][tmp_name])) {
        // return $target_file;
        if (move_uploaded_file($_FILES[file][tmp_name],$target_file)) {
          if ($_GET[opt] == 'logo') {
            $data = array();
            $data[pic_logo] = $doc_name;
            $this->db->where('id',$product_id);
            $add = $this->db->update(TBL_SHOPPING_PRODUCT,$data);
          }
          else {

            $data = array();
            $data[product_id] = $product_id;
            $data[s_name] = $doc_name;
            $add = $this->db->insert(TBL_SHOP_DOCUMENT_FILE_IMG,$data);
          }
          $result[status] = $add;
          $result[s_name] = $doc_name;
          $result[msg] = 'อัพโหลดไฟล์สำเร็จ';
          return $result;
        }
      }
    }
    else {
      $result[status] = false;
      $result[s_name] = '';
      $result[msg] = 'ไฟล์ที่อับโหลดไม่ถูกต้อง กรุณาอับโหลดใหม่';
      return $result;
      // return  '$type';
    }
  }

  /*   * ******* END SHOP MODEL ********* */

  public function cancel_shop() {
    $data[status] = "CANCEL";
    $data[cancel_type] = $_POST[type_cancel];
    $data[driver_complete] = 1;
    $data[update_date] = time();
// 	$data[result] = $db->update_db('order_booking',$data," id='".$_GET[id]."' ");
    $this->db->where('id',$_POST[order_id]);
    $data[result] = $this->db->update('order_booking',$data);


    $typname = "typname_".$_POST[type_cancel];
    $data_his[order_id] = $_POST[order_id];
    $data_his[type] = $typname;
    $data_his[status] = "CANCEL";
    $data_his[type] = $_POST[type];
    $data_his[posted] = $_POST[username];
    $data_his[post_date] = time();
    $data_his[update_date] = time();
//	$data_his[result] = $db->add_db('history_del_order_booking', $data_his);
    $data_his[result] = $this->db->insert('history_del_order_booking',$data_his);
    ;
//	$data_his[result] = true;
    $data[history] = $data_his;

    return $data;
  }

  function linenoti() {
    $txt_short = 'ทะเบียน '.$_POST[car_plate];
    $txt_short .= ' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
    $title = "ทำรายการใหม่";
    $time_post = date('Y-m-d h:i:s');
    $mm = $_POST[time_num];
    if ($_POST[time_num] < 10) {
      $mm = "0".$_POST[time_num];
    }
    if ($_POST[adult] < 1) {
      $_POST[adult] = 0;
    }
    $txt_short2 = 'สถานที่ '.$_POST[pro_name].' ';
    $txt_short2 .= 'ทำรายการเวลา '.$time_post.'  น. ';
    $txt_short2 .= 'จะถึงสถานที่ในอีก '.$mm.' นาที ';
    $txt_short2 .= 'จำนวนแขก '.$_POST[adult].' คน';

    $str = $title.$txt_short."\n".$txt_short2."\n\nรายละเอียดคนขับ\n"."ชื่อ-สกุล : ".$_POST[dri_name]."\n เบอร์โทร".$_POST[dri_phone];
    define('LINE_API',"https://notify-api.line.me/api/notify");
    $token = "NKtM17mRVqSAoIraJJyKbNkloWrF7QCM2kZCTsXvLXb"; //ใส่Token ที่copy เอาไว้
    $res = $this->notify_message($str,$token);
  }

  function notify_message($message,$token) {
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"."Authorization: Bearer ".$token."\r\n"."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
  }

  public function driver_topoint() {

    $data[$_GET[type].'_date'] = time();
    $data[$_GET[type]] = 1;
    $data["check_".$_GET[type]] = 1;
    $data[$_GET[type]."_lat"] = $_GET[lat];
    $data[$_GET[type]."_lng"] = $_GET[lng];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true; 
    $data[next_step] = "guest_receive";
    $data[time] = time();

    return $data;
  }

  public function guest_receive() {

    $data[check_guest_receive] = 1;
    $data[guest_receive_date] = time();
    $data[driver_pickup_lat] = $_GET[lat];
    $data[driver_pickup_lng] = $_GET[lng];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[next_step] = "guest_register";
    $data[time] = time();

    return $data;
  }

  public function guest_register() {
    $data[check_guest_register] = 1;
    $data[guest_register_date] = time();
    $data[driver_register_lat] = $_GET[lat];
    $data[driver_register_lng] = $_GET[lng];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[next_step] = "driver_pay_report";
    $data[time] = time();

    return $data;
  }

  public function driver_pay_report() {
    $data[check_driver_pay_report] = 1;
    $data[driver_pay_report_date] = time();

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[next_step] = "finish";
    $data[time] = time();

    return $data;
  }

  public function driver_complete() {
    $data[driver_complete] = 1;
    $data[driver_complete_date] = time();
    $data[driver_complete_lat] = $_GET[lat];
    $data[driver_complete_lng] = $_GET[lng];
    $data[status] = "COMPLETED";

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[time] = time();

    return $data;
  }

  public function editadult() {
    $data['adult'] = $_GET[num];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);

    return $data;
  }

  public function place_companycount() {
    $this->db->select('count(*)');
    $this->db->from(TBL_SHOPPING_PRODUCT);
    $this->db->where('status','1');
    $query = $this->db->get();

    return $query->num_rows();
    // $this->load->view('shop/place_company',$data);
  }

  public function car_count() {
    $login_id = $this->input->cookie('detect_user');
    //echo $login_id;
    // $this->db->select('count(*)');
    $this->db->from(TBL_WEB_CARALL);
    $this->db->where('drivername',$login_id);
    $query = $this->db->get();
    // echo $query->num_rows();
    return $query->num_rows();
    // $this->load->view('shop/place_company',$data);
  }

  public function car_counthis() {
    $login_id = $this->input->cookie('detect_user');
    //echo $login_id;
    // $this->db->select('count(*)');
    $this->db->from(TBL_WEB_CARALL);
    $this->db->where('drivername',$login_id);
    $query = $this->db->get();
    // echo $query->num_rows();
    return $query->num_rows();
    // $this->load->view('shop/place_company',$data);
  }

  public function updatetype() {
    ///////////// Time
    $id = $_POST[id];
    $status = $_POST[status];
    $compensation = $_POST[i_icompensation];
    if ($status == 0) {
      $status = 1;
    }
    else {
      $status = 0;
    }
    $field = $this->input->post('field');

    $_where = array();
    $_where['i_shop'] = $id;
    $_where['s_field'] = $field;
    // $_where['time_other_number'] = 2;




    $num = $this->Main_model->num_row(TBL_SHOP_EXPENDITURE_TYPE,$_where);
    if ($num == 0) {
      $data = array();
      $data[i_shop] = $id;
      $data[s_field] = $field;
      $data[i_status] = 1;
      $data[i_compensation] = $compensation;
      $data[s_db] = '_'.$field;
      $result = $this->db->insert(TBL_SHOP_EXPENDITURE_TYPE,$data);
    }
    else {
      $data = array();
      $data[i_status] = $status;
      $where = array();
      $where[i_shop] = $id;
      $where[i_compensation] = $compensation;
      // $this->db->where(i_shop, $id);
      // $this->db->where(i_compensation, $compensation);
      $result = $this->db->update(TBL_SHOP_EXPENDITURE_TYPE,$data,array('i_shop' => $id,'i_compensation' => $compensation));
    }

//     $_where = array();
// $_wh
    // $this->$field = $status;
    // $result= $this->db->update(TBL_SHOP_EXPENDITURE_TYPE,$this,array('id' => $id));
    // $this->session->set_userdata(array('savedata' => 1));
    return $result;
  }

  public function updatetype2() {
    ///////////// Time
    $id = $_POST[id];
    $status = $_POST[status];
    $compensation = $_POST[i_icompensation];
    if ($status == 0) {
      $status = 1;
    }
    else {
      $status = 0;
    }
    $field = $this->input->post('field');

    $_where = array();
//    $_where['i_shop'] = $id;
    $_where['id'] = $compensation;
    $this->db->select('*');
    $qr_pg = $this->db->get_where(TBL_PARTNER_CONTROL,$_where);
    $num_row = $qr_pg->num_rows();
    if ($num_row == 0) {
      $type = "insert";
      $data[i_status] = $status;
      $data[i_partner_group] = $_POST[partner_group];
      $data[i_shop] = $_POST[id];
      $result = $this->db->insert(TBL_PARTNER_CONTROL,$data);
    }
    else {
      $type = "update";
      $data[i_status] = $status;
//      $data[i_partner_group] = $_POST[i_partner_group];
//      $data[i_shop] = $_POST[id];
      $_where = array();
      $_where[id] = $compensation;
      $result = $this->db->update(TBL_PARTNER_CONTROL,$data,$_where);
      $data[id] = $compensation;
    }
    $return[result] = $result;
    $return[data] = $data;
    $return[type] = $type;
    $return[post] = $_POST;
    $return[num_rows] = $num_row;

    return $return;
  }

  public function submit_detail_pay() {
    $i_shop = $_POST[i_shop];
    $s_masage = $_POST[s_masage];
    $_where = array();
    $_where['i_shop'] = $i_shop;
    $num = $this->Main_model->num_row(TBL_SHOP_DETAIL_PAY,$_where);
    if ($num == 0) {
      $data = array();
      $data[i_shop] = $i_shop;
      $data[s_masage] = $s_masage;
      $result = $this->db->insert(TBL_SHOP_DETAIL_PAY,$data);
    }
    else {
      $data = array();
      $data[s_masage] = $s_masage;
      $where = array();
      $where[i_shop] = $i_shop;
      $result = $this->db->update(TBL_SHOP_DETAIL_PAY,$data,$where);
    }

    return $result;
  }

  public function deleteimg() {
    $result = array();
    $_where = array();
    $_where['id'] = $_GET[id];
    $_select = array('*');
    $FILE_IMG = $this->Main_model->rowdata(TBL_SHOP_DOCUMENT_FILE_IMG,$_where,$_select);

    $doc_name = $FILE_IMG->s_name;

    $target_file = "../data/pic/place/".$doc_name;
    unlink($target_file);
    $this->db->where('id',$_GET[id]);
    $query = $this->db->delete(TBL_SHOP_DOCUMENT_FILE_IMG);
    $result[status] = $query;
    $result[s_name] = $doc_name;
    $result[msg] = 'ลบไฟล์สำเร็จ';
    $result[i_shop] = $FILE_IMG->product_id;
    return $result;
  }

  /*   * *
   * 
   * new 
   * 
   * ** */

  public function submit_planpack() {

    $_where[id] = $_POST[i_partner_group];
    $this->db->select('id,i_from,i_to');
    $query = $this->db->get_where(TBL_PARTNER_GROUP,$_where);
    $get_i_from = $query->row();

    if ($_POST[i_partner_group] == 1) {
      foreach ($_POST[i_plan] as $key => $val) {
        $plan_pack = array();
        $plan_pack[s_topic] = $val;
        $plan_pack[i_shop] = intval($_POST[i_shop]);
        $plan_pack[i_user] = intval($_POST[i_user]);
        $plan_pack[i_country] = intval($_POST[i_country]);
        $plan_pack[i_partner_group] = intval($_POST[i_partner_group]);
        $plan_pack[i_partner] = intval($get_i_from->i_from);
        $plan_pack[result] = $this->db->insert(TBL_PLAN_PACK,$plan_pack);
        $i_plan_pack = $this->db->insert_id();
        $array_planpack[$key] = $plan_pack;

        $pack_list = array();
        $pack_list[i_plan_main] = $key;
        $pack_list[i_plan_pack] = $i_plan_pack;
        $pack_list[i_pay_type] = 2;
        $pack_list[result] = $this->db->insert(TBL_PLAN_PACK_LIST,$pack_list);
        $array_packlist[$key] = $pack_list;

        if ($plan_pack[result] == 1 and $pack_list[result] == 1) {
          $result = true;
        }
        else {
          $result = false;
        }
      }
      $data[pack] = $array_planpack;
      $data[pack_list] = $array_packlist;
      $data[result] = $result;
    }
    else {

      $plan_pack[s_topic] = $_POST[s_topic];
      $plan_pack[i_shop] = intval($_POST[i_shop]);
      $plan_pack[i_user] = intval($_POST[i_user]);
      $plan_pack[i_country] = intval($_POST[i_country]);
      $plan_pack[i_partner_group] = intval($_POST[i_partner_group]);
      $plan_pack[i_partner] = intval($get_i_from->i_from);
      $plan_pack[result] = $this->db->insert(TBL_PLAN_PACK,$plan_pack);
      $i_plan_pack = $this->db->insert_id();
      $num = 0;

      foreach ($_POST[i_plan] as $key => $val) {
        $pack_list = array();
        $pack_list[i_plan_main] = $key;
        $pack_list[i_plan_pack] = $i_plan_pack;
        $pack_list[i_pay_type] = 2;
        
        $_where = array();
        $_where['t2.i_plan_main'] = $key;
        $_where['t1.i_shop'] = $_POST[i_shop];
        $_where['t1.i_partner_group'] = 1;
        $_where['t1.i_country'] = $_POST[i_country];
        
        $this->db->select('*');
        $this->db->where($_where);
        $this->db->from(TBL_PLAN_PACK." as t1");
        $this->db->join(TBL_PLAN_PACK_LIST." as t2",'t1.id = t2.i_plan_pack');
        $query2 = $this->db->get();
        $con = $query2->row();

        $pack_list[i_con_plan_main_list] = $con->i_con_plan_main_list;
        $pack_list[result] = $this->db->insert(TBL_PLAN_PACK_LIST,$pack_list);
        $array_packlist[$key] = $pack_list;
      }
      if ($plan_pack[result] == 1) {
        $result = true;
      }
      else {
        $result = false;
      }
      $data[pack] = $plan_pack;
      $data[pack_list] = $array_packlist;
      $data[result] = $result;
    }
    $data[post] = $_POST;
    return $data;
  }

  public function save_condition() {
//    $_POST[pack_id]
    $type = $_POST[condition_type];
    $pack_l[i_con_plan_main_list] = $type;
    $this->db->where('i_plan_pack',$_POST[pack_id]);
    $update = $this->db->update(TBL_PLAN_PACK_LIST,$pack_l);


    if ($type == 1) {
      $_where = array();
      $_where[i_plan_main] = $_POST[plan_main];
      $_where[i_plan_pack] = $_POST[pack_id];
      $this->db->select('id');
      $query = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
      $check = $query->num_rows();

//      $data[check] = $check;
      $data[f_price] = $_POST[f_price];
      $data[f_vat] = $_POST[f_vat];
      $data[f_wht] = $_POST[f_wht];
//      $data[i_shop] = $_POST[i_shop];
      $data[i_plan_main] = $_POST[plan_main];
      $data[i_plan_pack] = $_POST[pack_id];
      $data[i_con_type] = $type;
      $data[d_post_date] = date('Y-m-d H:i:s');
      $data[d_last_update] = date('Y-m-d H:i:s');
      if ($check > 0) {
        $_where = array();
        $_where[i_plan_main] = $_POST[plan_main];
        $_where[i_plan_pack] = $_POST[pack_id];
        $data[result] = $this->db->update(TBL_CON_EACH_PERSON,$data,$_where);
        $data[type] = "update";
      }
      else {
        $data[result] = $this->db->insert(TBL_CON_EACH_PERSON,$data);
        $data[type] = "insert";
      }
      $return[data] = $data;
    }
    else if ($type == 2) {

      foreach ($_POST[row_car] as $key => $value) {
        $_where = array();
//        $_where[i_plan_main] = $_POST[plan_main];
        $_where[i_plan_pack] = $_POST[pack_id];
        $_where[i_car_type] = $value[car_type_id];
//        $check = 0;
        $this->db->select('id');
        $query = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
        $check = $query->row()->id;

        $data = array();
        $data[f_price] = $value[price];
        $data[f_vat] = $value[vat];
        $data[f_wht] = $value[wht];
        $data[i_plan_main] = $_POST[plan_main];
        $data[i_plan_pack] = $_POST[pack_id];
        $data[i_con_type] = $type;
        $data[d_post_date] = date('Y-m-d H:i:s');
        $data[d_last_update] = date('Y-m-d H:i:s');
        $data[i_car_type] = $value[car_type_id];
        if ($check > 0) {
          $_where = array();
//          $_where[i_plan_main] = $_POST[plan_main];
//          $_where[i_plan_pack] = $_POST[pack_id];
          $_where[id] = $query->row()->id;
          $data[result] = $this->db->update(TBL_CON_EACH_CAR,$data,$_where);
          $data[type] = "update";
        }
        else {
          $data[result] = $this->db->insert(TBL_CON_EACH_CAR,$data);
          $data[type] = "insert";
        }
        $data[ck] = $check;
        $data[i_car_type] = $value[car_type_id];
        $row[$key] = $data;
      }
      $return[data] = $row;
    }

    $return[post] = $_POST;
    $return[update_pack_l] = $update;

    return $return;
  }

  public function select_con() {
    $type = $_GET[type];
    $data[i_con_plan_main_list] = $type;
    $_where = array();
    $_where[i_plan_main] = $_POST[plan_main];
    $_where[i_plan_pack] = $_POST[pack_id];

    $data[result] = $this->db->update(TBL_PLAN_PACK_LIST,$data,$_where);
    $data[where] = $_where;
    return $data;
  }

  public function save_con_each_person() {
    $_where = array();
    $_where[i_plan_main] = $_POST[plan_main];
    $_where[i_plan_pack] = $_POST[pack_id];
    $this->db->select('id');
    $query = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
    $check = $query->num_rows();

    $data[f_price] = $_POST[f_price];
    $data[f_vat] = $_POST[f_vat];
    $data[f_wht] = $_POST[f_wht];
    $data[i_person_up] = $_POST[i_person];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_con_type] = 1;
    $data[d_post_date] = date('Y-m-d H:i:s');
    $data[d_last_update] = date('Y-m-d H:i:s');
    if ($check > 0) {
      $_where = array();
//      $_where[i_plan_main] = $_POST[plan_main];
//      $_where[i_plan_pack] = $_POST[pack_id];
      $_where[id] = $_POST[id];
      $data[result] = $this->db->update(TBL_CON_EACH_PERSON,$data,$_where);
      $data[type] = "update";
    }
    else {
      $data[result] = $this->db->insert(TBL_CON_EACH_PERSON,$data);
      $data[type] = "insert";
    }
    $data[post] = $_POST;
//    $return[data] = $data;
    return $data;
  }

  public function select_each_car() {
    $_where = array();
    $_where[i_plan_main] = $_POST[plan_main];
    $_where[i_plan_pack] = $_POST[pack_id];
    $_where[i_car_type] = $_POST[id];
    $this->db->select('id');
    $query = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
    $check = $query->num_rows();

    $data[i_car_type] = $_POST[id];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_con_type] = 2;
    $data[i_status] = $_POST[status];

    $data[d_last_update] = date('Y-m-d H:i:s');
    if ($check > 0) {
      $_where = array();
      $_where[id] = $query->row()->id;
      $data[result] = $this->db->update(TBL_CON_EACH_CAR,$data,$_where);
      $data[type] = "update";
    }
    else {
      $data[d_post_date] = date('Y-m-d H:i:s');
      $data[result] = $this->db->insert(TBL_CON_EACH_CAR,$data);
      $data[type] = "insert";
    }
    return $data;
  }

  public function save_con_each_car() {
    $_where = array();
    $_where[i_plan_main] = $_POST[plan_main];
    $_where[i_plan_pack] = $_POST[pack_id];
    $_where[i_car_type] = $_POST[id];
    $this->db->select('id');
    $query = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
    $check = $query->num_rows();

    $data[f_price] = $_POST[f_price];
    $data[f_vat] = $_POST[f_vat];
    $data[f_wht] = $_POST[f_wht];
    $data[i_car_type] = $_POST[id];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_con_type] = 2;

    $data[d_last_update] = date('Y-m-d H:i:s');
    if ($check > 0) {
      $_where = array();
      $_where[id] = $query->row()->id;
      $data[result] = $this->db->update(TBL_CON_EACH_CAR,$data,$_where);
      $data[type] = "update";
    }
    else {
      $data[d_post_date] = date('Y-m-d H:i:s');
      $data[result] = $this->db->insert(TBL_CON_EACH_CAR,$data);
      $data[type] = "insert";
    }
    return $data;
  }

  public function add_data_regis_only() {

    $data[i_con_type] = 4;
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_num_regis] = $_POST[i_num_regis];
    $data[d_last_update] = date('Y-m-d H:i:s');
    $data[d_post_date] = date('Y-m-d H:i:s');
    $data[result] = $this->db->insert(TBL_CON_PS_ONLY_REGIS,$data);
    $data[type] = "insert";
    $data[last_id] = $this->db->insert_id();

    return $data;
  }

  public function add_data_each_person() {

    $data[i_con_type] = 1;
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_plan_main] = $_POST[plan_main];
//    $data[i_num_regis] = $_POST[i_num_regis];
    $data[d_last_update] = date('Y-m-d H:i:s');
    $data[d_post_date] = date('Y-m-d H:i:s');
    $data[result] = $this->db->insert(TBL_CON_EACH_PERSON,$data);
    $data[type] = "insert";
    $data[last_id] = $this->db->insert_id();

    return $data;
  }

  public function deleted_regis_only() {

    $this->db->where('id',$_GET[id]);
    $result = $this->db->delete(TBL_CON_PS_ONLY_REGIS);
    return $result;
  }

  public function deleted_each_person() {

    $this->db->where('id',$_GET[id]);
    $result = $this->db->delete(TBL_CON_EACH_PERSON);
    return $result;
  }

  public function save_con_regis_only() {

    $_where = array();
    $_where[id] = $_POST[id];
    $this->db->select('id');
    $query = $this->db->get_where(TBL_CON_PS_ONLY_REGIS,$_where);
    $check = $query->num_rows();

    $data[f_price] = $_POST[f_price];
    $data[f_vat] = $_POST[f_vat];
    $data[f_wht] = $_POST[f_wht];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_con_type] = 4;
    $data[d_last_update] = date('Y-m-d H:i:s');
    if ($check > 0) {
      $_where = array();
      $_where[id] = $_POST[id];
      $data[result] = $this->db->update(TBL_CON_PS_ONLY_REGIS,$data,$_where);
      $data[type] = "update";
    }
    else {
      $data[d_post_date] = date('Y-m-d H:i:s');
      $data[result] = $this->db->insert(TBL_CON_PS_ONLY_REGIS,$data);
      $data[type] = "insert";
    }

    return $data;
  }

  public function select_com_product_type() {
    $_where = array();
    $_where[i_plan_main] = $_POST[plan_main];
    $_where[i_plan_pack] = $_POST[pack_id];
    $_where[i_product_sub_typelist] = $_POST[id_sub_typelist];
    $this->db->select('id');
    $query = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
    $check = $query->num_rows();

    $data[i_product_sub_typelist] = $_POST[id_sub_typelist];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_con_type] = 5;
    $data[i_status] = $_POST[status];

    $data[d_last_update] = date('Y-m-d H:i:s');
    if ($check > 0) {
      $_where = array();
      $_where[id] = $query->row()->id;
      $data[result] = $this->db->update(TBL_CON_COM_PRODUCT_TYPE,$data,$_where);
      $data[type] = "update";
    }
    else {
      $data[d_post_date] = date('Y-m-d H:i:s');
      $data[result] = $this->db->insert(TBL_CON_COM_PRODUCT_TYPE,$data);
      $data[type] = "insert";
    }
    return $data;
  }

  public function save_con_product_type() {

//    $_where = array();
//    $_where[id] = $_POST[id];
//    $this->db->select('id');
//    $query = $this->db->get_where(TBL_CON_PS_ONLY_REGIS,$_where);
//    $check = $query->num_rows();

    $data[f_price] = $_POST[f_price];
    $data[f_vat] = $_POST[f_vat];
    $data[f_wht] = $_POST[f_wht];
    $data[i_plan_main] = $_POST[plan_main];
    $data[i_plan_pack] = $_POST[pack_id];
    $data[i_con_type] = 5;
    $data[d_last_update] = date('Y-m-d H:i:s');
//    if ($check > 0) {
    $_where = array();
    $_where[i_product_sub_typelist] = $_POST[id];
    $_where[i_plan_main] = $_POST[plan_main];
    $_where[i_plan_pack] = $_POST[pack_id];
    $data[result] = $this->db->update(TBL_CON_COM_PRODUCT_TYPE,$data,$_where);
    $data[type] = "update";
//    }
//    else {
//      $data[d_post_date] = date('Y-m-d H:i:s');
//      $data[result] = $this->db->insert(TBL_CON_PS_ONLY_REGIS,$data);
//      $data[type] = "insert";
//    }
    return $data;
  }

  public function del_plan_pack() {

    $this->db->where('id',$_POST[i_plan_pack]);
    $result[TBL_PLAN_PACK] = $this->db->delete(TBL_PLAN_PACK);

    $this->db->where('i_plan_pack',$_POST[i_plan_pack]);
    $result[TBL_PLAN_PACK_LIST] = $this->db->delete(TBL_PLAN_PACK_LIST);

    $this->db->where('i_plan_pack',$_POST[i_plan_pack]);
    $result[TBL_CON_COM_PRODUCT_TYPE] = $this->db->delete(TBL_CON_COM_PRODUCT_TYPE);

    $this->db->where('i_plan_pack',$_POST[i_plan_pack]);
    $result[TBL_CON_EACH_CAR] = $this->db->delete(TBL_CON_EACH_CAR);

    $this->db->where('i_plan_pack',$_POST[i_plan_pack]);
    $result[TBL_CON_EACH_PERSON] = $this->db->delete(TBL_CON_EACH_PERSON);

    $this->db->where('i_plan_pack',$_POST[i_plan_pack]);
    $result[TBL_CON_PS_ONLY_REGIS] = $this->db->delete(TBL_CON_PS_ONLY_REGIS);

    $this->db->where('i_plan_pack',$_POST[i_plan_pack]);
    $result[TBL_CON_EACH_PS_ALL_PAY] = $this->db->delete(TBL_CON_EACH_PS_ALL_PAY);

    return $result;
  }

  public function check_duplicate_pack() {
    $pack_list = array();

    $_where = array();
    $_where[i_country] = $_POST[i_country];
    $_where[i_shop] = $_POST[i_shop];
    $_where[i_partner_group] = $_POST[i_partner_group];
//    $_where[i_partner] = $_POST[i_user];
    $_where[i_status] = 1;
    $this->db->select('*');
    $query = $this->db->get_where(TBL_PLAN_PACK,$_where);
//    $pack_list[pack] = $query->result();
    foreach ($query->result() as $key1 => $val1) {
      foreach ($_POST[i_plan] as $key2 => $val2) {

        $_where = array();
        $_where[i_plan_main] = $key2;
        $_where[i_plan_pack] = $val1->id;
        $_where[i_status] = 1;
        $this->db->select('id');
        $query = $this->db->get_where(TBL_PLAN_PACK_LIST,$_where);
        $check = $query->num_rows();
        $res_chk = false; // ture = duplicate, false = unique
        if ($check > 0) {
          $res_chk = true;
        }
//        $chk[$key2] = $res_chk;
      }
    }
    $pack_list[chk] = $res_chk;
    $pack_list[post] = $_POST;
    return $pack_list;
  }

}
