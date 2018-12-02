<?php 
$_where = array();
$_where['product_id'] = $_GET[id];
$_select = array('*');
$_order = array();
$_order['id'] = 'asc';  
$IMG = $this->Main_model->fetch_data('','',TBL_SHOP_DOCUMENT_FILE_IMG,$_where,$_select,$_order);

if ($IMG != '') {
	foreach($IMG as $key => $value){
		?>
		<div class="col-md-6">
			<div class="take_photo" >
				<div class=" uploadProfile" onclick="editProfile('<?=$_GET[id];?>','book')">
					<a  style="cursor: pointer;">
						<i class="fa  fa-camera take-photo-icon"  ></i>
						<span>เลือกโบรชัวร์ <?=$key+1;?></span>
					</a>

					<img id="img-profile-<?=$value->id;?>" src="../../data/pic/place/<?=$value->s_name?>?v=<?=time();?>" alt="" style="cursor: pointer;width:100%;border-radius: 5px;" title="แก้ไข" >
						

					<br>
				</div>
				<button style="z-index: 1000;pointer-events: auto;" type="button" class="btn btn-md btn-danger btn-equal "  onclick="func_deleteimg('<?=$value->id;?>')"><i class="fa fa-trash-o"></i></button>

			</div>
		</div>

	<?php }
}else{
	?>
	<div class="col-md-6">
		<div class="take_photo" >
			<div class=" uploadProfile" onclick="editProfile('<?=$_GET[id];?>','book')">
				<a  style="cursor: pointer;">
					<i class="fa  fa-camera take-photo-icon"></i>
					<span></span>
				</a>
				<img id="img-profile-no" src="../../data/noimg.png" alt="" style="cursor: pointer;width:100%;border-radius: 5px;" title="แก้ไข" >
				<br>
			</div>

		</div>
	</div>
	<?php } ?>
