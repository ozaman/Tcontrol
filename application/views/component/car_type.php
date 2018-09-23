<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14">ที่นิยม</b></ons-list-header>
<?php 
	foreach($_POST[data] as $val){ 
		$img_pos = "background-position: ".$val[img];
	?>
	    <ons-list-item id="item_car_type_<?=$val[id];?>" class="list-item" onclick="selectCarType('<?=$val[id];?>');" data-name="<?=$val[name_th];?>" style="margin: 10px 0px;">
	            <!--<div class="left list-item__left">
	                <img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">
	                <span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>
	            </div>-->
	            <div class="center list-item__center"><?=$val[name_th];?></div>
	    </ons-list-item>

<?php }
?>
	
</ons-list>