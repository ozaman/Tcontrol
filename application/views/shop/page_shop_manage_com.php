
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
               <!-- <form class="form-horizontal form-banded form-bordered" id="form_region" > -->
                  <!-- <div class="col-md-12"> -->
                     <div class="row">
                                <!-- <div class="col-md-2">
                                    
                                </div> -->
                                <div class="col-md-11">
                                    <div class="input-group" >
                                        <span class="input-group-addon">เลือกสัญชาติ</span>
                                        <select name="select_country" class="form-control" id="select_country" onchange="change_region(this.value)">
                                          <option value="">- เลือกสัญชาติ -</option>

                                          <?php


                                          foreach($country as $key=>$val){


				                  // if($shop->main == $main->id ){
				                  //   $selected_sub = "selected";
				                  // }else{
				                  //   $selected_sub = "";
				                  // }
                                           ?>

                                           <option value="<?=$key;?>" ><?=$val->name_th;?></option>
                                       <?php } ?>
                                   </select>
                               </div>
                           </div>
                           <div class="col-md-1" align="right">
									<!-- <input name="region_id" type="hidden" id="sub"  value="1">
            						<input name="region_country_code" type="hidden" id="main" value="1">
            						<input name="region_country_code" type="hidden" id="main" value="1"> -->
            						<button type="button" class="btn btn-primary btn-md"   onclick="submit_region('<?=$_POST[id];?>')" style="width: 100%"> <span id="txt_btn_save5"> เพิ่ม </span></button>
            					</div>
            				</div>


            				<!-- </div> -->
            				<div class="row">
            					<div class="box-head">
            						<header><h4 class="text-light">จัดการค่าตอบแทน</h4></header>
            					</div>
            					<div class="col-md-12">
            						
            						<div id="box_com_add">
            							
            						</div>
            					</div>
            				</div>
                           <!--  <div class="row">
                                <div class="box-head">
                                    <header><h4 class="text-light">จัดการค่าตอบแทนตามประเภทรถ</h4></header>
                                </div>
                                <div class="col-md-12">

                                    <div id="box_car_add">

                                    </div>
                                </div>
                            </div> -->
                            <!-- </form> -->
                        </div>

                    </div>

                    <!-- </form> -->
                </div><!--end .box-body -->
            </div><!--end .box -->
        </div>
        <script>
        	var param;
        	function change_region(item) {
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
        	init('<?=$_POST[id];?>','<?=$_GET[option];?>')
        	function init(item,options) {
        		var url2 = base_url+ "shop/get_region?option="+options;
        		var param = {
        			i_shop: item
        		}
                console.log('************************************')
                console.log(url2)
                $.ajax({
                 url: url2,
                 data: param,
                 type: 'post',
                 error: function() {
                    console.log('Error Profile');
                },
                success: function(ele) {
        				// console.log(ele);
        				$('#box_com_add').html(ele);

        			}
        		});
                // var url3 = base_url+ "shop/get_car_price?option="+options;

                // $.ajax({
                //     url: url3,
                //     data: param,
                //     type: 'post',
                //     error: function() {
                //         console.log('Error Profile');
                //     },
                //     success: function(ele) {
                //         // console.log(ele);
                //         $('#box_car_add').html(ele);

                //     }
                // });
            }
            function func_UpdateCar_rat(i_shop,i_car_type,i_price,op) {
              func_Updatecar(i_shop,i_car_type,i_price,op);
          }
          function func_Updatecar(i_shop,i_car_type,i_price,op) {
            var url = base_url + "shop/func_Updatecar?option="+"<?=$_GET[option];?>";
            var param = {
                product: i_shop,
                i_car_type: i_car_type,
                i_price: i_price,
                op : op

            }
            console.log(param);
            $.ajax({
                url: url,
                data: param,
                type: 'post',
                dataType: 'json',
                error: function () {
                  console.log('Error Profile');
              },
              success: function (res) {
                  console.log(res);
                  if (res.data == true) {
                    console.log($('#i_checkbox' + i_car_type).prop("checked"))
                    $('#i_checkbox' + i_car_type).prop("checked", false);
                    $('#l_checkbox' + i_car_type).addClass('active');
                    var s_val = 0;

                    toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
                }
                else{
                  $('#l_checkbox' + i_car_type).removeClass('active');

                  $('#i_checkbox' + i_car_type).prop("checked", true);
                  var s_val = 1;
              }
          }
      });
        }



</script>