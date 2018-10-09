
<!--  -->
	<div class="box box-outlined">
        <div class="col-lg-12">
		<div class="box-head">
			<header><h4 class="text-light">เพิ่มสัญชาติที่ให้บริการ</h4></header>
			<input type="hidden" name="" id="id_shop_product" value="<?=$_POST[id];?>">
		</div>
		<div class="box-body ">
			


			<div class="form-group form-group-md">
				

				<div class="col-md-12">
							<div class="row">
                                <div class="col-md-11">
                                    <div class="input-group" >
                                        <span class="input-group-addon">เลือกสัญชาติ</span>
                                   <select name="select_country" class="form-control" id="select_country" onchange="change_region_company(this.value)">
                                      <option value="">- เลือกสัญชาติ -</option>
                                      <?php
                                      foreach($country as $key=>$val){
                                         ?>
                                         <option value="<?=$key;?>" ><?=$val->name_th;?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                             </div>
                             <div class="col-md-1" align="right">
            						<button type="button" class="btn btn-primary btn-md"   onclick="submit_region_company('<?=$_POST[id];?>')" style="width: 100%"> <span id="txt_btn_save5"> เพิ่ม </span></button>
            					</div>
            				</div>
            				<div class="row">
            					<div class="box-head">
            						<header><h4 class="text-light">จัดการค่าตอบแทน</h4></header>
            					</div>
            					<div class="col-md-12">
            						
            						<div id="box_com_add_company">
            							
            						</div>
            					</div>
            				</div>
            			</div>

            		</div>

            		<!-- </form> -->
            	</div><!--end .box-body -->
            </div><!--end .box -->
        </div>
        <script>
        	var param;
        	function change_region_company(item) {
        		// console.log(item)
        		var data_country = JSON.parse('<?=json_encode($country);?>');
        		// console.log(data_country[item])
        		
        		param = {
        			id: data_country[item].id,
        			name_en: data_country[item].name_en,
        			name_th: data_country[item].name_th,
        			name_cn: data_country[item].name_cn,
        			country_code: data_country[item].country_code,
        			i_shop: '<?=$_POST[id];?>'
        		}
        		console.log(param)
        		
        	}
        	init_company('<?=$_POST[id];?>')
        	function init_company(item) {
        		var url2 = base_url+ "company/get_region_company";
        		var param = {
        			i_shop: item
        		}
        		$.ajax({
        			url: url2,
        			data: param,
        			type: 'post',
        			error: function() {
        				console.log('Error Profile');
        			},
        			success: function(ele) {
        				// console.log(ele);
        				$('#box_com_add_company').html(ele);

        			}
        		});
        	}


        </script>