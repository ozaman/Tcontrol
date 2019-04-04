<?php  
$_where = array();
$_where['id'] = $_GET[id];
$_select = array('*');


$arr[shop] = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select);
?> 
<div class="col-md-12">
	<header>
		<h4 class="text-light"> ข้อมูลธนาคาร </h4>
	</header>
</div>
<div class="col-md-12">
<div class="form-group form-group-md">
	<div class="col-md-12">
		<div class="table-responsive no-margin">
			<table class="table table-striped table-hover">
				<thead bgcolor="#999999" style="color: #ffffff">
					<tr>
						<th ><strong>#</strong></th>
						<th ><strong>แก้ไข</strong></th>
						<th ><strong>ชื่อบัญชี</strong></th>
						<th ><strong>เลขที่บัญชี</strong></th>
						<th ><strong>ธนาคาร</strong></th>
						<th ><strong>สาขา</strong></th>
						<th ><strong>สถานะบัญชี</strong></th>
						<th ><strong>RQ code</strong></th>

						
						<th ><strong>ลบ</strong></th>
					</tr>
				</thead>

				<?php
				$_where = array();
				$_where['shop_id'] = $_GET[id];
				$_select = array('*');
				 $_order = array();
            $_order['id'] = 'asc';  
				$arr[BANK_COMPANY] = $this->Main_model->fetch_data('','',TBL_WEB_BANK_COMPANY,$_where,$_select,$_order);
				   foreach($arr[BANK_COMPANY] as $key => $value){ 
				$_where = array();
				$_where['id'] = $value->bank_id;
				$_select = array('*');
				$arr[BANK_LIST] = $this->Main_model->rowdata(TBL_WEB_BANK_LIST,$_where,$_select);
				// print_r(json_encode($arr[DOC_GROUP]));
				$day_lastupdate = explode(" ",$value->last_update);
				?>
				<tbody>
				<tr id="row_show_file_db_<?=$value->id;?>">
					<td><?=$key+1;?></td>
					<td height="30" >
                              <button type="button" onclick="edit_bank('<?=$value->id;?>')" class="btn btn-md btn-info btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="แก้ไข้"><i class="fa fa-pencil"></i></button>
                            </td>
					<td><?=$value->bank_name;?></td>
					<td><?=$value->bank_number;?></td>
					<td><?=$arr[BANK_LIST]->name_th;?></td>
					<td >
                              <?php
                      if ($value->status == 0 ){
                        $text_status = 'ปิด';
                        $s_class = 'text-danger';
                      }
                      else{
                        $text_status = 'เปิด';
                        $s_class = 'text-success';
                      }
                      ?>
                      <span id="span_status<?=$value->id;?>" onclick="updateStatus('<?=$value->id;?>','<?=$value->status;?>','<?=TBL_WEB_BANK_COMPANY;?>')" class="<?=$s_class;?>" style="cursor: pointer;"><?=$text_status;?></span>
                            </td> 
					<td><?=$value->bank_branch;?></td>

					<td>
						<img src="../../data/pic/document/QRcode/<?=$value->qrcode.'?v='.time();?>" width="120">
                     
                    </td>
                      <td >
                              <button type="button" class="btn btn-md btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal" data-original-title="ลบ" onclick="firstDelete('<?=$value->name;?>','<?=$value->id;?>','<?=TBL_WEB_BANK_COMPANY;?>')"><i class="fa fa-trash-o"></i></button>
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
			<h4 class="text-light">รายละเอียดบัญชี </h4>
		</header>
	</div>
	<div class="form-group form-group-md">
		<!--<form id="form_upload_file"  >-->
			<input type="hidden" name="product_id" value="<?=$_GET[id];?>">
			<!-- <div class="col-md-12"> -->
				<div class="table-responsive no-margin">
					<div class="form-group form-group-md">
						<div class="col-md-2">
							<label class="control-label">ธนาคาร</label>
						</div>
						<div class="col-md-10">
							<select name=bank_id id="bank_id" class="form-control">
								<option value="0">- เลือกธนาคาร -</option>
								<?php 
								$_where = array();
         						$_where['status'] = 1;
								$_select = array('*');
								$_order = array();
								$_order['id'] = 'asc';
								$BANK_LIST = $this->Main_model->fetch_data('','',TBL_WEB_BANK_LIST,'',$_select,$_order);
								foreach($BANK_LIST as $val){
									?>
									<option value="<?=$val->id;?>"><?=$val->name_th;?></option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="form-group form-group-md">
						<div class="col-md-2">
							 <label class="control-label">สาขา</label> 
						</div>
						<div class="col-md-10">
							<input name="bank_branch" rows="3" class="form-control" id="bank_branch" placeholder="สาขาธนาคาร">
						</div>

					</div>
                  <div class="form-group form-group-md">
						<div class="col-md-2">
							 <label class="control-label">ชื่อบัญชี</label> 
						</div>
						<div class="col-md-10">
							<input name="bank_name" rows="3" class="form-control" id="bank_name" placeholder="ชื่อบัญชี">
						</div>

					</div>
					<div class="form-group form-group-md">
						<div class="col-md-2">
							 <label class="control-label">เลขที่บัญชี</label> 
						</div>
						<div class="col-md-10">
							<input name="bank_number" rows="3" class="form-control" id="bank_number" placeholder="เลขที่บัญชี">
						</div>

					</div>
					
					
					
					<div class="form-group form-group-md">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								
								<div class="table-responsive no-margin" style="margin-top: 10px">
									<table class="table table-striped table-hover" id="append_tb_detail_file_qrcode">


									</table>
								</div>
							</div>


						</div>
						
						<div class="form-group form-group-md  " style="display: nones;">
							<div class="col-md-2">
								<label  class="control-label" >QR code</label>
							</div>
							<div class="col-md-5">

								<!-- <div class="row fileupload-buttonbar"> -->
									<div class="btn-group" style="width: 100%">
										
										<span class="btn btn-support5 fileinput-button" style="width: 100%" >
											<i class="fa fa-plus "></i>
											<span style="width: 100%">เลือกไฟล์...</span>
											<input type="file" name="file_doc" id="file_doc_qrcode" accept="*" multiple width="100%">
										</span>
									</div>
									
										
									
									
									<!-- </div> -->

								</div>
								<div class="col-md-5">
									<button type="button"  class="btn btn-success btn-md pull-right" id="form_upload_file_RQCODE" onclick="_form_upload_rq_bank('<?=$_GET[id];?>')" style="width: 100%">บันทึกข้อมูล</button>

								</div>
							</div>
							
							
						</div>
						<!-- </div> -->
					<!--</form>-->	
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
					$( "#file_doc_qrcode" ).change(function() {
						var set_day_alert = $('#set_day_alert').val();
						$('#append_tb_detail_file_qrcode tr').remove();
						$('#append_tb_detail_file_qrcode').append('<tr><th></th><th></th><th>ชื่อ</th><th>ขนาด</th></tr>');
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
				        $('#append_tb_detail_file_qrcode').append('<tr><td>'+num+'<td><td width="40%">'+name+'</td><td>'+formatBytes(file.size)+'</td><td></tr>');
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
				


