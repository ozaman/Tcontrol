<?php 
define("DB_HOST","localhost");
define("DB_USERNAME","admin_MANbooking");
define("DB_PASSWORD","252631MANbooking");
define("DB_NAME_APP","admin_apptshare");
define("DB_NAME_BOOK","admin_booking");
include("../../includes/class.mysql.php");
$db = new DB();
if($_GET[type]=="getjob_booking"){
	$url = "http://www.welovetaxi.com:3000/updateDriverlogs";                              
	//create a new cURL resource
	$ch = curl_init($url);
	$curl_post_data3 = json_encode($_POST);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data3);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
	header('Content-Type: application/json');
	echo json_encode($decode);	
}
/*if($_GET[type]=="getjob_booking"){
				//API URL
$url = "http://www.welovetaxi.com:3000/updateDriverlogs";                              
//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$curl_post_data2 = '{"idorder": '.$_POST[idorder].',"orderid":'.$_POST[orderid].',"invoice":'.$_POST[invoice].',"code":'.$_POST[code].',"program":'.$_POST[program].',"driver":'.$_POST[driver].',"carid":'.$_POST[carid].',"pickup_place":'.$_POST[pickup_place].',"to_place":'.$_POST[to_place].',"agent":'.$_POST[agent].',"airout_time":"'.$_POST[airin_time].'","airin_time":"'.$_POST[airin_time].'","s_cost":"'.$_POST[s_cost].'","outdate":"'.$_POST[outdate].'","ondate":"'.$_POST[ondate].'"}';

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data2);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
$result = curl_exec($ch);
//close cURL resource
curl_close($ch);
$decode = 	json_decode($result);
header('Content-Type: application/json');
echo json_encode($decode);	
}	*/	
	
else if($_GET[type]=="history_booking"){
	
	$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 1 }';                            
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
	header('Content-Type: application/json');
	echo json_encode($decode);
	
}

else if($_GET[type]=="manage_booking"){
	
	$url = "http://www.welovetaxi.com:3000/getDriverlogsbyid";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';                            
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
	header('Content-Type: application/json');
	echo json_encode($decode);
}

else if($_GET[type]=="detect_driver_approve"){
	
	$url = "http://www.welovetaxi.com:3000/recheckBooking";  
	$curl_post_data = '{"idorder": '.$_POST[idorder].' }';                            
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
	header('Content-Type: application/json');
	echo json_encode($decode);
}

