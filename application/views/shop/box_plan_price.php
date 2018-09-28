<div class="box-body ">
	<input type="hidden" name="" id="i_shop_country_com" value="<?=$_POST[i_shop_country_com];?>">
	<div class="form-group form-group-md">
		<div class="col-md-12">
			<h4><label class="control-label">ประเภทค่าตอบแทน</label></h4>
		</div>
		<div class="col-md-12">


			<?php
											// print_r(json_encode($region_icon));

			foreach($COM_LIST as $key=>$val2){
				?>


				<div class="col-md-4">

					<span style="font-size: 16px">
						<?=$val2->s_topic_th;?>
					</span>


				</div>


			<?php }?>

			
		</div>
	</div>
	<div class="form-group form-group-md">
		<div class="col-md-12">
			<h4><label class="control-label">เลือกสัญชาติ</label><h4>
		</div>
		<div class="col-md-10">
			<select name="select_country" class="form-control" id="select_country" onchange="change_plan_price_sub(this.value)">
				<option value="">- เลือกประเภทค่าตอบแทน -</option>
				<?php
				foreach($plan as $key=>$val){
					if ($val->id != $_POST[i_shop_country_com]) {
						?>
						<option value="<?=$key;?>" ><?=$val->topic_th;?></option>
						<?php
					}

				} ?>
			</select>
		</div>

		<div class="col-md-1">
			<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>')">
				<span id="txt_btn_save"> เพิ่ม </span>
			</button>
		</div>
	</div>

	<div class="form-group form-group-md">
		<div class="col-md-12">
			<h4><label class="control-label">ประเภทค่าตอบแทน</label><h4>
		</div>
		<div class="col-md-12">
			<?php
			foreach($COM_LIST as $key=>$val2){
				if ($val2->i_shop_country_icon == 5) {
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<span style="font-size: 16px">
									<?=$val2->s_topic_th;?>
								</span>
							</div>
							<div class="col-md-11">
								<?php
								foreach($region_icon as $key=>$val3){
									?>
									<div class="col-md-12">
										<div class="col-md-3">
											<img src="<?=base_url();?>assets/img/flag/icon/<?=$val3->s_country_code;?>.png">
											<span style="font-size: 16px">
												<?=$val3->s_topic_th;?>
											</span>
										</div>
										<div class="col-md-7">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">ค่าจอด</span>
													<input type="text" class="form-control input-title" value="">
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>')">
												<span id="txt_btn_save"> เพิ่ม </span>
											</button>
										</div>
										<div class="col-md-1">
											<button type="button" class="btn  btn-warning btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>')">
												<span id="txt_btn_save"> แก้ไข </span>
											</button>
										</div>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
					<?php
				}
				if ($val2->i_shop_country_icon == 6) {
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<span style="font-size: 16px">
									<?=$val2->s_topic_th;?>
								</span>
							</div>
							<div class="col-md-11">
								<?php
								foreach($region_icon as $key=>$val3){
									?>
									<div class="col-md-12">
										<div class="col-md-3">
											<img src="<?=base_url();?>assets/img/flag/icon/<?=$val3->s_country_code;?>.png">
											<span style="font-size: 16px">
												<?=$val3->s_topic_th;?>
											</span>
										</div>
										<div class="col-md-7">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">ค่าหัว</span>
													<input type="text" class="form-control input-title" value="">
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>','<?=$val3->s_topic_th;?>')">
												<span id="txt_btn_save"> เพิ่ม </span>
											</button>
										</div>
										<div class="col-md-1">
											<button type="button" class="btn btn-warning btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>')">
												<span id="txt_btn_save"> แก้ไข </span>
											</button>
										</div>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
					<?php
				}
				if ($val2->i_shop_country_icon == 7) {
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12">
								<span style="font-size: 16px">
									<?=$val2->s_topic_th;?>
								</span>
							</div>
							<div class="col-md-11">
								<?php
								foreach($region_icon as $key=>$val3){
									?>
									<div class="col-md-12">
										<div class="col-md-3">
											<img src="<?=base_url();?>assets/img/flag/icon/<?=$val3->s_country_code;?>.png">
											<span style="font-size: 16px">
												<?=$val3->s_topic_th;?>
											</span>
										</div>
										<div class="col-md-7">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">คอมมิชชั่น</span>
													<input type="text" class="form-control input-title" value="">
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>')">
												<span id="txt_btn_save"> เพิ่ม </span>
											</button>
										</div>
										<div class="col-md-1">
											<button type="button" class="btn btn-warning btn-md" id="btn_region_sub5" onclick="save_plan_price_sub('<?=$_POST[i_shop_country_com];?>')">
												<span id="txt_btn_save"> แก้ไข </span>
											</button>
										</div>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			<?php }?>
		</div>
	</div>	
</div>



































<script >
	function change_region_sub(item) {
        		// console.log(item)
        		var data_country = JSON.parse('<?=json_encode($country);?>');
        		// console.log(data_country[item])
        		
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
        	function change_plan_price_sub(item) {
        		// console.log(item)
        		var data_plan_price = JSON.parse('<?=json_encode($plan);?>');
        		// console.log(data_country[item])
        		
        		param_plan_price = {
        			i_plan_price: data_plan_price[item].id,
        			topic_en: data_plan_price[item].topic_en,
        			topic_th: data_plan_price[item].topic_th,
        			topic_cn: data_plan_price[item].topic_cn,
        			i_shop_country_com: $('#i_shop_country_com').val()
        		}
        		console.log(param_plan_price)
        		
        	}
        </script>
