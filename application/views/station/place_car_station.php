<ol class="breadcrumb">
	<li class="head_title"><a class="head_title">จัดการสถานที่</a></li>
	<li class="head_title_sub">คิวรถ</li>
	<li class="head_title_sub_2" style="display: none;"><a class="head_title_sub_2"></a></li>
	<li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
	<li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
</ol>
	<div class="section-body ">
		<div class="row" id="body_page_call">
			<div class="col-lg-12">
				<div class="box box-outlined">
					<div class="box-head">
						<div class="box-body" style="padding-bottom: 0px;">
							<button class="btn btn-success" onclick="fun_add_station()"><span><i class="fa fa-plus"></i> </span>เพิ่มคิว</button>
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped no-margin">
							<thead>
								<th  height="25">#</th>
								<th width="50" align="center" >
									<center>
										<font >จัดการ</font>     
									</center>
								</th>
								<!-- <th width="50" align="center" ><font >ลบ</font></th> -->
								<th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>
									<th width="120" align="center" >
										<font >ประเภททั้งหมด</font>
									</th>
									<th width="60" align="center" ><font >สถานะ</font></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($station as $key=>$val){
									$_where = array();
									  $_where[id] = $val->type;
   $_select = array('*');
    $STATION_TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where, $_select);
									?>
									<tr>
										<td width="5"><?=$key+1;?></td>
										<td>
											<button onclick="fun_edit_station('<?=$val->id;?>')" type="button" class="btn btn-xs btn-primary btn-equal" ><i class="fa fa-search-plus" ></i></button>

										</td>
									<!-- <td>
										<button onclick="firstDelete('<?=$val->topic_th;?>/<?=$val->topic_en;?>/<?=$val->topic_cn;?>','<?=$val->id;?>','<?=TBL_SHOPPING_PRODUCT_MAIN;?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></button>
									</td> -->
									<td><span class="text-primary"><?=$val->topic_th;?></span><!--  / <span ><?=$val->topic_en;?></span> / <span class="text-success"><?=$val->topic_cn;?></span> -->
									</td>
										<td align="center"><span><?=$STATION_TYPE->s_topic_th;?></span></td>
										<td>
											<?php
											if ($val->status == 0 ){
												$text_status = 'ปิด';
												$s_class = 'text-danger';
											}
											else{
												$text_status = 'เปิด';
												$s_class = 'text-success';
											}
											?>
											<span id="span_status<?=$val->id;?>" onclick="updateStatus('<?=$val->id;?>','<?=$val->status;?>','<?=TBL_SHOPPING_PRODUCT_MAIN;?>')" class="<?=$s_class;?>" style="cursor: pointer;"><?=$text_status;?></span>
										</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div><!--end .box-body -->
			</div><!--end .box -->
		</div>
		


