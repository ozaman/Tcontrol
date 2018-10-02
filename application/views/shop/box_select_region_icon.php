
<?php
$_where = array();
$_where['status'] = 1;
$_select = array('*');
$_order = array();
$_order['name_th'] = 'asc';
$data['country'] = $this->Main_model->fetch_data('','',TBL_WEB_COUNTRY,$_where,$_select,$_order);
//print_r(json_encode($data['country']));
?>
<div class="input-group">
	<span class="input-group-addon">เลือกสัญชาติ</span>
	<select name="select_country" class="form-control" id="select_country" onchange="change_region_sub(this.value)">
		<option value="">- เลือกสัญชาติ -</option>
		<?php
		foreach($data['country'] as $key=>$val3){
			$_where = array();
			$_where['i_country'] = $val3->id;
			$_select = array('id');
			$cklist_region = $this->Main_model->rowdata(TBL_SHOP_COUNTRY_ICON,$_where,$_select);
			if ($cklist_region->id > 0) {
				$disselect = 'disabled';
				$color = 'text-default';
			}
			else{
				$disselect = '';
				$color = '';

			}
			?>
			<option <?=$disselect;?> value="<?=$key;?>" class="<?=$color;?>" > <?=$val3->name_th;?></option>
		<?php
			} ?>
	</select>
</div>