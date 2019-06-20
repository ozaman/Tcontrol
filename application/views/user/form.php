<?php

$_where = array();
         // $_where['levelname'] = $_GET[type];
        $_select = array('*');
         $_order = array();
            $_order['id'] = 'asc'; 
$arr[SHOPPING_PRODUCT] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,'',$_select,$_order);
// $category = $this->Main_model->rowdata(TBL_WEB_ADMIN,array('id' => $_GET[id]));

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
<form class="form-horizontal form-banded form-bordered"  id="form_add_user"    >
  <input type="hidden" name="type" value="<?=$_GET[type];?>">
<div class="box box-outlined" >
          <div class="box-head">

            <div class="col-md-12"><header><h4 class="text-light"><i class="fa fa-pencil fa-fw"> </i><strong> เพิ่ม<?=$txt_add;?> </strong></h4></header></div>
           
          </div>
          <div class=" tab-content">
            <div class="tab-pane active" id="home_detail">
              <div class="box-body no-padding">
                <div class="col-md-12">
                 
                <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">ชื่อร้านค้า</label>
                    </div>
                    <div class="col-md-10" id="data_select_category">
                      <select id="select_type" class="form-control" name="shop_product"> <?=$chk_disabled;?> >
                        <option value="">เลือกชื่อร้านค้า</option>
                        <?php
                        foreach ($arr[SHOPPING_PRODUCT] as $key => $value) {
                          
                          ?>
                          <option value="<?=$value->id;?>"   ><?=$value->topic_th;?></option>
                        <?php }?>

                      </select>
                    </div>
                  </div> 
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">ชื่อผู้ใช้งาน</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" name="username" type="text" id="topic_en"  value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">รหัสผ่าน</label>
                    </div>
                    <div class="col-md-10">
                      <input class="form-control" name="password" type="text" id="password"  value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">ชื่อ-นามสกุล</label>
                    </div>

                    <div class="col-md-10">
                      <input class="form-control" name="name_nickname" type="text" id="name_nickname"  value="">
                    </div>
                  </div>
                   <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">ชื่อเล่น</label>
                    </div>

                    <div class="col-md-10">
                      <input class="form-control" name="nickname" type="text" id="nickname"  value="">
                    </div>
                  </div>
                   <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">เบอร์โทรศัพท์</label>
                    </div>

                    <div class="col-md-10">
                      <input class="form-control" name="phone" type="text" id="phone"  value="">
                    </div>
                  </div>
                   <div class="form-group row">
                    <div class="col-md-2">
                      <label class="control-label">อีเมล์</label>
                    </div>

                    <div class="col-md-10">
                      <input class="form-control" name="email" type="text" id="email"  value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary btn-md <?=$btn_none;?> " id="form_add_user_save" onclick="form_add_user()"> <span id="txt_btn_save5" > บันทึกข้อมูล </span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
        
          </div>
        </div><!--end .box -->
      </form>