<style>
.btn-equal{
	padding: 5px;
}
</style>
<div class="section-body ">
		<div class="row" id="body_page_call">
			<div class="col-lg-12">
				<div class="box box-outlined">
					<div class="box-head">
						<div class="box-body" style="padding-bottom: 0px;">
						<table cellpadding="5" cellspacing="5">
							<tr>
								<td ><span>ชื่อยี่ห้อ</span></td>
								<td width="5"></td>
								<td width="200">
									<input type="text" class="form-control" name="name_car_brand" id="name_car_brand"/>
								</td>
								<td width="5"></td>
								<td><button class="btn btn-success" onclick="newCarBrand();" ><span><i class="fa fa-plus"></i> </span>เพิ่มยี่ห้อ</button></td>
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
									<th>รุ่น</th>
									<th width="" align="center"><font>สถานะ</font></th>
									<th width="" align="center"><font>ลบ</font></th>
								</tr>
								
							</thead>
							<tbody>
								<?php 
								foreach($brand as $val){ 
								$this->db->select('id');
								$this->db->where('i_brand',$val->id);
								$query = $this->db->get('web_car_gen');
								$num = $query->num_rows();
								
								if($val->status==1){
									$txt_status = "เปิด";
								}else{
									$txt_status = "ปิด";
								}
								?>
									<tr>
										<td><?=$val->id;?></td>
										<td>
											<button id="btn_edit_<?=$val->id;?>" type="button" onclick="editCarBrand('<?=$val->id;?>');" class="btn btn-xs btn-primary btn-equal"><i class="fa  fa-pencil-square-o"></i></button>
											<button id="btn_save_<?=$val->id;?>" type="button" onclick="updateCarBrand('<?=$val->id;?>');" class="btn btn-xs btn-primary btn-equal" style="background-color: #3ccf30;color: #fff;display: none; width: 40px;" >บันทึก</button>
											
											
										</td>
										
										<td>
											<span id="txt_name_<?=$val->id;?>"><?=$val->name_en;?></span>
											<input type="text" value="<?=$val->name_en;?>" id="new_name_<?=$val->id;?>" style="display: none;" />
										</td>
										<td>
											
											<a href="<?=base_url();?>setting/car_gen/<?=$val->id;?>"><span><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;เพิ่มรุ่น</span></a>
											(<?=$num;?>)
										</td>
										
										<td>
											<a style="cursor: pointer;" onclick="changeStatusCarBrand('<?=$val->id;?>','<?=$val->status;?>');">
											
											<?=$txt_status;?></a>
										</td>
										<td>
											<button onclick="deleteCarBrand('<?=$val->id;?>');" type="button" class="btn btn-xs btn-danger btn-equal" ><i class="fa fa-trash-o"></i></button>
										</td>
									</tr>
								<?php }
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