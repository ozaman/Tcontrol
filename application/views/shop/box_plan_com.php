<form class="form-horizontal " id="plan_com_price" role="form">
	<input type="hidden" name="i_country_icon_plan" id="i_country_icon_plan" value="<?=$_POST[i_shop_country];?>">
	<input type="hidden" name="i_price_plan" id="i_price_plan" value="<?=$_POST[i_plan_price];?>">
	<!-- <input type="hiddens" name="" id="i_country_icon_plan" value="<?=$_POST[i_shop_country];?>"> -->
	<?php
	$_where = array();
	$_where['i_status'] = 1;
	$_select = array('*');

	$_order = array();
	$_order['id'] = 'asc';
	$data['payment'] = $this->Main_model->fetch_data('','',TBL_SHOP_PAYMENT_CHANNEL,$_where,$_select,$_order);
	

	foreach($plan_com as $key=>$val){
		?>
		<!-- <div class="form-group"> -->
						<!-- <div class="col-md-1">
							<span> ( <?=$key+1;?> ) </span>
						</div> -->
						<div class="col-md-3 "style="margin-right: 5px">
							
							<div class="row">

								<!-- <div class="col-md-3">
									<span style="font-size: 16px">
										
									</span>

								</div> -->
								<div class="col-md-12">
									<div class="form-group ">
										<div class="input-group">
											<span class="input-group-addon " style="width: 65px;" ><?=$val->s_topic_th;?></span>

											<input type="text" class="form-control input-title" name="<?=$val->element;?>" value="">
										</div>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group ">
										<div class="input-group">
											<span class="input-group-addon " style="width: 65px;" >จ่ายเงิน</span>
											<select name="money_<?=$val->element;?>" class="form-control" id="money_<?=$val->element;?>" >
												<option value="">- เลือกช่องทางการจ่ายเงิน -</option>

												<?php
												foreach($data['payment'] as $key=>$val2){
													?>
													<option value="<?=$val2->s_topic_th;?>" ><?=$val2->s_topic_th;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="col-md-12" >
					<div class="row">
						<button type="button" class="btn btn-primary btn-md pull-right" id="btn_region_sub<?=$val2->id;?>" style="position: absolute;
						right: 0;
						top: -142px;" onclick="save_plan_price()">
						<span id="txt_btn_save"> เพิ่ม </span>
					</button>
				</div>

			</div>
		</form>
		<script type="text/javascript">
			
					</script>