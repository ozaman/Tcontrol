<form class="form-horizontal form-banded form-bordered"  id="form_station_all"   >

  <div class="section-body ">
   <?php
   // print_r(json_encode($station));
   $_select = array('*');
   $_order = array();
   $_order['topic_en'] = 'asc';
   $arr[region] = $this->Main_model->fetch_data('','',TBL_WEB_REGION,'',$_select,$_order);

   $_select = array('*');
   $_order = array();
   $_order['name_th'] = 'asc';
   $arr[province] = $this->Main_model->fetch_data('','',TBL_WEB_PROVINCE,'',$_select,$_order);
   $_where = array();
   // $_where['PROVINCE_ID'] = $shop->province;
   $_select = array('*');
   $_order = array();
   $_order['name_th'] = 'asc';
   $arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,'',$_select,$_order);
   $_where = array();
   $_where['i_status'] = 1;
   $_select = array('*');
   $_order = array();
   $_order['i_index'] = 'asc';
   $arr[COMPENSATION] = $this->Main_model->fetch_data('','',TBL_SHOP_COMPENSATION_TYPE,$_where,$_select,$_order);
   ?>
   <input type="hidden" name="" id="section_state" value="1">
   <input type="hidden" name="section_id" id="section_id" value="<?=$station->id;?>">
   <div class="row" id="body_page_call">
    <div class="col-md-12">
      <div class="box box-outlined" >
        <div class="box-head">

          <div class="col-md-12">
            <header>
              <h4 class="text-light"><i class="fa fa-pencil fa-fw"> </i><strong> ป้อนข้อมูลคิว </strong></h4>
            </header>
          </div>
        </div>
        <div class=" tab-content">
          <div class="tab-pane active" id="home_detail">
            <div class="box-body no-padding">
              <div class="col-md-12">

                <div class="form-group form-group-md">
                  <div class="col-md-2">
                    <label class="control-label">ชื่อ EN</label>
                  </div>
                  <div class="col-md-10">
                   <input class="form-control" name="topic_en" type="text" id="topic_en"  value="<?=$station->topic_en;?>">
                 </div>
               </div>
               <div class="form-group form-group-md">
                <div class="col-md-2">
                  <label class="control-label">ชื่อ TH</label>
                </div>
                <div class="col-md-10">
                 <input class="form-control" name="topic_th" type="text" id="topic_th"  value="<?=$station->topic_th;?>">
               </div>
             </div>
             <!-- <div class="form-group form-group-md">
              <div class="col-md-2">
                <label class="control-label">ชื่อ CN</label>
              </div>

              <div class="col-md-10">
                <input class="form-control" name="topic_cn" type="text" id="topic_cn"  value="">
              </div>
            </div> -->
            <div class="form-group form-group-md">
              <div class="col-md-2">
                <label class="control-label">ข้อมูลสังกัดรถ</label>
              </div>
              <?php
                    $_where = array();
                    $_where[id] = $station->type;
   $_select = array('*');
    $STATION_TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where, $_select);

              ?>

              <div class="col-md-10">
                <input class="form-control" name="company" type="text" id="company"  value="<?=$STATION_TYPE->topic_th;?>" disabled>
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
                    if($station->region == $region->id ){
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
                    if($station->province == $province->id ){
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

                    if($station->amphur == $amphur->id ){
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
               <textarea name="address" rows="3" class="form-control" id="address" placeholder="ที่อยู่">
                <?=$station->address;?>
               </textarea>
             </div>
           </div>
          <div class="form-group form-group-md">
            <div class="col-md-2">
              <label class="control-label">เบอร์โทรศัพท์</label>
            </div>
            <div class="col-md-10">
              <input class="form-control" name="phone" type="text" id="phone" value="<?=$station->phone_company;?>" >
            </div>
          </div>
          
          <div class="form-group form-group-md">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
             <?php
             if ($ddd == 'add') {
              $btn_none = 'hide';
            }
            else{
             $btn_none = 'show';
           }
           ?>
           <button type="button" class="btn btn-primary btn-md  " id="submit_data_1" onclick="save_form_edit_station('<?=$station->id;?>')"> <span id="txt_btn_save5" > บันทึกข้อมูล </span></button>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>
</form>