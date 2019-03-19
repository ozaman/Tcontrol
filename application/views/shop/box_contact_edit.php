
<?php
if ($_GET[op] == 'edit') {
   # code...

$show_edit = '';
  $_where = array();
  $_where['id'] = $_POST[id];
            // $_where['admintype'] = 2;
  $_select = array('*');
  $_order = array();
  $_order['id'] = 'asc';
            // $this->db->where('type<>','zello');
  $arr[SHOPPING_CONTACT] = $this->Main_model->fetch_data('','',TBL_SHOPPING_CONTACT,$_where,$_select,$_order);
// print_r(json_encode($arr[SHOPPING_CONTACT][0]->id));
  $_where = array();
  $_where['id'] = $arr[SHOPPING_CONTACT][0]->id;
            // $_where['admintype'] = 2;
  $_select = array('*');
  $_order = array();
  $_order['id'] = 'asc';
            // $this->db->where('type<>','zello');
  $arr[SHOPPING_PRODUCT] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT,$_where,$_select,$_order);
             // print_r(json_encode( $arr[SHOPPING_PRODUCT]));
// $pro_id = $_POST[id];
}
else{
  $show_edit = 'none';
}

// else{
// $btn_submit = 'submit_detail_contact';

// }

 //include("admin/mod/content/menu/contact_company.php");
?>

