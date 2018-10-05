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

<!-- <div class="section-header"> -->
  <!-- <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i><small>ร้านค้าทั้งหมด</small></h3> -->
  <!-- </div> -->
  <div class="section-body ">
    <input type="hidden" name="" id="manage_com" value="<?=$_GET[id];?>">
    <div class="row" id="body_page_call"><div class="col-md-6" >
      <div class="col-lg-12">
        <?php
        echo $_GET[state].'*************';




        $_where = array();
        $_where['main'] = $_GET[sub];
        // $_where['main'] = 1;
        $_select = array('*');
        $_order = array();
        $_order['topic_en'] = 'asc';
        $arr[sub] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);
// echo json_encode($arr[sub]);
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
        // $_where['main'] = 1;
        $_select = array('*');
        $_order = array();
        $_order['name_th'] = 'asc';
        $arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,$_where,$_select,$_order);
    // print_r(json_encode($arr[amphur]))
        if ($_GET[state] == 'add') {
    $shop_page = 'เพิ่มร้านค่า';

    echo $_GET[sub].'-----'.$arr[sub][0]->main;
    $chk_disabled = '';
    
    
  }
  else {
    $shop_page = 'แก้ไขร้านค่า';
    $chk_disabled = 'disabled';
  }
        ?>
        <div class="box box-outlined">
          <div class="box-head">
            <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ข้อมูลสถานที่ <strong></strong></h4></header>
          </div>
          <div class="box-body no-padding">
            <form class="form-horizontal form-banded form-bordered"  id="form_detail_shop"   >
              <div class="form-group form-group-md">
                <div class="col-md-2">
                  <label class="control-label">หมวดหมู่</label>
                </div>

                <div class="col-md-10">
                  <select id="select_category" class="form-control" name="main" <?=$chk_disabled;?> onchange="select_category(this)">
                    <?php
                // print_r(json_encode($arr[main]));
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

                <div class="col-md-10">
                  <select id="select_type" class="form-control"  <?=$chk_disabled;?>>
                   <?php
                // print_r(json_encode($arr[main]));
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
                <!-- <input name="sub" type="hidden" id="sub"  value="<?=$_GET[sub];?>"> -->
                <!-- <input name="main" type="hidden" id="main" value="<?=$arr[sub][0]->main;?>"> -->
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
            <select class="form-control" name="region" id="region" >
              <!-- <option value="">- เลือกภูมิภาค -</option> -->
              <?php
                // print_r(json_encode($arr[main]));
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
            <select class="form-control" name="province" id="province" >
              <!-- <option value="">- เลือกจังหวัด -</option> -->
              <?php
                // print_r(json_encode($arr[main]));
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
              <!-- <option value="">- เลือกเขต/อำเภอ -</option> -->
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

   <!--  <div class="col-md-6">
      <input class="form-control" name="lat" type="text" id="lat" value="<?=$shop->lat;?>">
      <p class="help-block">ละติดจูด</p>
    </div>
    <div class="col-md-6">
      <input class="form-control" name="lng" type="text" id="lng" value="<?=$shop->lng;?>">
      <p class="help-block">ลองติจูด</p>
    </div> -->
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
    <button type="button" class="btn btn-primary btn-md" id="submit_data_1"> <span id="txt_btn_save5" onclick="form_detail_shop('<?=$_GET[id];?>','shop')"> บันทึกข้อมูล </span></button>
  </div>
</div>


</form>
</div><!--end .box-body -->
</div><!--end .box -->
</div>
</div>






