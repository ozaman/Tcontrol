<?php
$google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";
 $gen_map1 = explode('/@',$map->map);
   $gen_map = explode(',',$gen_map1[1]);
   $gen_map_address = explode('https://www.google.co.th/maps/place/',$gen_map1[0]);

 if($map->lat != ''){
    $url = "https://www.google.com/maps/embed/v1/directions?key=".$google_api."&destination=".$gen_map_address[1]."&origin=".$gen_map[0].",".$gen_map[1]."&center=".$gen_map[0].",".$gen_map[1]."&avoid=tolls|highways&zoom=12";

//  $url = "https://www.google.com/maps/embed/v1/directions?key=".$google_api."&destination=".$map->address."&origin=".$map->lat.",".$map->lng."&center=".$map->lat.",".$map->lng."&avoid=tolls|highways&zoom=12";
 }else{
   
   if($gen_map[0] > 0){
       $url = "https://www.google.com/maps/embed/v1/directions?key=".$google_api."&destination=".$gen_map_address[1]."&origin=".$gen_map[0].",".$gen_map[1]."&center=".$gen_map[0].",".$gen_map[1]."&avoid=tolls|highways&zoom=12";
   }else{
     $url = "https://www.google.com/maps/embed/v1/place?key=".$google_api."&q=".$map->address."&zoom=16";
   }
  
 }
 
 //$url = $map->map;
?>

<style>
  .load_preview_map {
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
   overflow:hidden;
  /*background: url('images/loading.gif') 50% 50% no-repeat rgb(249,249,249); background-color:#FFFFFF*/
}
iframe{
  
}
</style>
 
 
 <div id="dv_map" class="load_preview_map">
  <iframe width="100%"  height="100%"  frameborder="0" style="border:0" src="<?=$url;?>" allowfullscreen></iframe>
 </div>