<form id="form_contact" class="form-horizontal form-banded form-bordered" >
 <input type="hidden" name="contact_id" id="contact_id" value="<?=$arr[SHOPPING_CONTACT][0]->id;?>">
 <input type="hidden" name="contact_product_id" value="<?=$_POST[id];?>">
 <div class="box box-outlined">
   <div class="col-md-12">
    <div class="box-head">
      <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ผู้ติดต่อ <strong></strong></h4></header>
    </div>
    <!-- <div class="box-body "> -->
      <!-- <form class="form-horizontal form-banded form-bordered"  id="form_detail_shop"   > -->
        <div class="form-group form-group-md">
          <div class="col-md-2">
            <label class="control-label">ผู้ดูแล</label>
          </div>

          <div class="col-md-10">
           <select  class="form-control" name="contact_admintype" id="admintype" style="" >
            <option value="" > ---- กรุณาเลือก ---- </option>
            <?php
            $_where = array();
            $_where['status'] = 1;
            // $_where['admintype'] = 2;
            $_select = array('*');
            $_order = array();
            $_order['id'] = 'asc';
            // $this->db->where('type<>','zello');
            $arr[ADMIN_TYPE] = $this->Main_model->fetch_data('','',TBL_SHOPPING_CONTACT_ADMIN_TYPE,$_where,$_select,$_order);

            foreach($arr[ADMIN_TYPE] as $val){

              if($arr[SHOPPING_CONTACT][0]->admintype == $val->id ){
                $selected = "selected";
              }else{
                $selected = "";
              }
              ?>
              <option    <?=$selected;?> value="<?=$val->id;?>"><?=$val->name_th;?></option>
            <?php } ?>
            ?>
          </select>
        </div>
      </div>
      <div class="form-group form-group-md">
        <div class="col-md-2">
          <label class="control-label">ตำแหน่ง</label>
        </div>

        <div class="col-md-10" id="data_select_category">
         <select  class="form-control" name="contact_usertype" id="usertype" style="" >
           <option value="">---- กรุณาเลือก ---- </option>
           <?php
           $_where = array();
           $_where['status'] = 1;
            // $_where['admintype'] = 2;
           $_select = array('*');
           $_order = array();
           $_order['id'] = 'asc';
            // $this->db->where('type<>','zello');
           $arr[CONTACT_TYPE] = $this->Main_model->fetch_data('','',TBL_SHOPPING_CONTACT_TYPE,$_where,$_select,$_order);
                // $res[con_type] = $db->select_query("SELECT * FROM shopping_contact_type where status = 1 ");


           foreach($arr[CONTACT_TYPE] as $val){

            if($arr[SHOPPING_CONTACT][0]->usertype == $val->id ){
              $selected = "selected";
            }else{
              $selected = "";
            }
            ?>
            <option    <?=$selected;?> value="<?=$val->id;?>"><?=$val->name_th;?></option>



          <?php }
          ?>
        </select>
        <!-- <input name="sub" type="hidden" id="sub"  value="1"> -->
        <!-- <input name="main" type="hidden" id="main" value="1"> -->
      </div>
    </div>



    <div class="form-group form-group-md">
      <div class="col-md-2">
        <label class="control-label">ชื่อ</label>
      </div>

      <div class="col-md-10">
       <input name="contact_name" type="text" class="form-control" id="contact_name"  value="<?=$arr[SHOPPING_CONTACT][0]->name;?>" />
     </div>
   </div>
   <div class="form-group form-group-md">
    <div class="col-md-2">
      <label class="control-label">เบอร์โทรศัพท์ </label>
    </div>

    <div class="col-md-10">
      <input name="contact_phone" type="text" class="form-control" id="contact_phone"  value="<?=$arr[SHOPPING_CONTACT][0]->phone;?>" />
    </div>
  </div>
  <div class="form-group form-group-md">
    <div class="col-md-2">
      <label class="control-label">เบอร์โทรศัพท์สำรอง</label>
    </div>

    <div class="col-md-10">
      <input name="contact_phone_2" type="text" class="form-control" id="contact_phone_2"  value="<?=$arr[SHOPPING_CONTACT][0]->phone_2;?>" />
    </div>
  </div>
  <div class="form-group form-group-md">
    <div class="col-md-2">
      <label class="control-label">อีเมล</label>
    </div>

    <div class="col-md-10">
      <input name="contact_email" type="text" class="form-control" id="contact_email"  value="<?=$arr[SHOPPING_CONTACT][0]->email;?>" />
    </div>
  </div>
  <div class="form-group form-group-md">
    <div class="col-md-2">
      <label class="control-label">อีเมลสำรอง</label>
    </div>

    <div class="col-md-10">
      <input name="contact_email_2" type="text" class="form-control" id="contact_email_2"  value="<?=$arr[SHOPPING_CONTACT][0]->email_2;?>" />
    </div>

  </div>
  <div class="form-group form-group-md">
    <div class="col-md-2">
      <label class="control-label">ไอดี Line</label>
    </div>

    <div class="col-md-10">
     <input name="contact_line_id" type="text" class="form-control" id="contact_line_id"  value="<?=$arr[SHOPPING_CONTACT][0]->line_id;?>" />
   </div>

 </div>
 <div class="form-group form-group-md">
  <div class="col-md-2">
    <label class="control-label">ไอดี WeChat</label>
  </div>

  <div class="col-md-10">
   <input name="contact_wechat_id" type="text" class="form-control" id="contact_wechat_id"  value="<?=$arr[SHOPPING_CONTACT][0]->wechat_id;?>">

 </div>

</div>


<div class="form-group form-group-md">
  <div class="col-md-2">
    <label class="control-label">ไอดี Skype</label>
  </div>

  <div class="col-md-10">
   <input name="contact_skype_id" type="text" class="form-control" id="contact_skype_id"  value="<?=$arr[SHOPPING_CONTACT][0]->skype_id;?>" />
 </div>

</div>
<div class="form-group form-group-md">
  <div class="col-md-2">
    <label class="control-label">ไอดี WhatsApp</label>
  </div>

  <div class="col-md-10">
   <input name="contact_whatsapp_id" type="text" class="form-control" id="contact_whatsapp_id"  value="<?=$arr[SHOPPING_CONTACT][0]->whatsapp_id;?>" />
 </div>

</div>
<div class="form-group form-group-md">
  <div class="col-md-2">
    <label class="control-label">ไอดี Zello</label>
  </div>

  <div class="col-md-10">
    <input name="contact_zello_id" type="text" class="form-control" id="contact_zello_id"  value="<?=$arr[SHOPPING_CONTACT][0]->zello_id;?>" />
  </div>

</div>

