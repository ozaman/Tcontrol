<form class="form-horizontal form-bordered" id="plan_com_price" role="form">
	<?php
	foreach($plan_com as $key=>$val){
		?>
		<!-- <div class="form-group"> -->
						<!-- <div class="col-md-1">
							<span> ( <?=$key+1;?> ) </span>
						</div> -->
						<div class="col-md-6 ">
							
							<div class="row">

								<div class="col-md-3">
									<span style="font-size: 16px">
										<?=$val->s_topic_th;?>
									</span>

								</div>
								<div class="col-md-9">
									<div class="form-group ">
										<div class="input-group">
											<span class="input-group-addon " >$</span>
											<input type="text" class="form-control input-title" value="">
										</div>
									</div>
								</div>
								<!-- <?php

								foreach($region_icon as $key=>$val2){
									?>
									<div class="col-md-12">
										<div class="col-md-4">
											<img src="<?=base_url();?>assets/img/flag/icon/<?=$val2->s_country_code;?>.png">
											<span style="font-size: 16px">
												<?=$val2->s_topic_th;?>
											</span>
										</div>
										<div class="col-md-8">
											<div class="form-group ">
											<div class="input-group">
													<span class="input-group-addon " ><?=$val->s_topic_th;?></span>
													<input type="text" class="form-control input-title" value="">
												</div>
											</div>
										</div>

									</div>
									<?php }?> -->
								</div>

							</div>
							
							<!-- </div> -->
						<?php } ?>
						<div class="col-md-12" >
							<div class="row">
								<button type="button" class="btn btn-primary btn-md pull-right" id="btn_region_sub<?=$val2->id;?>" onclick="get_plan_price_sub('<?=$val->id;?>')">
									<span id="txt_btn_save"> เพิ่ม </span>
								</button>
							</div>
							
						</div>
					</form>