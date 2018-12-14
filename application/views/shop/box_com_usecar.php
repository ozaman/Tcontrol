
<?php
$_where = array();
$_where['i_shop_country_com_list'] = $_POST[i_plan_price];
$_select = array('*');
$_order = array();
$_order['id'] = 'asc';
$data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE.$_GET[option],$_where,$_select,$_order);
?>
<table>
  <tr>
    <td style=" font-weight: bold;">รายการ</td>
    <?php
    foreach ($data['list_price'] as $key => $list_price) {
      ?>
      <td style="font-weight: bold;width: 100px;"><?=$list_price->s_topic_th;?></td>
    <?php } ?>
  </tr>
  <?php
  $_where = array();
  $USE_TYPE = $this->Main_model->fetch_data('','',TBL_WEB_CAR_USE_TYPE,array('status' => 1));
  foreach ($USE_TYPE as $dataTL) {
    $_where = array();
    $_where[i_shop] = $_POST[i_shop];
    $_where[i_car_type] = $dataTL->id;
    $_where[i_list_price] = $_POST[i_plan_price];
    // $_where[i_country] = $_POST[country];
          // $_where[i_car_type] = $dataTL->id;

    $CAR_PRICE = $this->Main_model->rowdata(TBL_SHOP_CAR_PRICE.$_GET[option],$_where);
     // print_r(json_encode($_where));
    $chk_box = ($CAR_PRICE->i_status > 0) ? 'checked' : '';
    foreach ($data['list_price'] as $key => $list_price) {
        if ($list_price->i_plan_product_price_name == 5 ) {
       $chk_box_active = ($CAR_PRICE->i_status ==1) ? 'active' : '';

     }
    //   if ($list_price->i_plan_product_price_name == 5 ) {
    //    $chk_box_active = ($CAR_PRICE->i_price_park > 0) ? 'active' : '';

    //  }
    //  if ($list_price->i_plan_product_price_name == 6 ) {
    //   $chk_box_active = ($CAR_PRICE->i_price_person > 0) ? 'active' : '';

    // }
    // else if ($list_price->i_plan_product_price_name == 7) {


    //   $chk_box_active = ($CAR_PRICE->i_price_com > 0) ? 'active' : '';

    // }
  }

                            // $td_percent = ($sub_type_list->i_status > 0) ? '' : 'none';
  ?>
  <tr>
    <td>
      <div data-toggle="buttons"  onclick="func_TypeListcar('<?=$_POST[i_shop];?>', '<?=$dataTL->id;?>', 'i_status');">
        <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_box_active;?> " id="l_checkbox<?=$dataTL->id;?>"><?=$dataTL->name_th;?>
        <input type="checkbox" value="1" id="i_checkbox<?=$dataTL->id;?>" name="i_checkbox<?=$dataTL->id;?>" <?=$chk_box;?>> </label>
      </div>
    </td>
    <?php
    foreach ($data['list_price'] as $row) {
      if ($row->i_plan_product_price_name == 5) {
        $price = $CAR_PRICE->i_price_park;
      }
      else if ($row->i_plan_product_price_name == 6) {
        $price = $CAR_PRICE->i_price_person;
      }
      else if ($row->i_plan_product_price_name == 7) {
        $price = $CAR_PRICE->i_price_com;
      }
      ?>
      <td  class="td_percent<?=$dataTL->id;?>">
        <div class="input-group"><input style="width: 80%;margin: 5px 0; border-radius: 5px;" onchange="func_UpdateCar_rat('<?=$_POST[i_shop];?>', '<?=$dataTL->id;?>', this.value,'<?=$row->i_plan_product_price_name;?>','<?=$row->id;?>','<?=$_POST[country];?>','<?=$_POST[option];?>','<?=$CAR_PRICE->id;?>');" type="number" class="form-control" value="<?=$price;?>" >
        </div></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>