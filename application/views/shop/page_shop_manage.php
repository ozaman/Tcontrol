<form class="form-horizontal form-banded form-bordered"  id="form_shop_all"  enctype="multipart/form-data"  >
  <?php
  if ($_GET[state] == 'add') {
    $shop_page = 'เพิ่มร้านค่า';
    $func_saveForm = 'add';
  }
  else {
    $shop_page = 'แก้ไขร้านค่า';
    $func_saveForm = 'shop';
  }
  ?>
  <?php
  session_start();
  if ($_SESSION[level] >= 8) {
    $categories_sub = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $_GET[sub]));
    $category = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,array('id' => $_GET[main]));
    ?>
    <ol class="breadcrumb">
      <input type="hidden" name="" id="i_shop_topice" value="<?=$shop->topic_th;?>">
      <li class="head_title"><a href="<?=base_url();?>shop/data_shop_categorie" class="head_title">หมวดหมู่ทั้งหมด</a></li>
      <li class="head_title"><a href="<?=base_url();?>shop/categorie_sub?id=<?=$_GET[main];?>" class="head_title">หมวดหมู่<?=$category->topic_th;?></a></li>
      <li class="head_title_sub"><a  href="<?=base_url();?>shop/shop_ordertype?id=<?=$_GET[sub];?>&sub=<?=$_GET[main];?>">ประเภท<?=$categories_sub->topic_th;?></a></li>
      <li class="head_title_sub_4" style="display: nones;"><?=$shop->topic_th;?></li>
    </ol>
    <?php
  }
  else {
    ?>
    <ol class="breadcrumb">
      <li class="head_title_sub_4" style="display: nones;"><?=$shop->topic_th;?></li>
    </ol>
  <?php }?>
  <div class="section-body ">
    <input type="hidden" name="" id="manage_com" value="<?=$_GET[id];?>">
    <input type="hidden" name="" id="sub" value="<?=$_GET[sub];?>">
    <input type="hidden" name="" id="main" value="<?=$_GET[main];?>">
    <!-- 1 T-SHARE - SHOP
         2 T-SHARE - COMPANY
    -->
    <?php
    $_where = array();
    $_where['main'] = $_GET[main];
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $arr[sub] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
    $_where = array();
    //$_where['id'] = $arr[sub]->main;
    $_select = array('*');
    $_order = array();
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
              <li class="" onclick="_box_bank(<?=$_GET[id];?>)"><a href="#section_bank"> ข้อมูลธนาคาร</a></li>
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
                        foreach ($arr[main] as $key => $main) {
                          if ($_GET[main] == $main->id) {
                            $selected_sub = "selected";
                          }
                          else {
                            $selected_sub = "";
                          }
                          ?>
                          <option value="<?=$main->id;?>"  <?=$selected_sub;?> ><?=$main->topic_th;?></option>
                        <?php }?>
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
                        foreach ($arr[sub] as $key => $sub) {
                          if ($_GET[sub] == $sub->id) {
                            $selected_sub = "selected";
                          }
                          else {
                            $selected_sub = "";
                          }
                          ?>
                          <option value="<?=$sub->id;?>"  <?=$selected_sub;?> ><?=$sub->topic_th;?></option>
                        <?php }?>

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
                      <select class="form-control" name="region" id="region" onchange="_region(this.value)">
                        <option value="">เลือกภูมิภาค </option>
                        <?php
                        foreach ($arr[region] as $key => $region) {
                          if ($shop->region == $region->id) {
                            $selected_sub = "selected";
                          }
                          else {
                            $selected_sub = "";
                          }
                          ?>
                          <option value="<?=$region->id;?>"  <?=$selected_sub;?> ><?=$region->topic_th;?></option>
                        <?php }?>
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
                        foreach ($arr[province] as $key => $province) {
                          if ($shop->province == $province->id) {
                            $selected_sub = "selected";
                          }
                          else {
                            $selected_sub = "";
                          }
                          ?>
                          <option value="<?=$province->id;?>"  <?=$selected_sub;?> ><?=$province->name_th;?></option>
                        <?php }?>
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
                        foreach ($arr[amphur] as $key => $amphur) {

                          if ($shop->amphur == $amphur->id) {
                            $selected_sub = "selected";
                          }
                          else {
                            $selected_sub = "";
                          }
                          ?>
                          <option value="<?=$amphur->id;?>"  <?=$selected_sub;?> ><?=$amphur->name_th;?></option>
                        <?php }?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group form-group-md">
                    <div class="col-md-2">
                      <label class="control-label">ที่อยู่</label>
                    </div>
                    <div class="col-md-10">

                      <textarea name="address" rows="3" class="form-control" id="address" placeholder="ที่อยู่"><?=$shop->address;?></textarea>
                    </div>
                  </div>
                  <div class="form-group form-group-md">
                    <div class="col-md-2">
                      <label class="control-label">เว็บไซต์</label>
                    </div>
                    <div class="col-md-10">
                      <input type="text" class="form-control" value="<?=$shop->s_website;?>" name="s_website">
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

                      <?php
                      $gen_map1 = explode('/@',$shop->map);
                      $gen_map = explode(',',$gen_map1[1]);
                      ?>
                      <input type="hidden" name="lat_db" value="<?=$gen_map[0];?>" id="lat">
                      <input type="hidden" name="lng_db" value="<?=$gen_map[1];?>" id="lng">
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
                      <button type="button" class="btn btn-primary btn-md <?=$btn_none;?> " id="submit_data_1" onclick="form_detail_shop('<?=$_GET[id];?>', '<?=$func_saveForm;?>')"> <span id="txt_btn_save5" > บันทึกข้อมูล </span></button>
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
                    else {
                      ?>
                      <button type="button" class="btn btn-primary btn-md pull-right" id="submit_data_2" onclick="submit_data_plan_time('<?=$_GET[id];?>', 'time')"> <span > บันทึกข้อมูล </span></button>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div><!--  END TIME OPEN -->
            </div>
            <div class="tab-pane" id="section_bank">
              <div class="col-md-12">
                <div id="box_bank">

                </div>
              </div>
            </div>
          </div>
        </div><!--end .box -->
      </div>
      <?php
      $where = array();
      $this->db->select('s_topic');
      $where[id] = $admin->i_partner;
      $partner_main = $this->db->get_where(TBL_PARTNER,$where);
      $partner_main = $partner_main->row();
      ?>

      <div class="col-md-6">
        <div class="col-lg-12">
          <div class="box box-outlined">
            <div class="box-head">
              <div class="col-md-12">
                <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"> </i><strong> ข้อมูลจัการค่าตอบแทน </strong></h4></header>
              </div>
              <ul class="nav nav-tabs" data-toggle="tabs" >
                <li class="<?=$active_shop;?> active" onclick="_box_region_show('<?=$_GET[id];?>', '_company', 1)">
                  <a href="#section_shop"> <?=$shop->topic_th;?> >> <?=$partner_main->s_topic;?></a>
                </li> 
                <?php
                $where = array();
                $this->db->select('*');
                $where[i_shop] = $shop->id;
                $where[i_status] = 1;
                $partner_ctr = $this->db->get_where(TBL_PARTNER_CONTROL,$where);
//                echo "<pre>";
//                print_r($partner_ctr->result());
//                echo "</pre>";
                foreach ($partner_ctr->result() as $val) {
                  if ($val->i_partner_group == 1) {
                    continue;
                  }
                  $where = array();
                  $this->db->select('*');
                  $where[id] = $val->i_partner_group;
                  $partner_gp = $this->db->get_where(TBL_PARTNER_GROUP,$where);
                  $partner_gp = $partner_gp->row();

                  $where = array();
                  $this->db->select('*');
                  $where[id] = $partner_gp->i_to;
                  $partner = $this->db->get_where(TBL_PARTNER,$where);
                  $partner = $partner->row();
                  ?>
                  <li class="" onclick="_box_region_show('<?=$_GET[id];?>', '<?=$type->s_db;?>', '<?=$partner_gp->id;?>')">
                    <a href="#section_<?=$type->s_field;?>"> <?=$partner_main->s_topic;?> >> <span style="text-transform:capitalize;"><?=$partner->s_topic;?></span></a>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </div>
            <div class="box-body-s tab-content">
              <!-- T_SHARE - SHOPPING ============================================================================================== -->
              <div class="tab-pane active" id="section_shop">
                <?php
                if ($type->i_company == 1) {
                  $in_shop = 'active';
                  $chk_in_shop = 'checked="checked"';
                }
                else {
                  $in_shop = '';
                  $chk_in_shop = '';
                }

                if ($type->i_taxi == 1) {
                  $in_taxi = 'active';
                  $chk_in_taxi = 'checked="checked"';
                }
                else {
                  $in_taxi = '';
                  $chk_in_taxi = '';
                }

                if ($type->i_gui == 1) {
                  $in_guide = 'active';
                  $chk_in_guide = 'checked="checked"';
                }
                else {
                  $in_guide = '';
                  $chk_in_guide = '';
                }

                if ($type->i_tourist == 1) {
                  $in_tourist = 'active';
                  $chk_in_tourist = 'checked="checked"';
                }
                else {
                  $in_tourist = '';
                  $chk_in_tourist = '';
                }
                ?>

                <!-- ========================================================================================= -->
                <div class="box-body no-padding">


                  <div class="box-head">
                    <header><h4 class="text-light"> ประเภทเปิดใช้งาน <strong></strong></h4></header>
                  </div>
                  <div class="col-md-12 ">
                    <div style="background: #f2f2f2;padding: 10px;">
                      <div  data-toggle="buttons">
                        <?php
                        $where = array();
                        $this->db->select('*');
                        $where[i_from] = $admin->i_partner;
                        $partner_g = $this->db->get_where(TBL_PARTNER_GROUP,$where);
                        foreach ($partner_g->result() as $val) {
//                          echo $val->i_to;
                          $where = array();
                          $this->db->select('s_topic,id');
                          $where[id] = $val->i_to;
                          $partner = $this->db->get_where(TBL_PARTNER,$where);
                          $partner = $partner->row();

                          $where = array();
                          $this->db->select('*');
                          $where[i_partner_group] = $val->id;
                          $where[i_shop] = $shop->id;
                          $partner_ctr = $this->db->get_where(TBL_PARTNER_CONTROL,$where);
                          $partner_ctr = $partner_ctr->row();
                          if ($partner_ctr == null) {
                            $set_value = 0;
                            $isactive = '';
                          }
                          else {
                            $set_value = $partner_ctr->i_status;
                            if ($set_value == 1) {
                              $set_value = 1;
                              $isactive = 'active';
                            }
                            else {
                              $set_value = 0;
                              $isactive = '';
                            }
                          }
                          ?>
                          <label class="btn btn-success btn-outline <?=$isactive;?>" id="l_<?=$partner->s_topic;?>">
                            <input  <?=$chk_in_taxi;?> type="checkbox" name="in_taxi" id="i_<?=$partner->s_topic;?>" value="<?=$set_value;?>" 
                                                       onchange="updatetype('<?=$_GET[id];?>', this.value, '<?=$partner->s_topic;?>', '<?=$partner_ctr->id;?>', '<?=$val->id;?>')" > 
                            <span style="text-transform:capitalize;"><?=$partner->s_topic;?></span>
                          </label>
                        <?php }?>
                      </div>
                    </div>

                  </div>
                </div>

                <!-- ========================================================================================= -->
                <?php
                $chk_withholding = ($shop->i_withholding == 1) ? 'checked' : '';
                $chk_withholding_active = ($shop->i_withholding == 1) ? 'active' : '';
                ?>
<!--                <div class="box-body no-padding">
                  <div class="box-head">
                    <header><h4 class="text-light"> หักภาษี ณ ที่จ่าย <strong></strong></h4></header>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-12" style="background: #f2f2f2;padding: 10px;">
                      <div class="col-md-4">
                        <div data-toggle="buttons"  onclick="func_withholding('<?=$shop->id;?>', 'id', 'i_withholding', 'shopping_product', '');">
                          <label class="btn checkbox-inline btn-checkbox-success-inverse <?=$chk_withholding_active;?> ">รวมหักภาษี ณ ที่จ่าย
                            <input type="checkbox" value="1" id="i_withholding" name="i_withholding" <?=$chk_withholding;?>> </label>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group ">
                          <div class="input-group"  id="div_i_withholding_rate" style="display:none<?=$chk_withholding_active;?>;">
                            <span class="input-group-addon" style="width: 64px">เปอร์เซนต์  </span>
                            <input type="number" class="form-control" value="<?=$shop->i_withholding_rate;?>" id="i_withholding_rate" onkeyup="func_withholding_rate(this.value, '<?=$shop->id;?>', 'id', 'i_withholding_rate', 'shopping_product', '')">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>-->
                <!-- ========================================================================================= -->
                <div class="box-body no-padding">
                  <div class="box-head" style="padding: 15px 10px;">
                    <button type="button" class="btn btn-md btn-success btn-equal open_mg" onclick="open_commision('<?=$shop->id;?>', 1)"> 
                      <i class="fa fa-plus " ></i>
                    </button>
                    <header style="cursor: pointer;" class="open_mg" onclick="open_commision('<?=$shop->id;?>', 1)"><h4 class="text-light"> จัดการค่าตอบแทน </h4></header>
                  </div>
                </div>
                
                <div class="col-md-12"> 
                  <div  class="box_region_show"></div>
                </div>
                
              </div>
              <!-- T_SHARE - NETWORK ============================================================================================== -->

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</form>
<?php
if ($shop->id > 0) {
  ?>
  <script>
    setTimeout(function () {
      cal_map('<?=$shop->id;?>');
      _box_region_show('<?=$_GET[id];?>', '_company', 1);
      _box_contact('<?=$shop->id;?>');
      // _box_document('<?=$shop->id;?>')
    }, 500);


  </script>
  <?php
}?>