<style>
	.onlyThisTable td{
		 	padding: 10px 5px;
	}
</style>
<div style="margin: 0px 0px;">
  <div class="card">
	<table  class="centered onlyThisTable striped" >
			<?php
            foreach ($contrac as $data){
            ?>
             <tr>
             	<td><span><?=$data->topic_th;?></span></td>
             <td>
	         	<a href="tel:<?=$data->phone?>"  id="booking_edit_<?=$data->id?>"  style="color:#333333"  >                
	         <table id="shop_alert_menu_call_<?=$data->id?>" >
		         <tr >
			         <td width="150"><span class="font-22"> <?=t_marketing;?> (<?=$data->name;?>)</span></td>
			         <td width="20" align="right"> <span > <i class="fa fa-phone" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i></span></td>
		         </tr>
	         </table>  
	         </a>
			 </td>
	         </tr>
	         <? } ?>  
	</table>
	</div>
</div>
<!--<div style="position: absolute;top: 10px;right: 25px;">
	<a onclick="$('#load_material').fadeIn(); setTimeout(function(){ $('#load_material').fadeOut(); }, 5000);" target="_blank" href="https://www.facebook.com/CSDMedia/" style="color: #3b5998;font-size:36px;"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
</div>-->
