<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_model extends CI_Model {

	public function add_region(){
		$data[i_shop] = $_POST[i_shop];
		$result = $this->db->insert(TBL_SHOP_COUNTRY, $data);
		$last_id = mysql_insert_id();


		$data2[i_shop_country] = $last_id;
		$data2[i_country] = $_POST[id];
		$data2[s_country_code] = $_POST[country_code];
		$data2[s_topic_en] = $_POST[name_en];
		$data2[s_topic_th] = $_POST[name_th];
		$data2[s_topic_cn] = $_POST[name_cn];
		$result2 = $this->db->insert(TBL_SHOP_COUNTRY_ICON, $data2);
		return $result2;
	}
	public function add_region_sub(){



		$data[i_shop_country] = $_POST[id_shop_country];
		$data[i_country] = $_POST[id];
		$data[s_country_code] = $_POST[country_code];
		$data[s_topic_en] = $_POST[name_en];
		$data[s_topic_th] = $_POST[name_th];
		$data[s_topic_cn] = $_POST[name_cn];
		$result = $this->db->insert(TBL_SHOP_COUNTRY_ICON, $data);

		return $result;
	}
	public function add_plan_price(){

		$data[i_shop_country] = $_POST[i_shop_country];
		$data[i_plan_price] = $_POST[i_plan_price];	
		$result = $this->db->insert(TBL_SHOP_COUNTRY_COM, $data);
		$last_id = mysql_insert_id();

		$data2[i_shop_country_com] = $last_id;
		$data2[i_shop_country_icon] = $_POST[i_plan_price];	
		$data2[s_topic_en] = $_POST[topic_en];
		$data2[s_topic_th] = $_POST[topic_th];
		$data2[s_topic_cn] = $_POST[topic_cn];
		$result2 = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST, $data2);

		return $result;
	}

	public function add_plan_price_sub(){



		$data[i_shop_country_com] = $_POST[i_shop_country_com];
		$data[i_shop_country_icon] = $_POST[i_plan_price];	
		$data[s_topic_en] = $_POST[topic_en];
		$data[s_topic_th] = $_POST[topic_th];
		$data[s_topic_cn] = $_POST[topic_cn];
		$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST, $data);

		return $result;
	}
	public function save_plan_price(){
		$_where = array();
		$_where['i_plan_price'] = $_POST[i_price_plan];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		
		$data['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_PLAN_COM,$_where,$_select,$_order);
		$plan[i_shop_country_icon] = $_POST[i_country_icon_plan];
		$plan[i_plan_price] = $_POST[i_price_plan];	


		$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST, $plan);
		$last_id = mysql_insert_id();

		foreach ($data['plan_com'] as $val) {
			// $this->db->where('id<>',$val->i_shop_country_icon);
			// echo $val->s_topic_th;
			// $data = array();
			
			$data = array();
			$data[i_shop_country_com_list] = $last_id;
			$data[i_shop_country_icon] = $_POST[i_country_icon_plan];
			$data[i_plan_price] = $_POST[i_price_plan];	
			$data[s_topic_th] = $val->s_topic_th;
			$data[i_price] = $_POST[$val->element];
			$data[s_payment] = $_POST[money_.$val->element];
			// $data[i_plan_price] = $_POST[];

			$result = $this->db->insert(TBL_SHOP_COUNTRY_COM_LIST_PRICE, $data);

		}

		return $result;
	}

	public function save_edit_com(){
		$_where = array();
		$_where['i_shop_country_com_list'] = $_GET[i_shop_country_com_list];
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$arr['plan_com'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE,$_where,$_select,$_order);
		foreach ($arr['plan_com'] as $val) {
			// $this->db->where('id<>',$val->i_shop_country_icon);
			// echo $val->s_topic_th;
			// $data = array();
			
			//$data = array();
			
			$this->db->where('id', $val->id);
			//$ss = 'input_'.$_GET[i_shop_country_com_list].'_'.$val->id;
			$data[i_price] = $_POST[input_.$_GET[i_shop_country_com_list]._.$val->id];
			$result = $this->db->update(TBL_SHOP_COUNTRY_COM_LIST_PRICE, $data); 

		}


		return $result;
	}
	public function submit_data_plan_time(){
		$day = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		
		for($i=1;$i<=24;$i++){
			$invID = str_pad($i, 2, '0', STR_PAD_LEFT);
			$hour[] = $invID;
		}
		for($i=0;$i<=11;$i++){
			$cal = $i*5;
			$invID = str_pad($cal, 2, '0', STR_PAD_LEFT);
			$time[] = $invID;
		}
		if ($_GET[op] == 'time') {
			
		$data[open_Sun] =  $_POST[Sun];
		$data[open_Mon] =  $_POST[Mon];
		$data[open_Tue] =  $_POST[Tue];
		$data[open_Wed] =  $_POST[Wed];
		$data[open_Thu] =  $_POST[Thu];
		$data[open_Fri] =  $_POST[Fri];
		$data[open_Sat] =  $_POST[Sat];
		$this->db->where('id', $_GET[shop_id]);
		$result = $this->db->update(TBL_SHOPPING_PRODUCT, $data);
		$last_id = $_GET[shop_id];
		$data_loop = '';
		foreach($day as $value){
			$hour_open = 'hour_open_'.$value;
			$time_open = 'time_open_'.$value;
			$hour_close = 'hour_close_'.$value;
			$time_close = 'time_close_'.$value;
			$open_alway = "open_alway_".$value;
			if($_POST[$value]==NULL or $_POST[$value]==""){
				$status = 0;
			}
			else{
				$status = 1;
			}
			if($_POST[$open_alway]==NULL or $_POST[$open_alway]==""){
				$status_alway = 0;
			}else{
				$status_alway = 1;
			}

			if($_POST[$hour_open]==NULL or $_POST[$hour_open]==""){
				$hour_open_val = 00;
			}else{
				$hour_open_val = $_POST[$hour_open];
			}
			if($_POST[$time_open]==NULL or $_POST[$time_open]==""){
				$time_open_val = 00;
			}else{
				$time_open_val = $_POST[$time_open];
			}
			if($_POST[$hour_close]==NULL or $_POST[$hour_close]==""){
				$hour_close_val = 00;
			}else{
				$hour_close_val = $_POST[$hour_close];
			}
			if($_POST[$time_close]==NULL or $_POST[$time_close]==""){
				$time_close_val = 00;
			}else{
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
			
			if($num_row<=0){
				$result = $this->db->insert(TBL_SHOPPING_OPEN_TIME, $day_row);
			}else{
					$this->db->where('product_id', $last_id);
					$this->db->where('product_day', $value);
					$result = $this->db->update(TBL_SHOPPING_OPEN_TIME, $day_row);
			}
			$time_other = 'time_other_'.$value;
			if($_POST[$time_other]!="" or $_POST[$time_other]!=null){
					$hour_open2 = 'hour_open_'.$value.'_2';
					$time_open2 = 'time_open_'.$value.'_2';
					
					$hour_close2 = 'hour_close_'.$value.'_2';
					$time_close2 = 'time_close_'.$value.'_2';
					if($_POST[$hour_open2]==NULL or $_POST[$hour_open2]==""){
						$hour_open_val2 = 00;
					}else{
						$hour_open_val2 = $_POST[$hour_open2];
					}
					if($_POST[$time_open2]==NULL or $_POST[$time_open2]==""){
						$time_open_val2 = 00;
					}else{
						$time_open_val2 = $_POST[$time_open2];
					}
					if($_POST[$hour_close2]==NULL or $_POST[$hour_close2]==""){
						$hour_close_val2 = 00;
					}else{
						$hour_close_val2 = $_POST[$hour_close2];
					}
					if($_POST[$time_close2]==NULL or $_POST[$time_close2]==""){
						$time_close_val2 = 00;
					}else{
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
				if($num_row_other<=0){
					$result = $this->db->insert(TBL_SHOPPING_OPEN_TIME, $day_row_other);
				}else{
					$this->db->where('product_id', $last_id);
					$this->db->where('product_day', $value);
					$this->db->where('time_other_number', 2);
					$result = $this->db->update(TBL_SHOPPING_OPEN_TIME, $day_row_other);
				}
			}
			else{
				$day_row_other = array();
				$day_row_other['status'] = $_POST[$time_other];
				$this->db->where('product_id', $last_id);
					$this->db->where('product_day', $value);
					$this->db->where('time_other_number', 2);
				$result = $this->db->update(TBL_SHOPPING_OPEN_TIME, $day_row_other);
			}
		}
		return $data_loop;
		}
		if ($_GET[op] == 'shop') {
			$data = array();
			$data[topic_cn] =  $_POST[topic_cn];
		$data[topic_th] =  $_POST[topic_th];
		$data[topic_en] =  $_POST[topic_en];
		$data[map] =  $_POST[map];
		$data[lat_db] =  $_POST[lat_db];
		$data[lng_db] =  $_POST[lng_db];
		$data[address] =  $_POST[address];
		$data[phone] =  $_POST[phone];
		$data[email] =  $_POST[email];
		$data[province] =  $_POST[province];
		// $data[sub] =  $_POST[sub];
		$data[return_guest] =  $_POST[return_guest];
		$data[select_amphur] =  $_POST[select_amphur];
		$data[region] =  $_POST[region];
		$data[set_vat] =  $_POST[set_vat];
		$data[return_vat] =  $_POST[return_vat];
		// $data[main] =  $_POST[main];
		$this->db->where('product_id', $_GET[shop_id]);
					$this->db->where('product_day', $value);
					$result = $this->db->update(TBL_SHOPPING_PRODUCT, $day_row);



		return $data;
		}
	}














	public function cancel_shop(){
		$data[status] = "CANCEL";
		$data[cancel_type] = $_POST[type_cancel];
		$data[driver_complete] = 1;
		$data[update_date] = time();
// 	$data[result] = $db->update_db('order_booking',$data," id='".$_GET[id]."' ");
		$this->db->where('id', $_POST[order_id]);
		$data[result] = $this->db->update('order_booking', $data); 


		$typname = "typname_".$_POST[type_cancel];
		$data_his[order_id] = $_POST[order_id];
		$data_his[type] = $typname;
		$data_his[status] = "CANCEL";
		$data_his[type] = $_POST[type];
		$data_his[posted] = $_POST[username];
		$data_his[post_date] = time();
		$data_his[update_date] = time();
//	$data_his[result] = $db->add_db('history_del_order_booking', $data_his);
		$data_his[result] = $this->db->insert('history_del_order_booking', $data_his);;
//	$data_his[result] = true;
		$data[history] = $data_his;

		return $data;
	}

	function linenoti(){
		$txt_short = 'ทะเบียน '.$_POST[car_plate];
		$txt_short .=' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
		$title = "ทำรายการใหม่";
		$time_post = date('Y-m-d h:i:s');
		$mm = $_POST[time_num];
		if($_POST[time_num]<10){
			$mm = "0".$_POST[time_num];
		}
		if($_POST[adult]<1){
			$_POST[adult] = 0;
		}
		$txt_short2 = 'สถานที่ '. $_POST[pro_name].' ';
		$txt_short2 .= 'ทำรายการเวลา '.$time_post.'  น. ';
		$txt_short2 .= 'จะถึงสถานที่ในอีก '.$mm.' นาที ';
		$txt_short2 .= 'จำนวนแขก '.$_POST[adult].' คน';

		$str  = $title.$txt_short."\n".$txt_short2."\n\nรายละเอียดคนขับ\n"."ชื่อ-สกุล : ".$_POST[dri_name]."\n เบอร์โทร".$_POST[dri_phone];
		define('LINE_API',"https://notify-api.line.me/api/notify");
	$token = "NKtM17mRVqSAoIraJJyKbNkloWrF7QCM2kZCTsXvLXb"; //ใส่Token ที่copy เอาไว้
	$res = $this->notify_message($str,$token);

}

function notify_message($message,$token){
	$queryData = array('message' => $message);
	$queryData = http_build_query($queryData,'','&');
	$headerOptions = array(
		'http'=>array(
			'method'=>'POST',
			'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"."Authorization: Bearer ".$token."\r\n"."Content-Length: ".strlen($queryData)."\r\n",
			'content' => $queryData
		),
	);
	$context = stream_context_create($headerOptions);
	$result = file_get_contents(LINE_API,FALSE,$context);
}

public function driver_topoint(){

	$data[$_GET[type].'_date'] = time();
	$data[$_GET[type]] = 1;
	$data["check_".$_GET[type]] = 1;
	$data[$_GET[type]."_lat"] = $_GET[lat];
	$data[$_GET[type]."_lng"] = $_GET[lng];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true; 
	$data[next_step] = "guest_receive";
	$data[time] = time();

	return $data;
}

public function guest_receive(){

	$data[check_guest_receive] = 1;
	$data[guest_receive_date] = time();
	$data[driver_pickup_lat] = $_GET[lat];
	$data[driver_pickup_lng] = $_GET[lng];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[next_step] = "guest_register";
	$data[time] = time();

	return $data;
}

public function guest_register(){
	$data[check_guest_register] = 1;
	$data[guest_register_date] = time();
	$data[driver_register_lat] = $_GET[lat];
	$data[driver_register_lng] = $_GET[lng];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[next_step] = "driver_pay_report";
	$data[time] = time();

	return $data;
} 

public function driver_pay_report(){
	$data[check_driver_pay_report] = 1;
	$data[driver_pay_report_date] = time();

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[next_step] = "finish";
	$data[time] = time();

	return $data;
}

public function driver_complete(){
	$data[driver_complete] = 1;
	$data[driver_complete_date] = time();
	$data[driver_complete_lat] = $_GET[lat];
	$data[driver_complete_lng] = $_GET[lng];
	$data[status] = "COMPLETED";

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 
//		$data[result] = true;
	$data[time] = time();

	return $data;
}

public function editadult(){
	$data['adult'] = $_GET[num];

	$this->db->where('id', $_GET[id]);
	$data[result] = $this->db->update('order_booking', $data); 

	return $data;
}
public function place_companycount(){
	$this->db->select('count(*)');
	$this->db->from(TBL_SHOPPING_PRODUCT);
	$this->db->where('status','1');
	$query = $this->db->get();

	return $query->num_rows();
  		// $this->load->view('shop/place_company',$data);
}
public function car_count(){
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
public function car_counthis(){
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
  /**
  * 
  * driver_topoint
	guest_receive
	guest_register
	driver_pay_report
	* 
  * *********** End
  * 
  */
}