<div class="box-body ">
	<div class="row">
		<div class="col-md-12">
			<h4><label class="control-label">สัญชาติ</label></h4>
		</div>
	</div>
	<div class="box-outlined" style=" padding: 15px;margin-bottom: 15px">
		<input type="hiddens" name="" id="id_country" value="">
		<div class="form-group form-group-md">
			<div class="col-md-12">
				<label class="control-label">สัญชาติ</label>
			</div>
			<div class="col-md-12">
				<?php
				foreach($region_icon as $key=>$val2){
					?>
					<div class="col-md-4">
						<img src="<?=base_url();?>assets/img/flag/icon/<?=$val2->s_country_code;?>.png">
						<span style="font-size: 16px">
							<?=$val2->s_topic_th;?>
						</span>
					</div>
				<?php }?>
			</div>
		</div>
		<div class="col-md-12">
			<label class="control-label">เลือกสัญชาติ</label>
		</div>
		<div class="form-group form-group-md">			
			<div class="col-md-11">
				<select name="select_country" class="form-control" id="select_country" onchange="change_region_sub(this.value)">
					<option value="">- เลือกสัญชาติ -</option>
					<?php
					foreach($country as $key=>$val3){
						if ($val3->id != $val2->i_country) {
							?>
							<option value="<?=$key;?>" ><?=$val3->name_th;?></option>
							<?php
						}
					} ?>
				</select>
			</div>
			<div class="col-md-1">
				<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_region_sub()">
					<span id="txt_btn_save"> เพิ่ม </span>
				</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4><label class="control-label">ค่าตอบแทน</label></h4>
		</div>
	</div>
	<div class="box-outlined" style=" padding: 15px">
		<div class="form-group ">
			<div class="col-md-12">
				<label class="control-label">ประเภทค่าตอบแทน</label>
			</div>
			<div class="col-md-12">
				<select name="select_country" class="form-control" id="select_country" onchange="change_plan_price(this.value)">
					<option value="">- ประเภทค่าตอบแทน -</option>
					<?php
					foreach($plan_price as $key=>$val3){
						?>
						<option value="<?=$key;?>" ><?=$val3->topic_th;?></option>
					<?php } ?>
				</select>
			</div>
			<!-- <div class="col-md-1">
				<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_plan_price()">
					<span id="txt_btn_save"> เพิ่ม </span>
				</button>
			</div> -->
		</div>
		<div class="form-group ">
			<div class="col-md-12">
				<div id="box_plan_com"></div>
				
			</div>
		</div>
	</div>

	<script >
		function change_region_sub(item) {
			var data_country = JSON.parse('<?=json_encode($country);?>');
			param = {
				id: data_country[item].id,
				name_en: data_country[item].name_en,
				name_th: data_country[item].name_th,
				name_cn: data_country[item].name_cn,
				country_code: data_country[item].country_code,
				i_shop: '<?=$_POST[id];?>'
			}
			console.log(param)
		}
		function change_plan_price(item) {
			var data_plan_price = JSON.parse('<?=json_encode($plan_price);?>');
			param_plan_price = {
				i_plan_price: data_plan_price[item].id,
				topic_en: data_plan_price[item].topic_en,
				topic_th: data_plan_price[item].topic_th,
				topic_cn: data_plan_price[item].topic_cn,
				i_shop_country: $('#id_country').val()
			}
			
			var url = base_url+ "shop/get_plan_com";

			console.log(param_plan_price)
			$.ajax({
				url: url,
				data: param_plan_price,
				type: 'post',
				error: function() {
					console.log('Error Profile');
				},
				success: function(res) {
					// console.log(res);
					$('#box_plan_com').html(res)

				}

			});
			
		}
	</script>
