
<!-- <form class="form-horizontal form-banded form-bordered" id="form_region" > -->
<!-- <div class="col-md-12"> -->

      <!-- <select name="select_country" class="form-control" id="select_country" onchange="change_region(this.value)"> -->
    <!-- <option value="">- เลือกสัญชาติ -</option> -->

      <!-- start comision -->
      <div class="row">
        <div class="form-group form-group-md">
            <div  class="form-group ">
              <div class="col-md-11">
                      <div  class="form-group ">
                        <table>
                          <tr>
                            <td style=" font-weight: bold;">รายการ</td>
                            <!-- <td style="font-weight: bold;width: 100px;"></td> -->
                            <td style="font-weight: bold;width: 100px;">ค่าคอม %</td>
                          </tr>
                          <?php
                          $_where = array();
                          $USE_TYPE = $this->Main_model->fetch_data('','',TBL_WEB_CAR_USE_TYPE,array('status' => 1));
                          foreach ($USE_TYPE as $dataTL) {

                            $_where = array();
                            $_where[i_shop] = $_POST[i_shop];
                            $_where[i_car_type] = $dataTL->id;

                            $CAR_PRICE = $this->Main_model->rowdata(TBL_SHOP_CAR_PRICE,$_where);
                            $chk_box = ($CAR_PRICE->i_status > 0) ? 'checked' : '';
                            // $chk_box_active = ($sub_type_list->i_status > 0) ? 'active' : '';
                            // $td_percent = ($sub_type_list->i_status > 0) ? '' : 'none';
                            if ($CAR_PRICE != null) {
                              # code...
                            }
                            ?>
                            <tr>
                              <td>
                                <div data-toggle="buttons"  onclick="func_TypeListcar('<?=$_POST[i_shop];?>', '<?=$dataTL->id;?>', 'i_status');">
                                  <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> "><?=$dataTL->name_th;?>
                                    <input type="checkbox" value="1" id="i_checkbox<?=$dataTL->id;?>" name="i_checkbox<?=$dataTL->id;?>" <?=$chk_box;?>> </label>
                                </div>
                              </td>
                              <!-- <td style="display:<?=$td_percent;?>;" class="td_percent<?=$val2->id;?><?=$dataTL->i_main_typelist;?>"><input style="width: 80%;" onkeyup="func_UpdateTypeListPercent_rate('<?=$_POST[i_shop];?>', '<?=$val2->id;?>', '<?=$dataTL->i_main_typelist;?>', '<?=$shop->main;?>', '<?=$shop->sub;?>', 'f_discount', this.value);"  type="number" class="form-control" value="<?=$sub_type_list->f_discount;?>" ></td> --> 
                              <td  class="td_percent<?=$val2->id;?>">
                                <div class="input-group"><input style="width: 80%;margin: 5px 0; border-radius: 5px;" onkeyup="func_UpdateCar_rat('<?=$_POST[i_shop];?>', '<?=$dataTL->id;?>', this.value);" type="number" class="form-control" value="" >
                                </div></td>
                            </tr>
                          <?php }?>

                        </table>

                      </div>
              
             
              </div>
            </div>
          
        </div>
      </div>
    
<!-- </div> -->
<div class="row">
</div>
<!-- </form> -->
<!-- </div>