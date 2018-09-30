<div class="input-group" >
                                        <span class="input-group-addon">ค่าตอบแทน</span>
				<select name="select_country" class="form-control" id="select_country" onchange="change_plan_price(this.value)">
					<option value="">- ประเภทค่าตอบแทน -</option>
					<?php
					$_where = array();
      	// $_where['i_shop'] = $_POST[i_shop];
      	// $_where['i_shop'] = 1;
      	// $_where['status'] = 1;
		$_select = array('*');
		$_order = array();
		$_order['sort_index'] = 'ASC';
		$data['plan_price'] = $this->Main_model->fetch_data('','',TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select,$_order);
					
					// print_r(json_encode($data['clist_plan']));
					foreach($data['plan_price'] as $key=>$val3){

						$_where = array();
					$_where['i_shop_country_icon'] = $_POST[country_id];
					$_where['i_plan_price'] = $val3->id;
					$_select = array('id');
					$_order = array();
					$_order['id'] = 'asc';
					$cklist_plan = $this->Main_model->rowdata(TBL_SHOP_COUNTRY_COM_LIST,$_where,$_select);
							if ($cklist_plan->id > 0) {
								$disselect = 'disabled';
								$color = 'text-default';
							}
							else{
								$disselect = '';
								$color = '';

							}
						?>
						<option value="<?=$key;?>" class="<?=$color;?>" <?=$disselect;?>> <?=$val3->topic_th;?></option>

					<?php } ?>
				</select>
			</div>