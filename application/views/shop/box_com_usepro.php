
<div class="box box-outlined">
  <div class="col-lg-12">
    <!-- <div class="box-head">
     <header><h4 class="text-light">ค่าตอบแทนตามประเภทรถ</h4></header>
     <input type="hidden" name="" id="id_shop_product" value="1">
   </div> -->
   <div class="box-body ">
    <?php
    $_where = array();
    $_where['i_shop_country_com_list'] = $_POST[list_plan];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE.$_GET[option],$_where,$_select,$_order);
    foreach ($data['list_price'] as $val2) {
      ?>
      <div  class="col-md-12 " style="margin-right: 5px">
          <div  class="form-group ">
            <div class="input-group">
              <span  class="input-group-addon" style="width: 65px"><?=$val2->s_topic_th;?>  </span>
              <input  type="text" class="form-control" value="<?=$val2->i_price;?> <?=$curen;?>" disabled>
              <span  class="input-group-addon" style="width: 65px"><?=$val2->s_payment;?>  </span>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          
      
        <?php

                    if ($val2->i_plan_price == 7) {
                      //echo TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT;
                      ?>
                      <div  class="form-group ">
                        <table>
                          <tr>
                            <td style=" font-weight: bold;">รายการ</td>
                            <td style="font-weight: bold;width: 100px;">ถอด Vat %</td>
                            <td style="font-weight: bold;width: 100px;">ค่าคอม %</td>
                          </tr>
                          <?php
                          $_where = array();
                          $sub_typelist = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB_TYPELIST,array('sub' => $shop->sub,'i_status' => 1));
                          foreach ($sub_typelist as $dataTL) {
                            $s_sub_typelist = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,array('id' => $dataTL->i_main_typelist));
                            $_where = array();
                            $_where[product] = $shop->id;
                            $_where[i_list_price] = $val2->id;
                            $_where[i_main_typelist] = $dataTL->i_main_typelist;
                            $_where[main] = $shop->main;
                            $_where[sub] = $shop->sub;
                            $sub_type_list = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_TYPELIST_PERCENT,$_where);
                            $chk_box = ($sub_type_list->i_status > 0) ? 'checked' : '';
                            $chk_box_active = ($sub_type_list->i_status > 0) ? 'active' : '';
                            $td_percent = ($sub_type_list->i_status > 0) ? '' : 'none';
                            ?>
                            <tr>
                              <td>
                                <div data-toggle="buttons"  onclick="func_TypeListPercent('<?=$shop->id;?>', '<?=$val2->id;?>', '<?=$dataTL->i_main_typelist;?>', '<?=$shop->main;?>', '<?=$shop->sub;?>', 'i_status');">
                                  <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> "><?=$s_sub_typelist->topic_th;?>
                                    <input type="checkbox" value="1" id="i_checkbox<?=$val2->id;?><?=$dataTL->i_main_typelist;?>" name="i_checkbox<?=$val2->id;?><?=$dataTL->i_main_typelist;?>" <?=$chk_box;?>> </label>
                                </div>
                              </td>
                              <td style="display:<?=$td_percent;?>;" class="td_percent<?=$val2->id;?><?=$dataTL->i_main_typelist;?>"><input style="width: 80%;" onkeyup="func_UpdateTypeListPercent_rate('<?=$shop->id;?>', '<?=$val2->id;?>', '<?=$dataTL->i_main_typelist;?>', '<?=$shop->main;?>', '<?=$shop->sub;?>', 'f_discount', this.value);"  type="number" class="form-control" value="<?=$sub_type_list->f_discount;?>" ></td>
                              <td style="display:<?=$td_percent;?>;" class="td_percent<?=$val2->id;?><?=$dataTL->i_main_typelist;?>"><input style="width: 80%;" onkeyup="func_UpdateTypeListPercent_rate('<?=$shop->id;?>', '<?=$val2->id;?>', '<?=$dataTL->i_main_typelist;?>', '<?=$shop->main;?>', '<?=$shop->sub;?>', 'f_percent', this.value);" type="number" class="form-control" value="<?=$sub_type_list->f_percent;?>" ></td>
                            </tr>
                          <?php }?>

                        </table>

                      </div>
                    <?php }
                    ?>
                    </div>
                    <?php

                  }?>
    

</div>
</div>
</div>


 


