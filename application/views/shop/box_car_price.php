
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
    ?>
    <div  class="form-group ">
      <div class="col-md-1">
        <span class="pull-right">  </span>
      </div>
      <div class="col-md-12">
       <?php
       foreach ($data['list_price'] as $key => $val2) {
        if ($val2->s_topic_en == 'comision') {
          $curen = '%';
        }
        else {
          $curen = '';
        }
        ?>
        <div  class="col-md-3 " style="margin-right: 5px">
          <div  class="form-group ">
            <div class="input-group">
              <span  class="input-group-addon" style="width: 65px"><?=$val2->s_topic_th;?>  </span>
              <input  type="text" class="form-control" value="<?=$val2->i_price;?> <?=$curen;?>" disabled>
              <span  class="input-group-addon" style="width: 65px"><?=$val2->s_payment;?>  </span>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
    <div class="box-head">
     <header><h4 class="text-light">ค่าตอบแทนตามประเภทรถ</h4></header>
     <input type="hidden" name="" id="id_shop_product" value="1">
   </div>
   <?php
   foreach ($data['list_price'] as $key => $val2) {
    ?>
    <div class="col-md-12">
     <div class="col-md-4 " >
      <div class="form-group ">
        <div class="input-group">
          <span class="input-group-addon" style="width: 65px"> <?=$val2->s_topic_th;?> </span>
          <input type="number" id="default_price_car_<?=$val2->id;?>" class="form-control" >
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group ">
        <button type="button" class="btn btn-md btn-info"  onclick="func_default_price('<?=$_POST[i_shop];?>',
        $('#default_price_car_<?=$val2->id;?>').val(),'<?=$val2->i_plan_product_price_name;?>','<?=$_GET[option];?>','<?=$_POST[list_plan];?>','<?=$_POST[country];?>')"><strong>ค่าเริ่มต้นทั้งหมด</strong></button>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>
<div  class="form-group ">
  <div class="col-md-11">
    <div  class="form-group ">
      <div id="box_com_usecar">
     
      </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript">
  // $_POST[list_plan]  ==  i_plan_price
  initusetype('<?=$_POST[i_shop];?>','<?=$_GET[option];?>','<?=$_POST[list_plan];?>','<?=$_POST[country];?>')
          function initusetype(shop,options,list_plan,country) {
            var url2 = base_url+ "shop/get_com_usecar?option="+options;
            var param = {
              i_shop: shop,
              option : options,
              i_plan_price : list_plan,
              country : country
            }
                // console.log('************************************')
                // console.log(url2)
                $.ajax({
                 url: url2,
                 data: param,
                 type: 'post',
                 error: function() {
                    console.log('Error');
                },
                success: function(ele) {
                // console.log(ele);
                $('#box_com_usecar').html(ele);

              }
            });
              }
</script>