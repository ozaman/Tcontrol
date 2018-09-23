<div class="col-lg-12">
	<div class="box box-outlined">
		<div class="box-head">
			<div class="box-body" style="padding-bottom: 0">
				<button class="btn " onclick="shop('categorie')"><span><i class="fa fa-chevron-left" ></i> </span>กลับ</button>
				<button class="btn btn-success" data-toggle="modal" data-target="#formModal"><span><i class="fa fa-plus"></i> </span>เพิ่มร้านค้า</button>
			</div>
			
			<!-- <header><h4 class="text-light">Table <strong>Basic</strong></h4></header> -->
		</div>
		<div class="box-body table-responsive">
			<table class="table table-hover">
				<thead>
					<th bgcolor="#999999" height="25"></th>
						<th width="50" align="center" bgcolor="#999999"><center>
							<font color="#FFFFFF">แก้ไข</font>     
						</center></th>
						<th width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></th>
						<th width="60" align="center" bgcolor="#999999"><center>
							<font color="#FFFFFF">ประเภท</font>
						</center></th>

						<th height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></th>


						<th width="400" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></th>
						<th width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></th>
						<th width="120" align="center" bgcolor="#999999"><center>
							<font color="#FFFFFF">ประเภททั้งหมด</font>
						</center></th>
						<th width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">เปิด</font></th>


						<!--    <th width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">ลำดับ</font></th>-->
						<th width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">ปิด</font></th>
						<!-- <th width="60" align="center" bgcolor="#999999"><font color="#FFFFFF"></font></th> -->
					</tr>

				</thead>
				<tbody>
					<?php 
					foreach($categorie_bub as $key=>$val){
						?>
						<tr>
							<td>#<?=$key+1;?></td>
							<td>
								<button type="button" class="btn btn-xs btn-default btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Edit row"><i class="fa fa-pencil"></i></button>
							</td>
							
							<td>
								<button type="button" class="btn btn-xs btn-default btn-equal" ><i class="fa fa-trash-o"></i></button>
							</td>
							<td>
								<button type="button" class="btn btn-xs btn-default btn-equal" onclick="get_shop_ordertype('<?=$val->id;?>')"><i class="fa fa-search-plus" ></i></button>
							</td>

							<td><span ><?=$val->topic_en;?></span></td>
							<td><span ><?=$val->topic_th;?></span></td>
							<td><span ><?=$val->topic_cn;?></span></td>
							<td>
								<?php 
								$this->db->from(TBL_SHOPPING_PRODUCT);
								$this->db->where('sub',$val->id);
								$query = $this->db->get();
								echo $query->num_rows();
								?>
							</td>
							<td>
								0
							</td>
							<td >
								0
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
<div class="modal fade in" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="false" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="formModalLabel">Login to continue</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body contain-lg">
					<div class="form-group">
						<div class="col-sm-3">
							<label for="email1" class="control-label">Email</label>
						</div>
						<div class="col-sm-9">
							<input type="email" name="email1" id="email1" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
							<label for="password1" class="control-label">Password</label>
						</div>
						<div class="col-sm-9">
							<input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3">
						</div>
						<div class="col-sm-9">
							<div class="checkbox">
								<label>
									<input type="checkbox" id="cb1"> Remember me
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary">Login</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

