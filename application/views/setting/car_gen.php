<style>
.btn-equal{
	padding: 5px;
}
</style>
<ol class="breadcrumb">
	<li class="head_title"><a href="<?=base_url();?>setting/car_brand" class="head_title">ยี่ห้อทั้งหมด</a></li>
	<li class="head_title_sub"><a>ยี่ห้อ <?=$brand->name_en;?></a></li>
	<!--<li class="head_title_sub"><a class="head_title_sub"></a></li>-->
	<!--<li class="head_title_sub_2" style="display: none;"><a class="head_title_sub_2"></a></li>
	<li class="head_title_sub_3" style="display: none;"><a class="head_title_sub_3"></a></li>
	<li class="head_title_sub_4" style="display: none;"><a class="head_title_sub_4"></a></li>-->
</ol>

<div class="section-body ">
<a href="<?=base_url();?>setting/car_brand" class="btn btn-info">

	<i class="fa fa-chevron-left" aria-hidden="true"></i>
	<span>ย้อนกลับ</span>

</a>
		<div class="row" id="body_page_call">
			<div class="col-lg-12">
				<div class="box box-outlined">
					<div class="box-head">
						<div class="box-body" style="padding-bottom: 0px;">
						<table cellpadding="5" cellspacing="5">
							<tr>
								<td ><span>ชื่อรุ่น</span></td>
								<td width="5"></td>
								<td width="200">
									<input type="text" class="form-control" name="name_car_gen" id="name_car_gen"/>
									<input type="hidden" class="form-control" name="i_brand" id="i_brand" value="<?=$brand->id;?>"/>
								</td>
								<td width="5"></td>
								<td><button class="btn btn-success" onclick="newCarGen();" ><span><i class="fa fa-plus"></i> </span>เพิ่มรุ่น</button></td>
							</tr>
						</table>
							
						</div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped no-margin">
							<thead>
								<tr>
									<th width="30">#</th>
									<th width="100" align="center">
										แก้ไข
									</th>
									<th height="30" align="center">
										ชื่อ
									</th>
									<th width="" align="center"><font>สถานะ</font></th>
									<th width="" align="center"><font>ลบ</font></th>
								</tr>
								
							</thead>
							<tbody>
								<?php 
								foreach($gen as $val){ 
								
								if($val->status==1){
									$txt_status = "เปิด";
								}else{
									$txt_status = "ปิด";
								}
								?>
									<tr>
										<td><?=$val->id;?></td>
										<td>
											<button id="btn_edit_<?=$val->id;?>" type="button" onclick="editCarGen('<?=$val->id;?>');" class="btn btn-xs btn-primary btn-equal"><i class="fa  fa-pencil-square-o"></i></button>
											<button id="btn_save_<?=$val->id;?>" type="button" onclick="updateCarGen('<?=$val->id;?>');" class="btn btn-xs btn-primary btn-equal" style="background-color: #3ccf30;color: #fff;display: none; width: 40px;" >บันทึก</button>
										</td>
									
										<td>
											<span id="txt_name_<?=$val->id;?>"><?=$val->name_en;?></span>
											<input type="text" value="<?=$val->name_en;?>" id="new_name_<?=$val->id;?>" style="display: none;" />
										</td>
										
										<td>
											<a style="cursor: pointer;" onclick="changeStatusCarGen('<?=$val->id;?>','<?=$val->status;?>');"><?=$txt_status;?></a>
										</td>
										<td>
											<button onclick="deleteCarGen('<?=$val->id;?>');" type="button" class="btn btn-xs btn-danger btn-equal" ><i class="fa fa-trash-o"></i></button>
										</td>
									</tr>
								<? }
								?>
								<tr>
									
								</tr>
							</tbody>
					</table>
				</div><!--end .box-body -->
			</div><!--end .box -->
		</div>     
                    </div><!--end .row -->



</div>

<script>
	$('li').removeClass('expanded');
	$('#setting_app_menu').addClass('expanded');
</script>