<div class="form-group form-group-md" style="display: <?=$show_edit;?>">
  <div class="col-md-2">
    <label class="control-label">หน้าที่ตามจุด</label>
  </div>
  <?php 
  // echo $_POST[id] .'sssssss';
  // print_r(json_encode($arr[SHOPPING_CONTACT]));
 


                          $_where = array();
    $_where['i_user_contact'] = $_POST[id];
    $_select = array('*');
    $ABILITY_USER = $this->Main_model->rowdata(NEW_TBL_ABILITY_USER,$_where,$_select);
       // echo '<pre>';
       //  print_r($ABILITY_USER);
       //  echo '</pre>';

    if ($ABILITY_USER->i_lab_approve_job == 1) {
      $lab_approve_job = 1;
      $i_lab_approve_job = 'active';
    }
    else {
      $set_value = 0;
      $i_lab_approve_job = '';
    }
    if ($ABILITY_USER->i_check_guest_receive == 1) {
      $check_guest_receive = 1;
      $i_check_guest_receive = 'active';
    }
    else {
      $set_value = 0;
      $i_check_guest_receive = '';
    }
    if ($ABILITY_USER->i_check_guest_register == 1) {
      $check_guest_register = 1;
      $i_check_guest_register = 'active';
    }
    else {
      $set_value = 0;
      $i_check_guest_register = '';
    }
    if ($ABILITY_USER->i_check_lab_pay == 1) {
      $check_lab_pay = 1;
      $i_check_lab_pay = 'active';
    }
    else {
      $set_value = 0;
      $i_check_lab_pay = '';
    }
  ?>




                 
                  <div class="col-md-10 ">
                    <div style="background: #f2f2f2;padding: 10px;">
                      <div  data-toggle="buttons">
                      
                          <label class="btn btn-success btn-outline <?=$i_lab_approve_job;?>" id="i_lab_approve_job">
                            <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="in_i_lab_approve_job" value="<?=$ABILITY_USER->i_lab_approve_job;?>" 
                                                       onchange="updatetypework('<?=$_POST[id];?>', this.value, 'i_lab_approve_job')" > 
                            <span style="text-transform:capitalize;">รับทราบงานแขก</span>
                          </label>
                          <label class="btn btn-success btn-outline <?=$i_check_guest_receive;?>" id="i_check_guest_receive">
                            <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="in_i_check_guest_receive" value="<?=$ABILITY_USER->i_check_guest_receive;?>" 
                                                       onchange="updatetypework('<?=$_POST[id];?>', this.value, 'i_check_guest_receive')" > 
                            <span style="text-transform:capitalize;">พนักงานต้อนรับ</span>
                          </label>
                          <label class="btn btn-success btn-outline <?=$i_check_guest_register;?>" id="i_check_guest_register">
                            <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="in_i_check_guest_register" value="<?=$ABILITY_USER->i_check_guest_register;?>" 
                                                       onchange="updatetypework('<?=$_POST[id];?>', this.value, 'i_check_guest_register')" > 
                            <span style="text-transform:capitalize;">ลงทะเบียน</span>
                          </label>
                          <label class="btn btn-success btn-outline <?=$i_check_lab_pay;?>" id="i_check_lab_pay">
                            <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="in_i_check_lab_pay" value="<?=$ABILITY_USER->i_check_lab_pay;?>" 
                                                       onchange="updatetypework('<?=$_POST[id];?>', this.value, 'i_check_lab_pay')" > 
                            <span style="text-transform:capitalize;">บัญชี</span>
                          </label>
                        
                      </div>
                    </div>

                  </div>
                
                </div>




<div class="form-group form-group-md">
  <div class="col-md-10">

  </div>

  <div class="col-md-2">

    <button type="button" class="btn btn-primary btn-md pull-right" id="submit_data_1" onclick="submit_detail_contact('<?=$_POST[id];?>','<?=$_GET[op];?>')"> <span id="txt_btn_save5"> บันทึกข้อมูล </span></button>
  </div>
</div>



<!-- </div>end .box-body  -->
</div>
</div>
</form>


















