<?php 
if($_GET[type]=="id_card"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['idcard_upload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_card/".$_GET[id]."_idcard.jpg","JPG");
	$return[result] = $result;
	$return[path] = "../../../../data/pic/driver/id_card/".$_GET[id]."_idcard.jpg";
	echo json_encode($return);
//	echo json_encode($_FILES);
	exit();
}
if($_GET[type]=="id_driving"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['iddriving_upload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg","JPG");
	$return[result] = $result;
	$return[path] = "../../../../data/pic/driver/id_driving/".$_GET[id]."_iddriving.jpg";
	echo json_encode($return);
	exit();
}
if($_GET[type]=="car_img"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/car/".$_GET[id]."_".$_GET[num].".jpg","JPG");
	$return[path] = "../../../../data/pic/car/".$_GET[id]."_".$_GET[num].".jpg";
	$return[result] = $result;
	echo json_encode($return);
	exit();
}
if($_GET[type]=="book_bank_img"){
	
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/book_bank/".$_GET[id].".jpg","JPG");
	$return[path] = "../../../../data/pic/driver/book_bank/".$_GET[id].".jpg";
	$return[result] = $result;
	echo json_encode($return);
	exit();
}
if($_GET[type]=="profile"){
	/*include("class.resizepic.php");
	$original_image = $_FILES['imgInp']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	$result = $image->output_resized("../../../../data/pic/driver/small/".$_GET[id].".jpg","JPG");*/
	$result = move_uploaded_file($_FILES["imgInp"]["tmp_name"], "../../../../data/pic/driver/small/".$_GET[id].".jpg");
	$return[result] = $result;
	$return[path] = "../../../../data/pic/driver/small/".$_GET[id].".jpg";
	$return[tmp] = $_FILES["imgInp"]["tmp_name"];
	echo json_encode($return);
}

if($_GET[type]=="checkin"){
	include("class.resizepic.php");
	$original_image = $_FILES['fileUpload']['tmp_name'] ;
	$desired_width = 600;
	$desired_height = _INEWS_H ;
	$image = new hft_image($original_image);
	$image->resize($desired_width, $desired_height, '0');
	header('Content-Type: application/json');
	
	$path = "../data/fileupload/store/".$_GET['action']."_".$_GET['id'].".jpg";
	$result = $image->output_resized($path,"JPG");
	$return[result] = $result;
	$return[path] = $path;
	$return[tmp] = $original_image;
//	header('Content-Type: application/json');
	echo json_encode($return);
//	echo $_FILES['fileUpload']['tmp_name'];
}  	
?>