else if($_GET[type]=="checkin_approve"){
$typ_pay = $_GET[type_pay];	
$step = $_GET[step];
if($step=="driver_checkcar"){
//	$curl_post_data2 = '{"driver_checkcar": 1,"idorder": '.$_POST[idorder].'}';		
	if($typ_pay==1)
	{
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
        $res[dv_dp] = $db->select_query("SELECT balance,id from deposit where driver = '".$_POST[driver_id]."' ");
        $arr[dv_dp] = $db->fetch($res[dv_dp]);
        
        $pay_driver = intval($_POST[cost]) - intval($_POST[s_cost]);
        $deposit_update = intval($arr[dv_dp][balance]) + intval($pay_driver);
        
		$data[order_id] = $_POST[idorder];
		$data[deposit_pay] = $pay_driver;
		$data[balance_before] = $arr[dv_dp][balance];
		$data[status] = 1;
		$data[post_date] = time();
		$data[last_update] = time();
		$data[type_pay] = 1;
		$data[type_job] = "transfer";
		$data[driver_id] = $_POST[driver_id];
		$data[result] = $db->add_db("history_pay_driver_deposit",$data);
		$return[deposit] = $data;
				
        $update[balance] = $deposit_update;
        $update[last_update] = time();
		$update[result] = $db->update_db("deposit",$update,"id = '".$arr[dv_dp][id]."' ");
		$update[id] = $arr[dv_dp][id];
		$return[update_balance] = $update;
	}
	else{
		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
        $res[dv_dp] = $db->select_query("SELECT balance,id from deposit where driver = '".$_POST[driver_id]."' ");
        $arr[dv_dp] = $db->fetch($res[dv_dp]);
        
        $pay_driver = intval($_POST[cost]) - intval($_POST[s_cost]);
        $deposit_update = intval($arr[dv_dp][balance]) - intval($_POST[s_cost]);
        
		$data[order_id] = $_POST[idorder];
		$data[s_cost] = $_POST[s_cost];
		$data[deposit_pay] = $pay_driver;
		$data[balance_before] = $arr[dv_dp][balance];
		$data[status] = 1;
		$data[post_date] = time();
		$data[last_update] = time();
		$data[type_pay] = 0;
		$data[type_job] = "transfer";
		$data[driver_id] = $_POST[driver_id];
		$data[result] = $db->add_db("history_pay_driver_deposit",$data);
		$return[deposit] = $data;
				
        $update[balance] = $deposit_update;
        $update[last_update] = time();
		$update[result] = $db->update_db("deposit",$update,"id = '".$arr[dv_dp][id]."' ");
		$update[id] = $arr[dv_dp][id];
		$return[update_balance] = $update;
		
	}
	$db->closedb();
	/**
	* 
	* @var update ap_order status
	* 
	*/
	$up_order[status] = 1;
	$db->connectdb(DB_NAME_BOOK,DB_USERNAME,DB_PASSWORD);
	$up_order[result] = $db->update_db("ap_order",$up_order," 	invoice = '".$_POST[invoice]."' ");
	$db->closedb();
	$return[update_ap_order] = $up_order;
}
/*else{
	$f_date = $step."_date";	
	$f_lat = $step."_lat";	
	$f_lng = $step."_lng";	
	$curl_post_data2 = '{"'.$step.'": 1,"idorder": '.$_POST[idorder].',"'.$f_date.'":'.time().',"'.$f_lat.'":"'.$_POST[lat].'","'.$f_lng.'":"'.$_POST[lng].'"}';
}*/

$f_date = $step."_date";	
$f_lat = $step."_lat";	
$f_lng = $step."_lng";	
$curl_post_data2 = '{"'.$step.'": 1,"idorder": '.$_POST[idorder].',"'.$f_date.'":'.time().',"'.$f_lat.'":"'.$_POST[lat].'","'.$f_lng.'":"'.$_POST[lng].'"}';
$url = "http://www.welovetaxi.com:3000/updateJobstatus";                              

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$decode = json_decode($result);

$return[api] = $decode;
header('Content-Type: application/json');
echo json_encode($return);
//echo $curl_post_data2;
}

else if ($_GET[type]=="php_approve_job"){
	include('../../includes/class.mysql.php');
	$db = new DB();
	$db->connectdb_utf(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	
	$_POST[result] = $db->add_db('deposit_history',$_POST);
	
	$ds = $db->select_query("SELECT balance FROM deposit WHERE driver ='" . $_POST[driver] . "'    ");
    $ds = $db->fetch($ds);
	$data[balance] = intval($ds[balance]) - intval($_POST[deposit]); 
	$data[last_update] = time();
	$data[posted] = $_POST[driver];
	$data[ip] = $_SERVER['REMOTE_ADDR'];
	$data[result] = $db->update_db('deposit',$data,'driver = "'.$_POST[driver].'" ');
	$_POST[update_ds] = $data;
	header('Content-type: application/json');
	echo json_encode($_POST);
}

else if($_GET[type]=="get_my_transfer_job"){
	
	$url = "http://www.welovetaxi.com:3000/countOrderbydriver";  
	$curl_post_data = '{"driver": '.$_POST[driver].',"date": "'.$_POST[date].'","driver_checkcar" : 0 }';                            
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	$decode = 	json_decode($result);
	header('Content-Type: application/json');
	echo json_encode($decode);
}
?>