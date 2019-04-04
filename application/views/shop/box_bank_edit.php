<?php  
$_where = array();
$_where['id'] = $_POST[id];
$_select = array('*');


$arr[BANK_COMPANY] = $this->Main_model->rowdata(TBL_WEB_BANK_COMPANY,$_where,$_select);
?> 


<form class="form-horizontal form-banded form-bordered"  id="form_bank_company"  enctype="multipart/form-data"  >
	<div class="form-group form-group-md">
		<!--<form id="form_upload_file"  >-->
			<input type="hidden" name="product_id" value="<?=$_POST[id];?>">
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

              if($arr[BANK_COMPANY]->bank_id == $val->id ){
                $selected = "selected";
              }else{
                $selected = "";
              }
									?>
									<option <?=$selected;?> value="<?=$val->id;?>"><?=$val->name_th;?></option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="form-group form-group-md">
						<div class="col-md-2">
							 <label class="control-label">สาขา</label> 
						</div>
						<div class="col-md-10">
							<input name="bank_branch" rows="3" class="form-control" id="bank_branch" placeholder="สาขาธนาคาร" value="<?=$arr[BANK_COMPANY]->bank_branch;?>">
						</div>

					</div>
                  <div class="form-group form-group-md">
						<div class="col-md-2">
							 <label class="control-label">ชื่อบัญชี</label> 
						</div>
						<div class="col-md-10">
							<input name="bank_name" rows="3" class="form-control" id="bank_name" placeholder="ชื่อบัญชี" value="<?=$arr[BANK_COMPANY]->bank_name;?>">
						</div>

					</div>
					<div class="form-group form-group-md">
						<div class="col-md-2">
							 <label class="control-label">เลขที่บัญชี</label> 
						</div>
						<div class="col-md-10">
							<input name="bank_number" rows="3" class="form-control" id="bank_number" placeholder="เลขที่บัญชี" value="<?=$arr[BANK_COMPANY]->bank_number;?>">
						</div>

					</div>
					
					
					
					<div class="form-group form-group-md">
							<div class="col-md-2"></div>
							<div class="col-md-10">
								
								<div class="table-responsive no-margin" style="margin-top: 10px">
									<table class="table table-striped table-hover" id="append_tb_detail_file_qrcode_edit">


									</table>
									<img src="../../data/pic/document/QRcode/<?=$arr[BANK_COMPANY]->qrcode.'?v='.time();?>" width="120">
			<input type="hidden" name="qrcode" value="<?=$arr[BANK_COMPANY]->qrcode;?>">


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
											<input type="file" name="file_doc" id="file_doc_qrcode_edit" accept="*" multiple width="100%">
										</span>
									</div>
									
										
									
									
									<!-- </div> -->

								</div>
								<div class="col-md-5">
									<button type="button"  class="btn btn-success btn-md pull-right" id="form_upload_file_RQCODE_edit" onclick="_form_upload_rq_bank_edit('<?=$_GET[id];?>')" style="width: 100%">บันทึกข้อมูล</button>

								</div>
							</div>
							
							
						</div>
						<!-- </div> -->
					<!--</form>-->	
				</div>
			</form>
		
				<script>
					var tax_file;
					
					$( "#file_doc_qrcode_edit" ).change(function() {
						var set_day_alert = $('#set_day_alert').val();
						$('#append_tb_detail_file_qrcode_edit tr').remove();
						$('#append_tb_detail_file_qrcode_edit').append('<tr><th></th><th></th><th>ชื่อ</th><th>ขนาด</th></tr>');
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
				        $('#append_tb_detail_file_qrcode_edit').append('<tr><td>'+num+'<td><td width="40%">'+name+'</td><td>'+formatBytes(file.size)+'</td><td></tr>');
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
				


