<?php 

$google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";
 
 if($_POST[lat]>0 and $_POST[lng]>0){
 	$url = "https://www.google.com/maps/embed/v1/directions?key=".$google_api."&destination=".$arr[shop][address]."&origin=".$_GET[lat].",".$_GET[lng]."&center=".$_GET[lat].",".$_GET[lng]."&avoid=tolls|highways&zoom=12";
 }else{
 	$url = "https://www.google.com/maps/embed/v1/place?key=".$google_api."&q=".$arr[shop][address]."&zoom=16";
 }
?>

<style>
	.load_preview_map {
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	 overflow:hidden;
	background: url('images/loading.gif') 50% 50% no-repeat rgb(249,249,249); background-color:#FFFFFF
}
</style>
 
 
 <div id="dv_map" class="load_preview_map">
 <iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="<?=$url;?>" allowfullscreen></iframe>
 </div>
