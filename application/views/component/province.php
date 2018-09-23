<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14">ทั้งหมด</b></ons-list-header>
<?php 
	if($_GET[type]=="car"){
		
	foreach($_POST[data] as $val){ 
	?>
	    <ons-list-item id="item_car_province_<?=$val[id];?>" class="list-item" onclick="selectCarProvince('<?=$val[id];?>');" data-name="<?=$val[name_th];?>">
	            <div class="left list-item__left">
	                <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
	                <!--<span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
	            </div>
	            <div class="center list-item__center"><?=$val[name_th];?></div>
	    </ons-list-item>

<? }

	}else if($_GET[type]=="user"){ 
	
	foreach($_POST[data] as $val){ 
	?>
		<ons-list-item id="item_user_province_<?=$val[id];?>" class="list-item" onclick="selectUserProvince('<?=$val[id];?>','<?=$val[code];?>');" data-name="<?=$val[name_th];?>">
	            <div class="left list-item__left">
	                <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
	                <!--<span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
	            </div>
	            <div class="center list-item__center"><?=$val[name_th];?></div>
	    </ons-list-item>
<?	}
}
?>
	
</ons-list>

<?php 
//echo json_encode($_POST[data1]);
?>