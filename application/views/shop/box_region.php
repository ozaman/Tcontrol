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
							$arr[region] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON,$_where,$_select,$_order);
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
									<div class="col-md-2">
										<div class="form-group form-group-md">
											<span><?=$key+1;?>).</span>
											<button id="btn_status<?=$val->id;?>" type="button" onclick="updateStatus('<?=$val->id;?>','<?=$val->status;?>','<?=TBL_SHOP_COUNTRY;?>')" style="padding: 1px 5px;  cursor: pointer; width: 36px;" class="btn btn-xs <?=$btn_color;?> btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="เปิดฝปิด" ><?=$text_status;?></button>
											<button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"  data-original-title="ลบ" onclick="firstDelete('ค่าตอบแทน','<?=$val->id;?>','<?=TBL_SHOP_COUNTRY_ICON;?>')"><i class="fa fa-trash-o"></i></button>
										</div>
									</div>
									<div class="col-md-8 ">
										
										
										<?php

										foreach($arr[region] as $key=>$val2){
											?>
											<div class="form-group form-group-md">

												<div class="col-md-4">
													<?php
													if ($val->id == $val2->i_shop_country) {
														?>
														<img src="<?=base_url();?>assets/img/flag/icon/<?=$val2->s_country_code;?>.png">
														<span style="font-size: 16px">
															<?=$val2->s_topic_th;?>
														</span>
														<?php
													}
													?>
												</div>

											</div>
										<?php }?>
										

									</div>
									<div class="col-md-2">

										<button type="button" class="btn btn-primary btn-md" id="btn_region_sub<?=$val2->id;?>" onclick="submit_region_sub('<?=$val->id;?>')">
											<span id="txt_btn_save"> เพิ่ม /แก้ไข้ </span>
										</button>
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
											$data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST,$_where,$_select,$_order);

											foreach($data['list_plan'] as $key=>$val){

												$_where = array();
												$_where['i_shop_country_com_list'] = $val->id;
												$_select = array('*');
												$_order = array();
												$_order['id'] = 'asc';
												$data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE,$_where,$_select,$_order);

												?>

												<div  class="form-group ">
													
													<div class="col-md-1">
														<span class="pull-right"> - </span> 
													</div>
													<div class="col-md-11">
														<?php

														foreach($data['list_price'] as $key=>$val2){
															?>

															<div  class="col-md-4 " style="margin-right: 5px">

																<div  class="form-group ">
																	<div class="input-group">
																		<span  class="input-group-addon"><?=$val2->s_topic_th;?>  </span>

																		<input  type="text" class="form-control" value="<?=$val2->i_price;?>" disabled>
																		<span  class="input-group-addon"><?=$val2->s_payment;?>  </span>
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
						<div class="row">

						</div>
						<!-- </form> -->
					</div>