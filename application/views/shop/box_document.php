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
<div class="col-md-12">
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
				 $_order = array();
            $_order['id'] = 'asc';  
				$arr[DOC] = $this->Main_model->fetch_data('','',TBL_PLACE_DOCUMENT_FILE,$_where,$_select,$_order);
				   foreach($arr[DOC] as $key => $value){ 
				$_where = array();
				$_where['id'] = $value->type;
				$_select = array('*');
				$arr[DOC_GROUP] = $this->Main_model->rowdata(TBL_PLACE_DETAIL_DOC_GROUP,$_where,$_select);
				// print_r(json_encode($arr[DOC_GROUP]));
				$day_lastupdate = explode(" ",$val->last_update);
				?>
				<tbody>
				<tr id="row_show_file_db_<?=$val->id;?>">
					<td><?=$arr[DOC_GROUP]->category_name;?></td>
					<td><span title="<?=$value->document_name;?>"><?=$value->document_name;?></span></td>
					<td align="left"><? if($value->end_expired=="" or $value->end_expired == NULL){
						echo "-";
					}else{
						echo $value->end_expired;
					}?></td>
					<td><?=$day_lastupdate[0];?></td>
					<td>
						<?php 
							$now = time(); // or your date as well
							$your_date = strtotime($value->end_expired);
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
						<td><?=$value->day_alert;?> วัน</td>
						<td align="center"><a href="../data/pic/document/place/<?=$value->document_name;?>" download><button class="btn btn-md" type="button"><i class="fa fa-download" aria-hidden="true"></i></button></a>
						</td>
						<td align="center">

							<button type="button" class="btn btn-md btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal" data-original-title="ลบ" onclick="firstDelete('ไฟล์ <?=$arr[DOC_GROUP]->category_name;?> <?=$value->document_name;?>','<?=$value->id;?>','<?=TBL_PLACE_DOCUMENT_FILE;?>')"><i class="fa fa-trash-o"></i></button>


							<!-- <button class="btn btn-md btn-danger btn-equal" type="button" onclick="deleteFile('<?=$value->id;?>','<?=$value->document_name;?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></button> -->
						</td>
					</tr>
				</tbody>
					<?php }?>
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
			<input type="hidden" name="product_id" value="<?=$_GET[id];?>">
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
										<label class="btn btn-success btn-md btn-outline " id="l_alert_email">
											<input type="checkbox" name="alert_email" id="alert_email" value="0" onchange="_alert_email()"> 
											<span style="text-transform:capitalize;">Email</span>
										</label>
									</div>
									
									
									<div data-toggle="buttons" class="pull-right" style="display: inline-block;margin-right: 15px">
										<label class="btn btn-success btn-md btn-outline " id="l_alert_phone">
											<input type="checkbox" name="alert_phone" id="alert_phone" value="0" onchange="_alert_phone()"> 
											<span style="text-transform:capitalize;">SMS</span>
										</label>
									</div>
									
								</div>
								<!-- </div> -->
							</div>
						</div>
						<div class="form-group form-group-md">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								<div id="email_setting_alert" style="display: none;">

									<input type="email" id="email_for_alert" name="email" class="form-control" value="<?=$arr[shop]->email;?>"/>
								</div>
								<div id="phone_setting_alert" style="display: none;">

									<input type="text" id="phone_for_alert" name="phone" class="form-control" value="<?=$arr[shop]->phone;?>"/>
								</div>
								<div class="table-responsive no-margin" style="margin-top: 10px">
									<table class="table table-striped table-hover" id="append_tb_detail_file">


									</table>
								</div>
							</div>


						</div>
						<div class="form-group form-group-md  " style="display: nones;">
							<div class="col-md-2">
								<label  class="control-label" >ไฟล์</label>
							</div>
							<div class="col-md-5">

								<!-- <div class="row fileupload-buttonbar"> -->
									<div class="btn-group" style="width: 100%">
										
										<span class="btn btn-support5 fileinput-button" style="width: 100%" >
											<i class="fa fa-plus "></i>
											<span style="width: 100%">เลือกไฟล์...</span>
											<input type="file" name="file_doc" id="file_doc" accept="*" multiple width="100%">
										</span>
									</div>
									
										
									
									
									<!-- </div> -->

								</div>
								<div class="col-md-5">
									<button type="button"  class="btn btn-success btn-md pull-right" id="form_upload_file" onclick="_form_upload_file('<?=$_GET[id];?>')" style="width: 100%">บันทึกข้อมูล</button>

								</div>
							</div>
							
							
						</div>
						<!-- </div> -->
					</form>	
				</div>
				<script>
					var tax_file;
					function _alert_email (){
						
						console.log($('#alert_email').is(":checked"))
						if($('#alert_email').is(":checked")) {
							$('#email_setting_alert').show();
							$('#alert_email').val(1);
							$('#alert_email' ).prop("checked", true)

							$('#phone_setting_alert' ).prop("checked", false)
							$('#l_alert_phone').removeClass('active');
							$('#phone_setting_alert').hide();
						}else{
							$('#email_setting_alert').hide();
							$('#alert_email').val(0);
							$('#alert_email' ).prop("checked", false)

						}
					}
					function _alert_phone(){
						
						console.log($('#alert_phone').is(":checked"))
						if($('#alert_phone').is(":checked")) {
							$('#phone_setting_alert').show();
							$('#phone_setting_alert' ).prop("checked", true)
							$('#alert_phone').val(1);

							$('#alert_email' ).prop("checked", false)
							$('#l_alert_email').removeClass('active');
							$('#email_setting_alert').hide();
						}else{
							$('#phone_setting_alert').hide();
							$('#alert_phone').val(0);
							$('#phone_setting_alert' ).prop("checked", false)
						}
					}
					$( "#file_doc" ).change(function() {
						var set_day_alert = $('#set_day_alert').val();
						$('#append_tb_detail_file tr').remove();
						$('#append_tb_detail_file').append('<tr><th></th><th></th><th>ชื่อ</th><th>ขนาด</th><th>แจ้งเตือน</th></tr>');
						var num = 0;
				for (var i = 0; i < this.files.length; i++) { //for multiple files          
					(function(file) {
						var name = file.name;

						num++;

						var reader = new FileReader();  
						reader.onload = function(e) {  
				            // get file content  
				            // console.log(file);
				            tax_file = file;
				            var type = getFileExtension(file.name);    
				            
				        }
				        $('#append_tb_detail_file').append('<tr><td>'+num+'<td><td width="40%">'+name+'</td><td>'+formatBytes(file.size)+'</td><td><span class="dayalert_txt">'+set_day_alert+' วัน</span></td></tr>');
				        reader.readAsDataURL(file);
				    })(this.files[i]);
				}

			});
					function getFileExtension(filename) {
						return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename) : undefined;
					}
					
					function formatBytes(a,b){
						if(0==a)return"0 Bytes";var c=1024,d=b||2,e=["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"],f=Math.floor(Math.log(a)/Math.log(c));return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]
					}
				</script>
				


