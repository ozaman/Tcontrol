<?php  
$_where = array();
$_where['id'] = $_GET[id];
$_select = array('*');


$arr[shop] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
?> 
<div class="col-md-12">
	<header>
		<h4 class="text-light"> เอกสาร </h4>
	</header>
</div>
<div class="form-group form-group-md">
	<div class="col-md-12">
		<div class="table-responsive no-margin">
			<table class="table table-striped table-hover">
				<thead bgcolor="#999999" style="color: #ffffff">
					<tr>
						<th ><strong>ประเภท</strong></th>
						<th ><strong>ชื่อ</strong></th>
						<th ><strong>หมดอายุ</strong></th>
						<th ><strong>อัพโหลดเมื่อ</strong></th>
						<th ><strong>เหลือเวลา</strong></th>
						<th ><strong>แจ้งเตือนล่วงหน้า</strong></th>

						<th ><strong>ดาวน์โหลด</strong></th>
						<th ><strong>ลบ</strong></th>
					</tr>
				</thead>

				<?
				$_where = array();
				$_where['product_id'] = $_GET[id];
				$_select = array('*');
				$arr[DOC] = $this->Main_model->rowdata(TBL_PLACE_DOCUMENT_FILE,$_where,$_select);
				$_where = array();
				$_where['id'] = $arr[DOC]->type;
				$_select = array('*');
				$arr[DOC_GROUP] = $this->Main_model->rowdata(TBL_PLACE_DETAIL_DOC_GROUP,$_where,$_select);
				// print_r(json_encode($arr[DOC_GROUP]));
				$day_lastupdate = explode(" ",$val->last_update);
				?>
				<tr id="row_show_file_db_<?=$val->id;?>">
					<td><?=$arr[DOC_GROUP]->category_name;?></td>
					<td><span title="<?=$arr[DOC]->document_name;?>"><?=$arr[DOC]->document_name;?></span></td>
					<td align="left"><? if($arr[DOC]->end_expired=="" or $arr[DOC]->end_expired == NULL){
						echo "-";
					}else{
						echo $arr[DOC]->end_expired;
					}?></td>
					<td><?=$day_lastupdate[0];?></td>
					<td>
						<?php 
							$now = time(); // or your date as well
							$your_date = strtotime($arr[DOC]->end_expired);
							$datediff = $now - $your_date;
							if($datediff>0){
								$color = "color:#ff0000";
								$txt_ckc = "เกิน";
							}else if($datediff<=0){
								$color = "color:#000000"; 
								$txt_ckc = "เหลือ";
							}
							$day = floor($datediff / (60 * 60 * 24));
							?>
							<span style="<?=$color;?>" id="dift_date_<?=$arr[DOC_GROUP]->id;?>"><?=$txt_ckc." ".abs($day)." วัน";?></span>
						</td>
						<td><?=$arr[DOC]->day_alert;?> วัน</td>
						<td align="center"><a href="../data/pic/document/place/<?=$arr[DOC]->document_name;?>" download><button class="btn btn-md" type="button"><i class="fa fa-download" aria-hidden="true"></i></button></a></td>
						<td align="center"><button class="btn btn-md btn-danger btn-equal" type="button" onclick="deleteFile('<?=$arr[DOC]->id;?>','<?=$arr[DOC]->document_name;?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
					</tr>
					
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<header>
			<h4 class="text-light">เพิ่มเอกสาร </h4>
		</header>
	</div>
	<div class="form-group form-group-md">
		<form id="form_upload_file"  >
			<!-- <div class="col-md-12"> -->
				<div class="table-responsive no-margin">
					<div class="form-group form-group-md">
						<div class="col-md-2">
							<label class="control-label">ประเภท</label>
						</div>
						<div class="col-md-10">
							<select name="type_doc" id="type_doc" class="form-control">
								<option value="0">- เลือกประเภทเอกสาร -</option>
								<?$_where = array();
         						// $_where['main'] = $_GET[sub];
								$_select = array('*');
								$_order = array();
								$_order['id'] = 'asc';
								$doc_group = $this->Main_model->fetch_data('','',TBL_PLACE_DETAIL_DOC_GROUP,'',$_select,$_order);
								foreach($doc_group as $val){
									?>
									<option value="<?=$val->id;?>"><?=$val->category_name;?></option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="form-group form-group-md">
						<div class="col-md-2">
							<!-- <label class="control-label">ประเภท</label> -->
						</div>
						<div class="col-md-10">
							<div data-toggle="buttons" onclick="open_check_expired()">
								<label class="btn checkbox-inline btn-checkbox-success-inverse <?=$checkedative;?>">
									<input type="checkbox" name="check_expired" id="check_expired" value="1" >
								</label>
								<label for="check_expired" style="margin-top: 9px;">มีวันหมดอายุเอกสาร</label>
							</div>
						</div>

					</div>
					<div class="form-group form-group-md row_expired " style="display: none;">
						<div class="col-md-2">
							<!-- <label for="check_expired" class="control-label" >มีวันหมดอายุเอกสาร</label> -->
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">เริ่ม</span>
								<input type="date" id="datetimepicker2"   class="form-control"  name="date1"  value="<?=$date;?>" >
							</div>

						</div>

						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">ถึง</span>
								<input type="date" id="datetimepicker22"   class="form-control"  name="date2" value="<?=$date;?>">
							</div>

						</div>
					</div>
					<div class="form-group form-group-md row_expired " style="display: none;">
						<div class="col-md-2">
							<label  class="control-label" >แจ้งเตือน</label>
						</div>
						<div class="col-md-5">
							<div class="input-group">
								<span class="input-group-addon">ล่วงหน้า</span>
								<select class="form-control"  name="set_day_alert" id="set_day_alert">
									<option value="30">30 วัน</option>
									<option value="60">60 วัน</option>
									<option value="120">120 วัน</option>
								</select>
								<script>
									$('#set_day_alert').change(function(){
										var val = $(this).val();
										$('.dayalert_txt').text(val+' วัน');
									});
								</script>
							</div>

						</div>
						<div class="col-md-1"><label  class="control-label" >ทาง</label></div>
						<div class="col-md-4" align="" style="padding-bottom: 0px">
							<!-- <div class="row"> -->
								<div class="input-group">
									
									
									
									
									<div data-toggle="buttons"  class="pull-right" style="display: inline-block;">
										<label class="btn btn-success btn-md btn-outline " id="l_taxi">
											<input type="checkbox" name="alert_email" id="alert_email" value="0"> 
											<span style="text-transform:capitalize;">Email</span>
										</label>
									</div>
									
									
									<div data-toggle="buttons" class="pull-right" style="display: inline-block;margin-right: 15px">
										<label class="btn btn-success btn-md btn-outline " id="l_taxi">
											<input type="checkbox" name="alert_phone" id="alert_phone" value="0"> 
											<span style="text-transform:capitalize;">EMS</span>
										</label>
									</div>
									
								</div>
								<!-- </div> -->
							</div>
						</div>
						<div class="form-group form-group-md row_expired " style="display: none;">
							<div class="col-md-2">
								<label  class="control-label" >ไฟล์</label>
							</div>
							<div class="col-md-5">

								<!-- <div class="row fileupload-buttonbar"> -->
									<div class="btn-group" style="width: 100%">
										<span class="btn btn-support5 fileinput-button" style="width: 100%" >
											<i class="fa fa-plus "></i>
											<span style="width: 100%">เลือกไฟล์...</span>
											<input type="file" name="file_doc[]" id="file_doc" accept="*" multiple width="100%">
										</span>
									</div>
									<table role="presentation" class="table table-striped"><tbody class="files"><tr class="template-upload fade in">
										<td>
											<span class="preview"></span>
										</td>
										<td>
											<p class="name"></p>
											<strong class="error text-danger"></strong>
										</td>
										<td>
											<p class="size"></p>
											<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
										</td>
										<td>

											<button class="btn btn-primary start" disabled="">
												<i class="glyphicon glyphicon-upload"></i>
												<span>Start</span>
											</button>


											<button class="btn btn-warning cancel">
												<i class="glyphicon glyphicon-ban-circle"></i>
												<span>Cancel</span>
											</button>

										</td>
									</tr></tbody></table>
									<!-- </div> -->

								</div>
								<div class="col-md-5">
									<button type="button"  class="btn btn-success btn-md pull-right" onclick="_form_upload_file('<?=$_GET[id];?>')" style="width: 100%">บันทึกข้อมูล</button>

								</div>
							</div>
						</div>
						<!-- </div> -->
						</form>	
					</div>
					<script>
						$('#alert_email').click(function (){
							if($(this).is(":checked")) {
								$('#email_setting_alert').show();
								$(this).val(1);
							}else{
								$('#email_setting_alert').hide();
								$(this).val(0);
							}
						});
						$('#alert_phone').click(function (){
							if($(this).is(":checked")) {
								$('#phone_setting_alert').show();
								$(this).val(1);
							}else{
								$('#phone_setting_alert').hide();
								$(this).val(0);
							}
						});
					</script>

