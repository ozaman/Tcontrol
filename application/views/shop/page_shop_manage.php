<form class="form-horizontal form-banded form-bordered"  id="form_shop_all"   >
  <?php 
  if ($_GET[state] == 'add') {
    $shop_page = 'เพิ่มร้านค่า';
  }
  else {
    $shop_page = 'แก้ไขร้านค่า';
  }
  ?>
  <ol class="breadcrumb">
    <li class="head_title">จัดการร้านค้า</li>
    <li class="head_title_sub"><a href="<?=base_url();?>shop/data_shop_categorie">ประเภทร้านค่า</a></li>
    <li class="head_title_sub_2" ><a href="<?=base_url();?>shop/data_shop_all" class="head_title_sub_2">ร้านค่าทั้งหมด</a></li>
    <li class="head_title_sub_3" ><?=$shop_page;?></li>
    <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
  </ol>
  <div class="section-body ">
    <input type="hidden" name="" id="manage_com" value="<?=$_GET[id];?>">
      <!-- 1 T-SHARE - SHOP
           2 T-SHARE - COMPANY
         -->
         <?php
         $_where = array();
         $_where['main'] = $_GET[sub];
         $_select = array('*');
         $_order = array();
         $_order['topic_en'] = 'asc';
         $arr[sub] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
         $_where = array();
         $_where['id'] = $arr[sub]->main;
         $_select = array('*');  $_order = array();
         $_order['topic_en'] = 'asc';  

         $arr[main] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);

         $_select = array('*');
         $_order = array();
         $_order['topic_en'] = 'asc';
         $arr[region] = $this->Main_model->fetch_data('','',TBL_WEB_REGION,'',$_select,$_order);

         $_select = array('*');
         $_order = array();
         $_order['name_th'] = 'asc';
         $arr[province] = $this->Main_model->fetch_data('','',TBL_WEB_PROVINCE,'',$_select,$_order);
         $_where = array();
         $_where['PROVINCE_ID'] = $shop->province;
         $_select = array('*');
         $_order = array();
         $_order['name_th'] = 'asc';
         $arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,$_where,$_select,$_order);
         if ($_GET[state] == 'add') {
          $shop_page = 'เพิ่มร้านค่า';
        }
        else {
          $shop_page = 'แก้ไขร้านค่า';
        }
        $_where = array();
        $_where['i_status'] = 1;
        $_select = array('*');
        $_order = array();
        $_order['i_index'] = 'asc';
        $arr[COMPENSATION] = $this->Main_model->fetch_data('','',TBL_SHOP_COMPENSATION_TYPE,$_where,$_select,$_order);
        ?>
        <input type="hidden" name="" id="section_state" value="1">
        <div class="row" id="body_page_call">
          <div class="col-md-6">
            <div class="box box-outlined" >
              <div class="box-head">

                <div class="col-md-12"><header><h4 class="text-light"><i class="fa fa-pencil fa-fw"> </i><strong> ข้อมูลสถานที่ </strong></h4></header></div>
                <ul class="nav nav-tabs " data-toggle="tabs" style="margin-bottom: 6px; ">
                  <li class="active"><a href="#home_detail"> ข้อมูลสถานที่</a></li>

                  <li class="" onclick="_box_document(<?=$_GET[id];?>)"><a href="#document"> เอกสาร</a></li>

                  <li class="" onclick="_box_img(<?=$_GET[id];?>)"><a href="#images"> รูปภาพ</a></li>
                  <li class=""><a href="#section_time"> ติดต่อ / เวลาทำการ</a></li>
                </ul>
              </div>
              <div class=" tab-content">
                <div class="tab-pane active" id="home_detail">
                  <div class="box-body no-padding">
                    <div class="col-md-12">
                      <div class="form-group form-group-md">
                        <div class="col-md-2">
                          <label class="control-label">หมวดหมู่</label>
                        </div>

                        <div class="col-md-10" >
                          <select id="select_category" class="form-control" name="main"  onchange="_select_category(this.value);" >
                            <option value="">เลือกหมวดหมู่ </option>
                            <?php
                            foreach($arr[main] as $key=>$main){
                              if($shop->main == $main->id ){
                                $selected_sub = "selected";
                              }else{
                                $selected_sub = "";
                              }
                              ?>
                              <option value="<?=$main->id;?>"  <?=$selected_sub;?> ><?=$main->topic_th;?></option>
                            <?php } ?>
                          </select>

                        </div>
                      </div>
                      <div class="form-group form-group-md">
                        <div class="col-md-2">
                          <label class="control-label">ประเภท</label>
                        </div>
                        <div class="col-md-10" id="data_select_category">
                          <select id="select_type" class="form-control" name="sub"> <?=$chk_disabled;?> >
                            <option value="">เลือกประเภท</option>
                            <?php

                            foreach($arr[sub] as $key=>$sub){
                             if($shop->sub == $sub->id ){
                              $selected_sub = "selected";
                            }else{
                              $selected_sub = "";
                            }
                            ?>
                            <option value="<?=$sub->id;?>"  <?=$selected_sub;?> ><?=$sub->topic_th;?></option>
                          <?php } ?>

                        </select>
                      </div>
                    </div>
                    <div class="form-group form-group-md">
                      <div class="col-md-2">
                        <label class="control-label">ชื่อ EN</label>
                      </div>
                      <div class="col-md-10">
                       <input class="form-control" name="topic_en" type="text" id="topic_en"  value="<?=$shop->topic_en?>">
                     </div>
                   </div>
                   <div class="form-group form-group-md">
                    <div class="col-md-2">
                      <label class="control-label">ชื่อ TH</label>
                    </div>
                    <div class="col-md-10">
                     <input class="form-control" name="topic_th" type="text" id="topic_th"  value="<?=$shop->topic_th?>">
                   </div>
                 </div>
                 <div class="form-group form-group-md">
                  <div class="col-md-2">
                    <label class="control-label">ชื่อ CN</label>
                  </div>

                  <div class="col-md-10">
                    <input class="form-control" name="topic_cn" type="text" id="topic_cn"  value="<?=$shop->topic_cn?>">
                  </div>
                </div>
                <div class="form-group form-group-md">
                  <div class="col-md-2">
                    <label class="control-label">ภูมิภาค</label>
                  </div>

                  <div class="col-md-10">
                    <select class="form-control" name="region" id="region" onclick="_region(this.value)">
                      <option value="">เลือกภูมิภาค </option>
                      <?php
                      foreach($arr[region] as $key=>$region){
                        if($shop->region == $region->id ){
                          $selected_sub = "selected";
                        }else{
                          $selected_sub = "";
                        }
                        ?>
                        <option value="<?=$region->id;?>"  <?=$selected_sub;?> ><?=$region->topic_th;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group form-group-md">
                  <div class="col-md-2">
                    <label class="control-label">จังหวัด</label>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control" name="province" id="province" onchange="_province(this.value);">
                      <option value="">เลือกจังหวัด</option>
                      <?php
                      foreach($arr[province] as $key=>$province){
                        if($shop->province == $province->id ){
                          $selected_sub = "selected";
                        }else{
                          $selected_sub = "";
                        }
                        ?>
                        <option value="<?=$province->id;?>"  <?=$selected_sub;?> ><?=$province->name_th;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group form-group-md">
                  <div class="col-md-2">
                    <label class="control-label">อำเภอ/เขต</label>
                  </div>
                  <div class="col-md-10">
                    <select name="select_amphur" class="form-control" id="select_amphur" >
                      <option value="">เลือกเขต/อำเภอ</option>
                      <?php
                      foreach($arr[amphur] as $key=>$amphur){

                        if($shop->amphur == $amphur->id ){
                          $selected_sub = "selected";
                        }else{
                          $selected_sub = "";
                        }
                        ?>
                        <option value="<?=$amphur->id;?>"  <?=$selected_sub;?> ><?=$amphur->name_th;?></option>
                      <?php } ?>

                    </select>
                  </div>
                </div>
                <div class="form-group form-group-md">
                  <div class="col-md-2">
                    <label class="control-label">ที่อยู่</label>
                  </div>
                  <div class="col-md-10">
                   <textarea name="address" rows="3" class="form-control" id="address" placeholder="ที่อยู่"><?=$shop->address;?>
                 </textarea>
               </div>
             </div>
             <div class="form-group form-group-md">
              <div class="col-md-2">
                <label class="control-label">Link แผนที่ </label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" value="<?=$shop->map;?>" name="map">
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-md" id="find_latlng_link"><strong>ค้นหา</strong></button>
              </div>
            </div>
            <div class="form-group form-group-md">
              <div class="col-md-2">
                <label class="control-label">แผนที่</label>
              </div>
              <div class="col-md-10">
                <input type="hidden" name="lat_db" value="<?=$shop->lat;?>" id="lat">
                <input type="hidden" name="lng_db" value="<?=$shop->lng;?>" id="lng">
                <div id="map_frame" style="">
                </div>
              </div>
            </div>
            <div class="form-group form-group-md">
              <div class="col-md-2">
                <label class="control-label">เบอร์โทรศัพท์</label>
              </div>
              <div class="col-md-10">
                <input class="form-control" name="phone" type="text" id="phone"  value="<?=$shop->phone;?>">
              </div>
            </div>
            <div class="form-group form-group-md">
              <div class="col-md-2">
                <label class="control-label">อีเมล์</label>
              </div>

              <div class="col-md-10">
                <input class="form-control" name="email" type="text" id="email"  value="<?=$shop->email;?>">
              </div>
            </div>
            <div class="form-group form-group-md">
              <div class="col-md-10">
              </div>
              <div class="col-md-2">
               <?php
               if ($_GET[state] == 'add') {
                $btn_none = 'hide';
              }
              else{
               $btn_none = 'show';
             }
             ?>
             <button type="button" class="btn btn-primary btn-md <?=$btn_none;?> " id="submit_data_1" onclick="form_detail_shop('<?=$_GET[id];?>','shop')"> <span id="txt_btn_save5" > บันทึกข้อมูล </span></button>
           </div>
         </div>
       </div>
     </div>
   </div>

   <div class="tab-pane" id="document"> 
    <div class="col-md-12">
      <div id="box_document" onload="_box_document('<?=$_GET[id];?>')"></div>
    </div>
   </div>
   <div class="tab-pane" id="images">
    <div class="col-md-12">
      <div id="box_img">
        
      </div>
    </div>
  </div>
  <div class="tab-pane" id="section_time"> <!-- TIME OPEN -->
   <!-- Contacts -->
   <div class="col-md-12">
    <div class="box-head">
      <button type="button" class="btn btn-md btn-success btn-equal " onclick="add_contact('<?=$shop->id;?>')"> <i class="fa fa-plus " ></i>
      </button>
      <header><h4 class="text-light"> ผู้ติดต่อ </h4></header>
    </div>
    <div id="box_contact" ></div>

  </div><!--END Contacts -->
  <div class="col-md-12">
    <div class="box-head" >
      <header><h4 class="text-light"> เวลาทำการ <strong></strong></h4></header>
    </div>
    <div class="form-group form-group-md">
      <div class="col-md-12">
        <div id="box_plan_time">
          <?php include 'box_plan_time.php';?>
        </div>
      </div>
    </div>
    <div class="form-group form-group-md">
      <div class="col-md-12">
        <?php
        if ($_GET[state] == 'add') {
         ?>
         <button type="button" class="btn btn-primary btn-md pull-right" id="submit_data_2" onclick="submit_add_shop()"> <span > บันทึกข้อมูล </span></button>
         <?php
       }
       else{
        ?>
        <button type="button" class="btn btn-primary btn-md pull-right" id="submit_data_2" onclick="submit_data_plan_time('<?=$_GET[id];?>','time')"> <span > บันทึกข้อมูล </span></button>
        <?php
      }
      ?>
    </div>
  </div>
</div><!--  END TIME OPEN -->
</div>
</div>
</div><!--end .box -->
</div>


<div class="col-md-6">
  <div class="col-lg-12">
    <div class="box box-outlined">
      <div class="box-head">
        <div class="col-md-12">
          <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"> </i><strong> ข้อมูลจัการค่าตอบแทน </strong></h4></header>
        </div>
        <ul class="nav nav-tabs" data-toggle="tabs" >
         <li class="<?=$active_shop;?> active" onclick="_box_region_show('<?=$_GET[id];?>','_company')">
          <a href="#section_shop"> T-share - Shop</a>
        </li> 
        <?php
        foreach($arr[COMPENSATION] as $val){
          $_where = array();
          $_where['i_shop'] = $_GET[id];
          $_where['i_compensation'] = $val->id;
          $_select = array('*');
          $type = $this->Main_model->rowdata(TBL_SHOP_EXPENDITURE_TYPE,$_where,$_select);
          if ($type == null) {
            $set_value = 0;
            $isactive = '';
          }
          else{
            if ($type->i_status == 1) {
             ?>
             <li class="" onclick="_box_region_show('<?=$_GET[id];?>','<?=$type->s_db;?>')">
              <a href="#section_<?=$type->s_field;?>"> T-share - <span style="text-transform:capitalize;"><?=$type->s_field;?></span></a>
            </li>
          <?php }
        }
      }?>
    </ul>
  </div>
  <div class="box-body-s tab-content">
    <!-- T_SHARE - SHOPPING -->
    <div class="tab-pane active" id="section_shop">
      <?php
      if ($type->i_company == 1) {
        $in_shop = 'active';
        $chk_in_shop = 'checked="checked"';
      }
      else{
        $in_shop = '';
        $chk_in_shop = '';
      }

      if ($type->i_taxi == 1) {
        $in_taxi = 'active';
        $chk_in_taxi = 'checked="checked"';
      }
      else{
        $in_taxi = '';
        $chk_in_taxi = '';
      }

      if ($type->i_gui == 1) {
        $in_guide = 'active';
        $chk_in_guide = 'checked="checked"';
      }
      else{
        $in_guide = '';
        $chk_in_guide = '';
      }

      if ($type->i_tourist == 1) {
        $in_tourist = 'active';
        $chk_in_tourist = 'checked="checked"';
      }
      else{
        $in_tourist = '';
        $chk_in_tourist = '';
      }
      ?>
      <div class="box-body no-padding">
        <div class="box-head">
          <header><h4 class="text-light"> ประเภทเปิดใช้งาน <strong></strong></h4></header>
        </div>
        <div class="col-md-12 ">
          <div style="background: #f2f2f2;padding: 10px;">
            <div  data-toggle="buttons">
              <?php
              foreach($arr[COMPENSATION] as $val){
                $_where = array();
                $_where['i_shop'] = $_GET[id];
                $_where['i_compensation'] = $val->id;
                $_select = array('*');
                $type = $this->Main_model->rowdata(TBL_SHOP_EXPENDITURE_TYPE,$_where,$_select);
                if ($type == null) {
                  $set_value = 0;
                  $isactive = '';
                }
                else{
                  $set_value = $type->i_status;
                  if ($set_value == 1) {
                    $set_value = 1;
                    $isactive = 'active';
                  }
                  else{
                    $set_value = 0;
                    $isactive = '';
                  }
                }
                ?>
                <label class="btn btn-success btn-outline <?=$isactive;?>" id="l_<?=$val->s_topic_en;?>">
                  <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="i_<?=$val->s_topic_en;?>" value="<?=$set_value;?>" onchange="updatetype('<?=$_GET[id];?>',this.value,'<?=$val->s_topic_en;?>','<?=$val->id;?>')" > 
                  <span style="text-transform:capitalize;"><?=$val->s_topic_en;?></span>
                </label>
              <?php } ?>
            </div>
          </div>
          <div class="box-head" style="padding: 15px 0;">
           <button type="button" class="btn btn-md btn-success btn-equal " onclick="open_commision('<?=$shop->id;?>')"> 
            <i class="fa fa-plus " ></i>
          </button>
          <header><h4 class="text-light"> ประเภทรายจ่าย </h4></header>
        </div>
      </div>
      <div class="col-md-12"> 
        <div  class="box_region_show"></div>
      </div>
    </div>
  </div>
  <?php
  foreach($arr[COMPENSATION] as $val){
    $_where = array();
    $_where['i_shop'] = $_GET[id];
    $_where['i_compensation'] = $val->id;
    $_select = array('*');
    $type = $this->Main_model->rowdata(TBL_SHOP_EXPENDITURE_TYPE,$_where,$_select);
    if ($type == null) {
      $set_value = 0;
      $isactive = '';
    }
    else{
      if ($type->i_status == 1) {
       ?>
       <div class="tab-pane " id="section_<?=$type->s_field;?>">
        <div class="col-md-12">
          <div class="box-head" style="padding: 15px 0;">
            <button type="button" class="btn btn-md btn-success btn-equal " onclick="open_commision('<?=$shop->id;?>')"> <i class="fa fa-plus " ></i>
            </button>
            <header><h4 class="text-light">ประเภทรายจ่าย </h4></header>
          </div>
          <div class="box-body no-padding">
            <div  class="box_region_show"></div>
          </div>
        </div>
      </div>
    <?php }}}?>

  </div>
</div>
</div>
</div>
</div>

</div>
</form>
<script>
  setTimeout(function(){
   cal_map('<?=$shop->id;?>')
   _box_region_show($('#manage_com').val(),'_company')
   _box_contact('<?=$shop->id;?>')
   // _box_document('<?=$shop->id;?>')
 }, 1000);


</script>










































