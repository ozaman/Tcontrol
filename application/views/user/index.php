<?php

// $category = $this->Main_model->rowdata(TBL_WEB_ADMIN,array('id' => $_GET[id]));

$_where = array();
         // $_where['levelname'] = $_GET[type];
        $_select = array('*');
         $_order = array();
            $_order['id'] = 'asc'; 
$arr[SHOPPING_PRODUCT] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,'',$_select,$_order);

if ($_GET[type] == 'admin') {
  $txt_add = 'ผู้ดูแลระบบ';
}
else if ($_GET[type] == 'supplier') {
  $txt_add = 'ผู้ให้บริการ';
  # code...
}
else{
  $txt_add = 'คนขับรถ';

}
?>
<ol class="breadcrumb">
  <li class="head_title"><a href="<?=base_url(); ?>shop/data_shop_categorie" class="head_title">ผู้ใช้งานระบบ</a></li>
  <li class="head_title_sub">ผู้ให้บริการ<?=$category->topic_th; ?> </li>
 
</ol>
<div class="section-body ">
  <div class="row" id="body_page_call">
    <div class="col-lg-12">
      <div class="box box-outlined">
        <div class="box-head">
          <div class="box-body" style="padding-bottom: 0">
            <!-- <a href="<?=base_url(); ?>shop/data_shop_categorie"><button class="btn " ><span><i class="fa fa-chevron-left" ></i> </span>กลับ</button></a> -->
            <table width="100%">
              <tr>
                <td><button class="btn btn-success" onclick="func_openFormadd('<?=$_GET[type]; ?>','<?=$txt_add;?>');"><span><i class="fa fa-plus"></i> </span>เพิ่ม<?=$txt_add;?></button></td>
                <td>
                  <select id="select_type_search" class="form-control " name="shop_product"> <?=$chk_disabled;?> >
                        <option value="">เลือกชื่อร้านค้า</option>
                        <?php
                        foreach ($arr[SHOPPING_PRODUCT] as $key => $value) {
                          
                          ?>
                          <option value="<?=$value->id;?>"   ><?=$value->topic_th;?></option>
                        <?php }?>

                      </select>
                </td>
                <td ><button class="btn btn-success" onclick="get_data()" style="margin-left: 5px"><span> </span>Reset</button></td>
              </tr>
            </table>
            
           
          </div>
        </div>
        <div id="form_data" >
          
        </div>
        
      </div><!--end .box -->
    </div>
  </div>
</div>

<script type="text/javascript">
get_data()
  function get_data() {
    var type = '<?=$_GET[type];?>';
    var url2 = base_url + "users/get_form_data?opt=all&type=" + type;
    console.log(base_url)
    // var param = {
    //   i_shop: item
    // }
    console.log('************************************')
    console.log(url2)
    $.ajax({
      url: url2,
      // data: param,
      type: 'post',
      error: function () {
        console.log('Error Profile');
      },
      success: function (ele) {
        // console.log(ele);
        $('#form_data').html(ele);

      }
    });
  }
  
  $('#select_type_search').on('change', function() {
    var type = '<?=$_GET[type];?>';
    var url2 = base_url + "users/get_form_data?opt=search&type=" + type+'&id='+$('#select_type_search').val();
    console.log(base_url)
    // var param = {
    //   i_shop: item
    // }
    console.log('************************************')
    console.log($('#select_type_search').val())
    $.ajax({
      url: url2,
      // data: param,
      type: 'post',
      error: function () {
        console.log('Error Profile');
      },
      success: function (ele) {
        // console.log(ele);
        $('#form_data').html(ele);

      }
    });
  });
</script>