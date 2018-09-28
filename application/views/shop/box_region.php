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
				                  // }
							?>
							<div class="row">
								<div class="form-group form-group-md">
									<div class="col-md-1">
										<span><?=$key+1;?></span>
									</div>
									<div class="col-md-10 ">
										
										
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
									<div class="col-md-1">

										<button type="button" class="btn btn-primary btn-md" id="btn_region_sub<?=$val2->id;?>" onclick="submit_region_sub('<?=$val->id;?>')">
											<span id="txt_btn_save"> เพิ่ม </span>
										</button>
									</div>
										<!-- <div class="col-md-12">
												<div class="box_sub_region<?=$val->id;?>">
													
												</div>

											</div> -->
										</div>


									</div>
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