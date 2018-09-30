<?php
$_where = array();
$_where['i_shop_country'] = $_POST[country_id];
      	//$_where['status'] = 1;
$_select = array('*');

$_order = array();
$_order['id'] = 'asc';
$data['region_icon'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON,$_where,$_select,$_order);
foreach($data['region_icon'] as $key=>$val){
	?>
	<div class="col-md-4">
		<button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal" onclick="firstDelete('สัญชาติ <?=$val->s_topic_th;?>','<?=$val->id;?>','<?=TBL_SHOP_COUNTRY_ICON;?>')"><i class="fa fa-trash-o"></i></button>
		<img src="<?=base_url();?>assets/img/flag/icon/<?=$val->s_country_code;?>.png">

		<span style="font-size: 16px">
			<?=$val->s_topic_th;?>
		</span>
		<!-- <button onclick="firstDelete('<?=$val->topic_th;?>/<?=$val->topic_en;?>/<?=$val->topic_cn;?>','<?=$val->id;?>','<?=TBL_SHOPPING_PRODUCT_MAIN;?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"></button> -->
		
	</div>
	<?php }?>