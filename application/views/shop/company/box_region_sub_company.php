<div class="box-body ">
	<div class="row">
		<div class="col-md-12">
			<h4><label class="control-label">สัญชาติ</label></h4>
		</div>
	</div>
	<div class="box-outlined" style=" padding: 15px;margin-bottom: 15px">
		<input type="hidden" name="" id="id_country" value="<?=$_POST[country_id];?>">
		<div class="form-group form-group-md">
			<div class="col-md-12">
				<label class="control-label">สัญชาติ</label>
			</div>
			<div class="col-md-12">
				<div id="box_region_icon_company"></div>
				
			</div>
		</div>
		<!-- <div class="col-md-12">
			<label class="control-label">เลือกสัญชาติ</label>
		</div> -->
		<div class="form-group form-group-md">
			<div class="col-md-11">
					<div id="box_select_region_icon_company"></div>
				<!-- </div> -->
			</div>
			<div class="col-md-1">
				<button type="button" class="btn btn-primary btn-md" id="btn_region_sub5" onclick="save_region_sub_company()">
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
				<div id="box_price_plan_company">
					
				</div>
				
			</div>
			<!-- <div class="col-md-1"> -->
				<!-- <label class="control-label">ประเภทค่าตอบแทน</label> -->
				<!-- <div class="col-md-12" > -->
					<!-- <div class="row"> -->
						
				<!-- </div> -->
			<!-- </div> -->
		</div>
		<div class="form-group ">
			<div class="col-md-12">
				<div id="box_plan_com"></div>
				
			</div>
			<div class="col-md-12">
				<div id="box_plan_comision_company" style="padding: 15px;">


				</div>
			</div>
		</div>

	</div>

	<script >
		function change_region_sub_company(item) {
			var data_country = JSON.parse('<?=json_encode($country);?>');
			param = {
				id: data_country[item].id,
				name_en: data_country[item].name_en,
				name_th: data_country[item].name_th,
				name_cn: data_country[item].name_cn,
				country_code: data_country[item].country_code,
				i_shop: '<?=$_POST[country_id];?>'
			}
			console.log(param)
		}
		function change_plan_price_company(item) {
			var data_plan_price = JSON.parse('<?=json_encode($plan_price);?>');
			param_plan_price = {
				// id:data_plan_price[item].id,
				i_plan_price: data_plan_price[item].id,
				topic_en: data_plan_price[item].topic_en,
				topic_th: data_plan_price[item].topic_th,
				topic_cn: data_plan_price[item].topic_cn,
				i_shop_country: $('#id_country').val()
			}
			
			var url = base_url+ "company/get_plan_com_company";

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
					 $('#btn_save_price_plan').show();
					$('#box_plan_comision_company').html(res)

				}

			});
			
		}
		box_plan_comision_company();
		function box_plan_comision_company() {
			var url = base_url+ "company/box_plan_comision_company";
			var param = {
				country_id: '<?=$_POST[country_id];?>'
			}
			console.log(param)
			$.ajax({
				url: url,
				data: param,
				type: 'post',
				error: function() {
					console.log('Error Profile');
				},
				success: function(res) {
					// console.log(res);
					$('#box_plan_comision_company').html(res)

				}

			});
		}
		box_region_icon_company();
		function box_region_icon_company() {
			var url = base_url+ "company/box_region_icon_company";
			var param = {
				country_id: '<?=$_POST[country_id];?>'
			}
			console.log(param)
			$.ajax({
				url: url,
				data: param,
				type: 'post',
				error: function() {
					console.log('Error Profile');
				},
				success: function(res) {
					// console.log(res);
					$('#box_region_icon_company').html(res)

				}


			});
		}
		box_price_plan_company()
		function box_price_plan_company() {
			var url = base_url+ "company/box_price_plan_company";
			var param = {
				country_id: '<?=$_POST[country_id];?>'
			}
			console.log(param)
			$.ajax({
				url: url,
				data: param,
				type: 'post',
				error: function() {
					console.log('Error Profile');
				},
				success: function(res) {
					// console.log(res);
					$('#box_price_plan_company').html(res)

				}


			});
		}
		box_select_region_icon_company()
		function box_select_region_icon_company() {
			var url = base_url+ "company/box_select_region_icon_company";
			var param = {
				country_id: '<?=$_POST[country_id];?>'
			}
			console.log(param)
			$.ajax({
				url: url,
				data: param,
				type: 'post',
				error: function() {
					console.log('Error Profile');
				},
				success: function(res) {
					// console.log(res);
					$('#box_select_region_icon_company').html(res)

				}


			});
		}
	</script>
