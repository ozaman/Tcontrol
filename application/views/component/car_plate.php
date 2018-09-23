<?php
	foreach($_POST[data] as $val){ 
		
	?>
	    <ons-list-item id="item_car_plate_<?=$val[id];?>" class="list-item" onclick="selectPlateColor('<?=$val[id];?>','<?=$val[name_th];?>');" data-img="<?=$val[img];?>">
	            <div class="left list-item__left">
	                <img class="list-item__thumbnail" src="assets/images/car/plate/<?=$val[img];?>" style="border: 1px solid #eee;width: 70px;">
	                <!--<span class="brand-small list-item__thumbnail" style="<?=$img_pos;?>" ></span>-->
	            </div>
	            <div class="center list-item__center"><?=$val[name_th];?></div>
	    </ons-list-item>

<?php }
?>
</ons-list>