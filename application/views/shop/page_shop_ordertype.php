<ol class="breadcrumb">
	<li class="head_title"><a class="head_title">จัดการร้านค้า</a></li>
	<li class="head_title_sub"><a href="<?=base_url();?>shop/data_shop_categorie">ช้อปปิ้งทั้งหมด</a></li>
	<li class="head_title_sub"><a  href="<?=base_url();?>shop/categorie_sub?id=<?=$_GET[id];?>" class="head_title_sub">ประเภททั้งหมด</a></li>

	<li class="head_title_sub_2" ><a class="head_title_sub_2">ร้านค่าทั้งหมด</a></li>
	<li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
	<li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
</ol>

<!-- <div class="section-header"> -->
	<!-- <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i><small>ร้านค้าทั้งหมด</small></h3> -->
	<!-- </div> -->
	<div class="section-body ">
		<div class="row" id="body_page_call">
			<div class="col-lg-12">
				<div class="box box-outlined">
					<div class="box-head">
						<div class="box-body" style="padding-bottom: 0">
							<!-- <button class="btn " onclick="get_categories_sub('<?=$_POST[id];?>')"><span><i class="fa fa-chevron-left" ></i> </span>กลับ</button> -->
							<a href="<?=base_url();?>shop/categorie_sub?id=<?=$_GET[id];?>"><button class="btn " ><span><i class="fa fa-chevron-left" ></i> </span>กลับ</button></a>

							<a href="<?=base_url();?>shop/shop_manage?sub=<?=$_GET[id];?>&state=add">
							<button class="btn btn-success" data-toggle="modal" data-target="#formModal"><span><i class="fa fa-plus"></i> </span>เพิ่มร้านค้า</button>
							</a>
						</div>
						
						<!-- <header><h4 class="text-light">Table <strong>Basic</strong></h4></header> -->
					</div>
					<div class="box-body table-responsive">
						<table class="table table-hover table-striped no-margin">
							<thead>
								<th  height="25"></th>
					<!-- <th width="50" align="center" >
						<center>
							<font >แก้ไข</font>     
						</center>
					</th> -->
					<th width="50" align="center" >
						<center>
							<font >จัดการ</font>
						</center>
					</th>
					<th width="50" align="center" ><font >ลบ</font></th>


					<th height="30" align="center" ><font >TH</font> / <font >EN</font> / <font >CN</font></th>


					<!-- <th width="400" height="30" align="center" ></th>
						<th width="199" align="center" ></th> -->
						<th width="120" align="center" ><center>
							<font >ประเภททั้งหมด</font>
						</center></th>
						<th width="60" align="center" ><font >ติดต่อ</font></th>


						<!--    <th width="60" align="center" ><font >ลำดับ</font></th>-->
						<th width="60" align="center" ><font >สถานะ</font></th>
						<!-- <th width="60" align="center" ><font ></font></th> -->
					</tr>

				</thead>
				<tbody>
					<?php 
					foreach($shop_ordertype as $key=>$val){
						?>
						<tr>
							<td>#<?=$key+1;?></td>
						<!-- <td>
							<button type="button" class="btn btn-xs btn-default btn-equal" onclick="edit_shop_ordertype('<?=$val->id;?>')"><i class="fa fa-pencil"></i></button>
						</td> -->
						<td>
							<a href="<?=base_url();?>shop/shop_manage?sub=<?=$_GET[id];?>&id=<?=$val->id;?>">
								<button type="button" class="btn btn-xs btn-primary btn-equal" onclick="//manage_shop_ordertype('<?=$val->id;?>')"><i class="fa fa-search-plus" ></i></button>
							</a>
						</td>
						<td>
							<button onclick="firstDelete('<?=$val->topic_th;?>/<?=$val->topic_en;?>/<?=$val->topic_cn;?>','<?=$val->id;?>','<?=TBL_SHOPPING_PRODUCT;?>')" type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o"></i></button>
						</td>
						

						<td><span class="text-primary" ><?=$val->topic_th;?></span> / <span ><?=$val->topic_en;?></span> / <span class="text-success"><?=$val->topic_cn;?></span></td>
						<!-- <td></td>
							<td></td> -->
							<td>
								<?php 
								$this->db->from(TBL_SHOPPING_PRODUCT);
								$this->db->where('sub',$val->id,'status',1);
								$query = $this->db->get();
								echo $query->num_rows();
								?>
							</td>
							<td>

							</td>
							<td align="center">

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
								<span id="span_status<?=$val->id;?>" onclick="updateStatus('<?=$val->id;?>','<?=$val->status;?>','<?=TBL_SHOPPING_PRODUCT;?>')" class="<?=$s_class;?>" style="cursor: pointer;"><?=$text_status;?></span>
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


