<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14">ที่นิยม</b></ons-list-header>
<?php 
	foreach($_POST[data1] as $val){ 
		$img_pos = "background-position: ".$val[img];
	?>
	    <ons-list-item id="item_car_brand_<?=$val[id];?>" class="list-item" onclick="selectCarBrand('<?=$val[id];?>','<?=$val[img];?>');" data-name="<?=$val[name_en];?>">
	            <div class="left list-item__left">
	                <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
	                <span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>
	            </div>
	            <div class="center list-item__center"><?=$val[name_en];?></div>
	    </ons-list-item>

<? }
?>
	
</ons-list>

<ons-list id="kitten-list" class="list">
	      <ons-list-header class="list-header"><b class="font-14">ทั้งหมด</b></ons-list-header>
<?php 
	foreach($_POST[data2] as $val){ 
		$img_pos = "background-position: ".$val[img];
	?>
	    <ons-list-item id="item_car_brand_<?=$val[id];?>" class="list-item" onclick="selectCarBrand('<?=$val[id];?>','<?=$val[img];?>');" data-name="<?=$val[name_en];?>">
	            <div class="left list-item__left">
	                <!--<img class="list-item__thumbnail" src="https://placekitten.com/g/54/41">-->
	                <span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>
	            </div>
	            <div class="center list-item__center"><?=$val[name_en];?></div>
	    </ons-list-item>

<? }
?>
	
</ons-list>

<?php 
//echo json_encode($_POST[data1]);
?>