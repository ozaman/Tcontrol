<?php 
if($this->Mobile_model->version('iPad')){
    // Code to run for the Apple iOS platform.
$detectname='iPad';
}
if($this->Mobile_model->version('iPhone')){
    // Code to run for the Apple iOS platform.
$detectname='iPhone';
}
if($this->Mobile_model->version('Android')){
    // Code to run for the Apple iOS platform.
$detectname='Android';

}
else {

$detectname='Other';
}

if($_GET[type]=="phone"){?>
<div style="margin-top: 0px;">
<?
   /*$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[contact] = $db->select_query("SELECT id,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='phone' and status=1");
   while($arr[contact] = $db->fetch($res[contact])){ */ 
   $query = $this->db->query("SELECT id,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='phone' and status=1");
	foreach ($query->result() as $row){
   ?>
<a  href="tel://<?=$row->phone;?>"  id="tel"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none;">
   <div style="padding:5px; margin-top:10px; " class="div-all-zello"  >
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tbody>
         <tr>
            <td width="55"><i class="fa fa-phone-square" style="font-size:54px; color: #8DC63F; border:none"></i></td>
            <td>
               <table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tbody>
                     <tr>
                        <td>
<a  href="tel://<?=$row->phone;?>" style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none;">
<b>   <?=$row->name;?> </b>
</a>
						</td>
					 </tr>
					 <tr>
					 	<td><div style="color:#3333333"><?=$row->phone;?> </div></td>
					 </tr>
					 <tr>
					 	<td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none;">
						<?  if($arr[contact][usertype]=='sale'){
							echo t_marketing;
							 } else {
							echo t_receptionist;
						 } ?>
						</td>
					 </tr>
					</tbody>
				</table>
			</td>
		</tr>
		</tbody>
	</table>
</div>
</a>
<? } ?>
</div>
<? }

else if($_GET[type]=="zello"){ 
   ?>
   <div style="margin-top: 0px;">
<?php
   /*$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[contact] = $db->select_query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello'");
   while($arr[contact] = $db->fetch($res[contact])){*/  
   $query = $this->db->query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello'");
	foreach ($query->result() as $row){
 
 if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ 
	$href = $row->phone;
 } 
 if($detectname=='Android' ){ 
	$href = "zello://".$row->channel."?add_channel";
 } ?>

<a href="<?=$href;?>"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">
   <div style="padding:5px; margin-top:15px; " class="div-all-zello"  >
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
         <tbody>
            <tr>
               <td width="120"><img src="../data/qrcode/zello/<?=$row->channel;?>.png?v=<?=$row->update_date;?>"  width="100%"   border="0"       /></td>
               <td>
                  <table width="100%" border="0" cellpadding="2" cellspacing="2">
                     <tbody>
                        <tr>
                           <td><? if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ ?>
<a  href="<?=$row->phone;?>"  id="booking_edit_<?=$row->id;?>"   target="_blank"   style="font-size:16px; margin-left:0px;  padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
<b>    <?=$row->channel;?>
</a>
<? }   ?>
<? if($detectname=='Android' ){ ?>
<a  href="zello://<?=$row->channel;?>?add_channel"  id="booking_edit_<?=$row->id?>"   style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
<b>   <?=$row->channel;?>
</a>
<? } ?></td>
</tr>
						<tr>
							<td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none"><?=$row->name;?></td>
						</tr>
					</tbody>
				</table>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
</a>
<? } ?>
</div>
<? }
?>