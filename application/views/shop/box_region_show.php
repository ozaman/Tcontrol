<div class="col-md-12">
	<!-- <form class="form-horizontal form-banded form-bordered" id="form_region" > -->
		<!-- <div class="col-md-12"> -->
			<div class="row">
				<div class="col-md-12">
					<!-- <select name="select_country" class="form-control" id="select_country" onchange="change_region(this.value)"> -->
						<!-- <option value="">- เลือกสัญชาติ -</option> -->

						<?php
						
						
						// print_r(json_encode($region));
						foreach($region as $key=>$val){

							$_where = array();
							$_where['i_shop_country'] = $val->id; 
							$_select = array('*');
							$_order = array();
							$_order['id'] = 'asc';
							$arr[region] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON.$_GET[option],$_where,$_select,$_order);
							if ($val->status == 1) {
								$btn_color = 'btn-success';
								$text_status = 'เปิด';
				            	# code...
							}
							else{
								$btn_color = 'btn-danger';
								$text_status = 'ปิด';
							}
							?>
							<div class="row">
								<div class="form-group form-group-md">
									<div class="col-md-1">
										<div class="form-group form-group-md">
											<span class="btn btn-support3 btn-rounded btn-outline btn-equal"><?=$key+1;?></span>
											
										</div>
									</div>
									<div class="col-md-11 ">
										
										
										<?php

										foreach($arr[region] as $key=>$val2){
											?>
											<!-- <div class="form-group form-group-md"> -->

												<div class="col-md-3">
													<?php
													if ($val->id == $val2->i_shop_country) {
														?>
														<img class="img-region" src="<?=base_url();?>assets/img/flag/icon/<?=$val2->s_country_code;?>.png">
														<span style="font-size: 16px">
															<?=$val2->s_topic_th;?>
														</span>
														<?php
													}
													?>
												</div>

												<!-- </div> -->
											<?php }?>


										</div>

										<!-- <div class="col-md-12">
												<div class="box_sub_region<?=$val->id;?>">
													
												</div>

											</div> -->
										</div>


									</div>
									<!-- start comision -->

									<div class="row">
										<div class="form-group form-group-md">
											
											<?php
											$_where = array();
											$_where['i_shop_country_icon'] = $val->id;
											$_select = array('*');
											$_order = array();
											$_order['id'] = 'asc';
											$data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST.$_GET[option],$_where,$_select,$_order);

											foreach($data['list_plan'] as $key=>$val){

												$_where = array();
												$_where['i_shop_country_com_list'] = $val->id;
												$_select = array('*');
												$_order = array();
												$_order['id'] = 'asc';
												$data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE.$_GET[option],$_where,$_select,$_order);

												?>


												<div  class="form-group ">
													<!-- <span><?=$key+1;?></span> -->
													<!-- <div class="col-md-1">
														<span class="pull-right"> * </span> 
													</div> -->
													<div class="col-md-12">
														<?php

														foreach($data['list_price'] as $key=>$val2){
															if ($val2->s_topic_en == 'comision') {
																$curen = '%';
															}
															else{
																$curen = '';
															}
															?>

															<div  class="col-md-12 " style="margin-right: 5px">
																<div  class="form-group " style="    margin-bottom: 15px;">
																	<div class="input-group"  style="height: 32px;">
																		<span  class="input-group-addon" style="width: 64px"><?=$val2->s_topic_th;?>  </span>
																		<?php
																		if ($val2->i_plan_product_price_name == 6) {
																		?>
																		<input  type="text" class="form-control" value="<?=$val2->i_price;?> <?=$curen;?>" disabled>

																	<?php } ?>
																		<span  class="input-group-addon" style="width: 64px"><?=$val2->s_payment;?>  </span>
																	<!-- <i class="fa fa-chevron-up" aria-hidden="true" onclick="carusepark('<?$row->id;?>')"></i> -->
																	<?php
																		if ($val2->i_plan_product_price_name != 6) {
																		?>
																	<button type="button" class="btn btn-md btn-default btn-equal pull-right" onclick="carusepark('<?=$val2->id;?>','<?=$_GET[option];?>')"> 
                        <i class="fa fa-chevron-up btn_use<?=$_GET[option];?>_<?=$val2->id;?>"  ></i>
                      </button>
                  <?php } ?>
																	</div>
																	




																</div>
																<div  class="form-group caruse<?=$_GET[option];?>_<?=$val2->id;?>">
																<div style="margin-left: 15px">

																	<?php
																	if ($val2->i_plan_product_price_name == 7) {
																		?>
																		<table width="100%">

																			<tr>
																				<td style=" font-weight: bold;">รายการ</td>
																				<td style="font-weight: bold;width: 100px;">ค่าคอม (%)</td>
																			</tr>
																			<?php
																			$_where = array();
																			$_where[product] = $_POST[id];
																			$_where[i_list_price] = $val2->id;
																			$_select = array('*');
																			$_order = array();
																			$_order['id'] = 'asc';
																			$PERCENT_TAXI = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT.$_GET[option],$_where,$_select,$_order);


																			foreach ($PERCENT_TAXI as $dataTL) {
																				$s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));

																				?>
																				<tr>

																					<td width="150">

																						<label class="btn checkbox-inline btn-checkbox-success-inverse active "><?=$s_sub_typelist->topic_th;?>
																					</label>

																				</td>
																				<td  class="td_percent"><?=$dataTL->f_percent;?> </td>
																			</tr>
																		<?php }?>


																	</table>
																<?php  }
																else if ($val2->i_plan_product_price_name == 5) {
																	?>
																	<table width="100%" class="tb_<?=$row->id;?>" >
																		<tr>
																			<td width="100" style=" font-weight: bold;">รายการ</td>
																			<td style="font-weight: bold;width: 100px;">ค่าจอด (บ.)</td>
																		</tr>

																		<?php
																		$_where = array();
																		$_where[i_list_price] = $val2->id;
																		$_where[i_status] = 1;
																		$_select = array('*');
																		$_order = array();
																		$_order['id'] = 'asc';
																		$USE_TYPE = $this->Main_model->fetch_data('','',TBL_SHOP_CAR_PRICE.$_GET[option],$_where,$_select,$_order);
																		// print_r(json_encode($USE_TYPE));
																		foreach ($USE_TYPE as $row) {
																			$_where = array();
																			$_where[id] = $row->i_car_type;

																			$CAR_USE = $this->Main_model->rowdata(TBL_WEB_CAR_USE_TYPE,$_where);
																			?>
																			<tr>
																				<td>
																					<div data-toggle="buttons"  >
																						<label class="btn checkbox-inline btn-checkbox-success-inverse active"><?=$CAR_USE->name_th;?>
																						<input type="checkbox"  checked> </label>
																					</div>
																				</td>

																				<td  class="td_percent">
																					<div class="input-group">
																						<label class="btn "><?=$row->i_price_park;?>
																					</label>

																				</div></td>

																			</tr>
																		<?php } ?>
																	</table>

																<?php } ?>
															</div>
														</div>



														</div>


													<?php }?>
												</div>


											</div>
											<?php

										} ?>
									</div>
								</div>
								<!-- end comision -->
								<!-- <option value="<?=$key;?>" ><?=$val->name_th;?></option> -->
							<?php } ?>
							<!-- </select> -->
						</div>

					</div>

					<!-- </div> -->

					<!-- </form> -->
				</div>
				<script type="text/javascript">
					
function carusepark(item,option) {
  console.log('.caruse'+option+'_'+item)
  console.log('.btn_use'+option+'_'+item)
  console.log(item)
  console.log(ckt)
  console.log(option)
  if (ckt == false) {
    console.log('in != ')
    ck = item;
  $('.caruse'+option+'_'+item).hide()
  $('.caruse'+option+'_'+item).css('display','none')
  $('.btn_use'+option+'_'+item).removeClass('fa-chevron-up')
  $('.btn_use'+option+'_'+item).addClass('fa-chevron-down')
ckt = true;
    
  }
  else{
    console.log('in == ')
ckt = false;

  $('.caruse'+option+'_'+item).show()
  $('.btn_use'+option+'_'+item).addClass('fa-chevron-up')
  $('.btn_use'+option+'_'+item).removeClass('fa-chevron-down')

  }
}
				</script>