<div class="col-md-6">



  <div class="col-lg-12">
    <div class="box box-outlined">
      <div class="box-head">
        <ul class="nav nav-tabs" data-toggle="tabs">
          <li class="active"><a href="#t_share_app"> T-share - App</a></li>
          <li class=""><a href="#shop_t_share"> T-share - ร้านค้า</a></li>

        </ul>
      </div>
      <div class="box-body tab-content">
        <div class="tab-pane active" id="t_share_app">

          <div class="box-head">

            <div class="col-md-4">
              <h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ประเภทรายจ่าย </h4>
            </div>
            <div class="col-md-4">
              <button type="button" class="btn btn-success btn-md" onclick="open_commision('<?=$shop->id;?>')"> <span id="txt_btn_save5"> แก้ไขประเภทรายจ่าย </span></button>
            </div>
            
          </div>
          <div class="box-body no-padding">
            <form class="form-horizontal form-banded form-bordered">

            <div class="col-md-12"> 
              <div  id="box_region_show"></div>
            </div>
            </form>


          </div>
        </div>
        <div class="tab-pane" id="shop_t_share">            <p>TEST.</p>
        </div>

      </div>
      




      <div class="box-head">
        <header><h4 class="text-light"> ผู้ติดต่อ <strong></strong></h4></header>
      </div>
      <?php 
      $_where = array();
      $_where['product_id'] = $_GET[id];
      // $_where['type'] = 'zello';
      $_where['admintype'] = 2;
      $_select = array('*');
      $_order = array();
      $_order['id'] = 'asc';  
      // $this->db->where('product_id<>',$_GET[id]);
      // $this->db->where('admintype<>',2);
      $this->db->where('type<>','zello');
      $arr[SHOPPING_CONTACT] = $this->Main_model->fetch_data('','',TBL_SHOPPING_CONTACT,$_where,$_select,$_order);
      // print_r(json_encode($arr[SHOPPING_CONTACT]));
      ?>
      <!-- <form class="form-horizontal form-banded form-bordered"  > -->
        <div class="form-group form-group-md">
          <div class="col-md-12">
            <div class="table-responsive no-margin">
              <table class="table table-striped table-hover">
                <thead bgcolor="#999999" style="color: #ffffff">
                  <tr>
                    <th>#</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    <th>ชื่อ</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>ตำแหน่ง</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($arr[SHOPPING_CONTACT] as $key => $value){ 
                    $_where = array();
                    $_where['id'] = $value->usertype;
                    $_select = array('*');
                    $arr[CONTACT_TYPE] = $this->Main_model->rowdata(TBL_SHOPPING_CONTACT_TYPE,$_where,$_select);
                    ?>

                    <tr>
                      <td><?=$key+1;?></td>
                      <td height="30" >
                        <button type="button" onclick="//edit_plan_com_price('10')" class="btn btn-xs btn-info btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="แก้ไข้"><i class="fa fa-pencil"></i></button>
                      </td>
                      <td >
                        <button type="button" class="btn btn-xs btn-danger btn-equal" data-toggle="modal" data-target="#deleteModal" data-original-title="ลบ" onclick="//firstDelete('ประเภทค่าตอบแทน','10','shop_country_com_list')"><i class="fa fa-trash-o"></i></button>
                      </td>
                      <td >  
                       <?=$value->name;?> </td>
                       <td >

                        <?=$value->phone;?> 
                      </td>
                      <td > <?=$arr[CONTACT_TYPE]->usertype;?></td>
                    </tr>
                  <?php   } ?>
                </tbody>
              </table>
            </div>
          </div>


        </div>
        <div class="box-head">
          <header><h4 class="text-light"> เวลาทำการ <strong></strong></h4></header>
        </div>
         <form class="form-horizontal form-banded form-bordered" action="" name="myform_main"  id="myform_main" method="post">
          <div class="box-body" style="padding: 10px">
        <div class="form-group form-group-md">


          <div class="col-md-12">
            <div id="box_plan_time">
             
              <?php include 'box_plan_time.php';?>
           
            </div>
            
            </div>
          </div>

          <div class="form-group form-group-md">
           

            <div class="col-md-12">
              <button type="button" class="btn btn-primary btn-md pull-right" id="submit_data_2" onclick="submit_data_plan_time('<?=$_GET[id];?>','time')"> <span > บันทึกข้อมูล </span></button>
            </div>
          </div>
           </div>
        </form>




        
      </div><!--end .box-body -->
    </div><!--end .box -->
  </div>
  <script>
    setTimeout(function(){
     cal_map('<?=$shop->id;?>')
     box_region_show($('#manage_com').val())
   }, 1000);



 </script>










































