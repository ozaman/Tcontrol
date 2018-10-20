<?php
$_where = array();
$_where['id'] = $_GET[id];         
$_select = array('*');
$PRODUCT = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT,$_where,$_select); 

?>

<div class="col-md-12">
	<header>
		<h4 class="text-light">เพิ่มรูปภาพ </h4>
	</header>
</div>
<!-- <div class="form-group form-group-md"> -->
	<!-- <form id="form_upload_file"  > -->
		<!-- <input type="hidden" name="product_id" value="<?=$_GET[id];?>"> -->
		<!-- <div class="col-md-12"> -->
			<div class="table-responsive no-margin">
				<div class="form-group form-group-md">
					<div class="col-md-2">
						<label class="control-label">โลโก้

						</label>
					</div>
					<div class="col-md-10">
						<div class="col-md-6">
							<div class="<?= $coldata?>">
								<form  id="upfile" enctype="multipart/form-data">
									<input type="hidden" name="shop_id_upload" value="<?=$_GET[id];?>" id="shop_id_upload">
									
										<input type="file" style="display: none;" id="file" name="file" onchange="filechange()"> <input type="submit" style="display: none;" id="submitfile" name="submit">
									</form>
								<div class="take_photo" >
									<div class=" uploadProfile" onclick="editProfile('<?=$_GET[id];?>','logo')">
										<a  style="cursor: pointer;">
											<i class="fa  fa-camera take-photo-icon"></i>
											<span>เลือกโบรชัวร์ 1</span>
										</a>
										<?php 
										if ($PRODUCT->pic_logo != '') {
											?>
											<img id="img_logo_shop" src="../../data/pic/place/<?=$PRODUCT->pic_logo?>?v=<?=time()?>" alt="" style="cursor: pointer;width:100%;border-radius: 5px;" title="แก้ไข" >
											<?php
										}

										?>
										
										<br>
									</div>
									
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="form-group form-group-md">
					<div class="col-md-2">
						<label class="control-label">โบรชัวร์
						</label>
						<button  type="button" class="btn btn-md btn-success btn-equal " onclick="editProfile('<?=$_GET[id];?>','book')"> 
            <i class="fa fa-plus "></i>
          </button>
					</div>
					<div class="col-md-10">

						<div id="box_img_book" onload="_box_img_book(<?=$_GET[id];?>)"></div>
						

					
		</div>


	</div>

</div>
<!-- </form>	 -->
	<!-- </div> -->