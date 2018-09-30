	<?php
	$_where = array();
	$_where['i_shop_country_icon'] = $_POST[country_id];
	$_select = array('*');
	$_order = array();
	$_order['id'] = 'asc';
	$data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST,$_where,$_select,$_order);

	foreach($data['list_plan'] as $key=>$val){

		$_where = array();
		$_where['i_shop_country_com_list'] = $val->id;
		$_select = array('*');
		$_order = array();
		$_order['id'] = 'asc';
		$data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE,$_where,$_select,$_order);

		?>
		<div  class="form-group ">
			<form class="form-horizontal " id="edit_plan_com_price" role="form">
				<div  class="col-md-2 ">
					<span> <?=$key+1?> ).  </span>
					<button type="button" onclick="edit_plan_com_price('<?=$val->id;?>')" class="btn btn-xs btn-info btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="แก้ไข้"><i class="fa fa-pencil"></i></button>
					<button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal"  data-original-title="ลบ" onclick="firstDelete('ประเภทค่าตอบแทน','<?=$val->id;?>','<?=TBL_SHOP_COUNTRY_COM_LIST;?>')"><i class="fa fa-trash-o"></i></button>

				</div>
				<div class="col-md-8">
					<?php

					foreach($data['list_price'] as $key=>$val2){
						?>

						<div  class="col-md-4 " >

							<div  class="form-group ">
								<div class="input-group">
									<span  class="input-group-addon"><?=$val2->s_topic_th;?>  </span>

									<input  type="text" class="form-control " name="<?=$val2->id;?>_<?=$val2->i_plan_price;?>"
									class="input_<?=$val->id;?>" value="<?=$val2->i_price;?>" disabled>
									<span  class="input-group-addon"><?=$val2->s_payment;?>  </span>
								</div>

							</div>


							
						</div>

					<?php }?>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-success btn_show_hide btn_<?=$val->id;?> hide" id="btn_<?=$val->id;?>" onclick="save_edit_com('<?=$val->id;?>)" >บันทึก</button>
				</div>
			</form>
		</div>
		<?php

	} ?>
<style type="text/css">
	.show{
		display: block;
	}
	.hide{
	display: none;
	}
</style>

	<script type="text/javascript">
		function edit_plan_com_price(id){
			console.log(id)
			$('.btn_show_hide').addClass('hide')
			$('.btn_show_hide').removeClass('show')
			$('#btn_'+id).addClass('show')
			// $('#btn_'+id).removeClass('hide')
		}
	</script>