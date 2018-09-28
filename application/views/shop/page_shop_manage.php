
<ol class="breadcrumb">
        <li class="head_title">จัดการร้านค้า</li>
        <li class="head_title_sub">จัดการร้านช้อปปิ้ง</li>
        <li class="head_title_sub_2" ><a class="head_title_sub_2">ช้อปปิ้งทั้งหมด</a></li>
        <li class="head_title_sub_3" ><a class="head_title_sub_3">ร้านค่าทั้งหมด</a></li>
        <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>
        </ol>

        <!-- <div class="section-header"> -->
          <!-- <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i><small>ร้านค้าทั้งหมด</small></h3> -->
        <!-- </div> -->
        <div class="section-body ">
          <div class="row" id="body_page_call"><div class="col-md-6" >
  <div class="col-lg-12">
    <?php
    $_where = array();
    $_where['id'] = $shop->main;
    $_select = array('*');  $_order = array();
    $_order['topic_en'] = 'asc';  

    $arr[main] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_MAIN,'',$_select,$_order);




    $_where = array();
    $_where['main'] = $shop->main;
        // $_where['main'] = 1;
    $_select = array('*');
    $_order = array();
    $_order['topic_en'] = 'asc';
    $arr[sub] = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB,$_where,$_select,$_order);



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
    ?>
    <div class="box box-outlined">
      <div class="box-head">
        <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ข้อมูลสถานที่ <strong></strong></h4></header>
      </div>
      <div class="box-body no-padding">
        <form class="form-horizontal form-banded form-bordered"  id="form-action"   >
          <div class="form-group form-group-md">
            <div class="col-md-2">
              <label class="control-label">หมวดหมู่</label>
            </div>

            <div class="col-md-10">
              <select id="select_category" class="form-control" >
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
              <select id="select_type" class="form-control" >
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
            <input name="sub" type="hidden" id="sub"  value="1">
            <input name="main" type="hidden" id="main" value="1">
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
    <script>
      var url = base_url+ "shop/get_shop_map";
      var param = {
        id: '<?=$shop->id;?>'
      }

      $.ajax({
        url: url,
        data: param,
        type: 'post',
        error: function() {
          console.log('Error Profile');
        },
        success: function(ele) {
          console.log('Success Profile');
          $('#map_frame').html(ele);

        }
      });
    </script>
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
    <button type="button" class="btn btn-primary btn-md" id="submit_data_1"> <span id="txt_btn_save5"> บันทึกข้อมูล </span></button>
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
        <header>
          <div class="col-md-6">
            <h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ประเภทรายจ่าย <strong></strong></h4>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-success btn-md" onclick="commision('<?=$shop->id;?>')"> <span id="txt_btn_save5"> แก้ไขประเภทรายจ่าย </span></button>
          </div>
        </header>
      </div>
      <div class="box-body no-padding">
        <form class="form-horizontal form-banded form-bordered"  >
          <div class="form-group form-group-md">
            <div class="col-md-12">




             <div style="height: 200px"></div>

           </div>
         </div>
         <div class="box-head">
          <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ผู้ติดต่อ <strong></strong></h4></header>
        </div>
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
                  <tr>
                    <td>1</td>
                    <td height="30" align="center">
                     <a id="btn_menu_edit_contact_23" data-toggle="modal" data-target="#myModal_text_sub">
                       <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"></i>

                     </a> 

                   </td>
                   <td align="center">
                     <a id="btn_menu_del_contact_23"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#FF0000"></i></a>


                   </td>
                   <td align="center">  
                   เบิร์ด </td>
                   <td align="center">

                    0892942126 
                  </td>

                  <td align="center">ผู้จัดการ  </td>
                </tr>




              </tbody>
            </table>
          </div>
        </div>


      </div>
      <div class="box-head">
        <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ผู้ติดต่อ <strong></strong></h4></header>
      </div>
      <div class="form-group form-group-md">


        <div class="col-md-12">
          <table width="100%">
            <tr>

              <td colspan="2"> 
               <table width="100%">
                 <tbody><tr>
                  <td width="14%"><label style="margin-bottom: -3px;" for="open_time_all">24 ชม. ทุกวัน</label> </td>
                  <td width="5%"><input type="checkbox" name="open_time_all" id="open_time_all" style="width: 20px;"></td>

                  <td width="14%"><label style="margin-bottom: -3px;" for="open_all">เปิดทุกวัน</label> </td>
                  <td><input type="checkbox" checked="checked" name="open_all" id="open_all" style="width: 20px;"></td>
                </tr>
              </tbody></table>          

              <table width="100%" style="margin-top: 25px;">
                <tbody><tr>
                  <td width="14%"><label for="open_alway_Sun" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
                  <td><input type="checkbox" name="open_alway_Sun" id="open_alway_Sun" value="1" onclick="eachOpenAlway('Sun');" style="width: 20px;"></td>
                  <td width="16%" align="center"><label for="Sun" style=" margin-bottom: -3px;">Sun</label></td>
                  <td width="5%">
                    <input name="Sun" onclick="closeDay('Sun');" id="Sun" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
                    <td width="5%" align="center"><strong>A</strong></td>
                    <td>เปิด</td>
                    <td>
                     <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Sun" id="hour_open_Sun">
                       <option value="01">01</option>


                     </select> .
                     <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Sun" id="time_open_Sun">
                       <option value="00" selected="">00</option>
                       <option value="05">05</option>

                     </select> น.
                   </td>
                   <td>ปิด</td>
                   <td>
                     <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Sun" id="hour_close_Sun">
                      <option value="01">01</option>



                    </select> .
                    <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Sun" id="time_close_Sun">

                      <option value="00" selected="">00</option>


                    </select> น.
                  </td>
                  <td><label for="time_other_Sun" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


                  <td>

                    <input type="checkbox" value="1" id="time_other_Sun" name="time_other_Sun" onclick="timeOther('Sun');" style="width: 20px;">
                  </td>
                </tr>
                <tr id="other_time_Sun" style="display: none;">
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
                 <td bgcolor="#FDFAD5">เปิด</td>
                 <td bgcolor="#FDFAD5">

                   <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Sun_2" id="hour_open_Sun_2">
                     <option value="01">01</option>


                   </select> .
                   <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Sun_2" id="time_open_Sun_2">
                     <option value="00">00</option>


                   </select> น.
                 </td>
                 <td bgcolor="#FDFAD5">ปิด</td>
                 <td bgcolor="#FDFAD5">
                   <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Sun_2" id="hour_close_Sun_2">

                    <option value="01">01</option>



                  </select> .
                  <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Sun_2" id="time_close_Sun_2">

                    <option value="00">00</option>



                  </select> น.
                </td>
              </tr>
            </tbody></table> 


            <table width="100%" style="margin-top: 25px;">
              <tbody><tr>
                <td width="14%"><label for="open_alway_Mon" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
                <td><input type="checkbox" name="open_alway_Mon" id="open_alway_Mon" value="1" onclick="eachOpenAlway('Mon');" style="width: 20px;"></td>
                <td width="16%" align="center"><label for="Mon" style=" margin-bottom: -3px;">Mon</label></td>
                <td width="5%">
                  <input name="Mon" onclick="closeDay('Mon');" id="Mon" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
                  <td width="5%" align="center"><strong>A</strong></td>
                  <td>เปิด</td>
                  <td>
                   <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Mon" id="hour_open_Mon">
                     <option value="01">01</option>


                   </select> .
                   <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Mon" id="time_open_Mon">
                     <option value="00" selected="">00</option>
                     <option value="05">05</option>


                   </select> น.
                 </td>
                 <td>ปิด</td>
                 <td>
                   <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Mon" id="hour_close_Mon">

                    <option value="01">01</option>

                  </select> .
                  <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Mon" id="time_close_Mon">

                    <option value="00" selected="">00</option>


                  </select> น.
                </td>
                <td><label for="time_other_Mon" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


                <td>

                  <input type="checkbox" value="1" id="time_other_Mon" name="time_other_Mon" onclick="timeOther('Mon');" style="width: 20px;">
                </td>
              </tr>
              <tr id="other_time_Mon" style="display: none;">
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
               <td bgcolor="#FDFAD5">เปิด</td>
               <td bgcolor="#FDFAD5">

                 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Mon_2" id="hour_open_Mon_2">
                   <option value="01">01</option>


                 </select> .
                 <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Mon_2" id="time_open_Mon_2">
                   <option value="00">00</option>


                 </select> น.
               </td>
               <td bgcolor="#FDFAD5">ปิด</td>
               <td bgcolor="#FDFAD5">
                 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Mon_2" id="hour_close_Mon_2">

                  <option value="01">01</option>


                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Mon_2" id="time_close_Mon_2">

                  <option value="00">00</option>



                </select> น.
              </td>
            </tr>
          </tbody></table> 


          <table width="100%" style="margin-top: 25px;">
            <tbody><tr>
              <td width="14%"><label for="open_alway_Tue" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
              <td><input type="checkbox" name="open_alway_Tue" id="open_alway_Tue" value="1" onclick="eachOpenAlway('Tue');" style="width: 20px;"></td>
              <td width="16%" align="center"><label for="Tue" style=" margin-bottom: -3px;">Tue</label></td>
              <td width="5%">
                <input name="Tue" onclick="closeDay('Tue');" id="Tue" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
                <td width="5%" align="center"><strong>A</strong></td>
                <td>เปิด</td>
                <td>
                 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Tue" id="hour_open_Tue">
                   <option value="01">01</option>


                 </select> .
                 <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Tue" id="time_open_Tue">
                   <option value="00" selected="">00</option>
                   <option value="05">05</option>


                 </select> น.
               </td>
               <td>ปิด</td>
               <td>
                 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Tue" id="hour_close_Tue">

                  <option value="01">01</option>



                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Tue" id="time_close_Tue">

                  <option value="00" selected="">00</option>



                </select> น.
              </td>
              <td><label for="time_other_Tue" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


              <td>

                <input type="checkbox" value="1" id="time_other_Tue" name="time_other_Tue" onclick="timeOther('Tue');" style="width: 20px;">
              </td>
            </tr>
            <tr id="other_time_Tue" style="display: none;">
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
             <td bgcolor="#FDFAD5">เปิด</td>
             <td bgcolor="#FDFAD5">

               <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Tue_2" id="hour_open_Tue_2">
                 <option value="01">01</option>


               </select> .
               <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Tue_2" id="time_open_Tue_2">
                 <option value="00">00</option>


               </select> น.
             </td>
             <td bgcolor="#FDFAD5">ปิด</td>
             <td bgcolor="#FDFAD5">
               <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Tue_2" id="hour_close_Tue_2">

                <option value="01">01</option>



              </select> .
              <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Tue_2" id="time_close_Tue_2">

                <option value="00">00</option>

              </select> น.
            </td>
          </tr>
        </tbody></table> 


        <table width="100%" style="margin-top: 25px;">
          <tbody><tr>
            <td width="14%"><label for="open_alway_Wed" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
            <td><input type="checkbox" name="open_alway_Wed" id="open_alway_Wed" value="1" onclick="eachOpenAlway('Wed');" style="width: 20px;"></td>
            <td width="16%" align="center"><label for="Wed" style=" margin-bottom: -3px;">Wed</label></td>
            <td width="5%">
              <input name="Wed" onclick="closeDay('Wed');" id="Wed" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
              <td width="5%" align="center"><strong>A</strong></td>
              <td>เปิด</td>
              <td>
               <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Wed" id="hour_open_Wed">
                 <option value="01">01</option>


               </select> .
               <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Wed" id="time_open_Wed">
                 <option value="00" selected="">00</option>


               </select> น.
             </td>
             <td>ปิด</td>
             <td>
               <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Wed" id="hour_close_Wed">

                <option value="01">01</option>


              </select> .
              <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Wed" id="time_close_Wed">

                <option value="00" selected="">00</option>


              </select> น.
            </td>
            <td><label for="time_other_Wed" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


            <td>

              <input type="checkbox" value="1" id="time_other_Wed" name="time_other_Wed" onclick="timeOther('Wed');" style="width: 20px;">
            </td>
          </tr>
          <tr id="other_time_Wed" style="display: none;">
           <td></td>
           <td></td>
           <td></td>
           <td></td>
           <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
           <td bgcolor="#FDFAD5">เปิด</td>
           <td bgcolor="#FDFAD5">

             <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Wed_2" id="hour_open_Wed_2">
               <option value="01">01</option>


             </select> .
             <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Wed_2" id="time_open_Wed_2">
               <option value="00">00</option>


             </select> น.
           </td>
           <td bgcolor="#FDFAD5">ปิด</td>
           <td bgcolor="#FDFAD5">
             <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Wed_2" id="hour_close_Wed_2">

              <option value="01">01</option>


            </select> .
            <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Wed_2" id="time_close_Wed_2">

              <option value="00">00</option>


            </select> น.
          </td>
        </tr>
      </tbody></table> 


      <table width="100%" style="margin-top: 25px;">
        <tbody><tr>
          <td width="14%"><label for="open_alway_Thu" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
          <td><input type="checkbox" name="open_alway_Thu" id="open_alway_Thu" value="1" onclick="eachOpenAlway('Thu');" style="width: 20px;"></td>
          <td width="16%" align="center"><label for="Thu" style=" margin-bottom: -3px;">Thu</label></td>
          <td width="5%">
            <input name="Thu" onclick="closeDay('Thu');" id="Thu" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
            <td width="5%" align="center"><strong>A</strong></td>
            <td>เปิด</td>
            <td>
             <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Thu" id="hour_open_Thu">
               <option value="01">01</option>


             </select> .
             <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Thu" id="time_open_Thu">
               <option value="00" selected="">00</option>


             </select> น.
           </td>
           <td>ปิด</td>
           <td>
             <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Thu" id="hour_close_Thu">

              <option value="01">01</option>


            </select> .
            <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Thu" id="time_close_Thu">

              <option value="00" selected="">00</option>



            </select> น.
          </td>
          <td><label for="time_other_Thu" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


          <td>

            <input type="checkbox" value="1" id="time_other_Thu" name="time_other_Thu" onclick="timeOther('Thu');" style="width: 20px;">
          </td>
        </tr>
        <tr id="other_time_Thu" style="display: none;">
         <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
         <td bgcolor="#FDFAD5">เปิด</td>
         <td bgcolor="#FDFAD5">

           <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Thu_2" id="hour_open_Thu_2">
             <option value="01">01</option>


           </select> .
           <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Thu_2" id="time_open_Thu_2">
             <option value="00">00</option>


           </select> น.
         </td>
         <td bgcolor="#FDFAD5">ปิด</td>
         <td bgcolor="#FDFAD5">
           <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Thu_2" id="hour_close_Thu_2">

            <option value="01">01</option>



          </select> .
          <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Thu_2" id="time_close_Thu_2">

            <option value="00">00</option>


          </select> น.
        </td>
      </tr>
    </tbody></table> 


    <table width="100%" style="margin-top: 25px;">
      <tbody><tr>
        <td width="14%"><label for="open_alway_Fri" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
        <td><input type="checkbox" name="open_alway_Fri" id="open_alway_Fri" value="1" onclick="eachOpenAlway('Fri');" style="width: 20px;"></td>
        <td width="16%" align="center"><label for="Fri" style=" margin-bottom: -3px;">Fri</label></td>
        <td width="5%">
          <input name="Fri" onclick="closeDay('Fri');" id="Fri" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
          <td width="5%" align="center"><strong>A</strong></td>
          <td>เปิด</td>
          <td>
           <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Fri" id="hour_open_Fri">
             <option value="01">01</option>


           </select> .
           <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Fri" id="time_open_Fri">
             <option value="00" selected="">00</option>


           </select> น.
         </td>
         <td>ปิด</td>
         <td>
           <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Fri" id="hour_close_Fri">

            <option value="01">01</option>


          </select> .
          <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Fri" id="time_close_Fri">

            <option value="00" selected="">00</option>



          </select> น.
        </td>
        <td><label for="time_other_Fri" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


        <td>

          <input type="checkbox" value="1" id="time_other_Fri" name="time_other_Fri" onclick="timeOther('Fri');" style="width: 20px;">
        </td>
      </tr>
      <tr id="other_time_Fri" style="display: none;">
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
       <td bgcolor="#FDFAD5">เปิด</td>
       <td bgcolor="#FDFAD5">

         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Fri_2" id="hour_open_Fri_2">
           <option value="01">01</option>


         </select> .
         <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Fri_2" id="time_open_Fri_2">
           <option value="00">00</option>


         </select> น.
       </td>
       <td bgcolor="#FDFAD5">ปิด</td>
       <td bgcolor="#FDFAD5">
         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Fri_2" id="hour_close_Fri_2">

          <option value="01">01</option>



        </select> .
        <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Fri_2" id="time_close_Fri_2">

          <option value="00">00</option>



        </select> น.
      </td>
    </tr>
  </tbody></table> 


  <table width="100%" style="margin-top: 25px;">
    <tbody><tr>
      <td width="14%"><label for="open_alway_Sat" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
      <td><input type="checkbox" name="open_alway_Sat" id="open_alway_Sat" value="1" onclick="eachOpenAlway('Sat');" style="width: 20px;"></td>
      <td width="16%" align="center"><label for="Sat" style=" margin-bottom: -3px;">Sat</label></td>
      <td width="5%">
        <input name="Sat" onclick="closeDay('Sat');" id="Sat" type="checkbox" class="checkbox-plan" checked="checked" value="1" style="width: 20px;"></td>
        <td width="5%" align="center"><strong>A</strong></td>
        <td>เปิด</td>
        <td>
         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Sat" id="hour_open_Sat">
           <option value="01">01</option>


         </select> .
         <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Sat" id="time_open_Sat">
           <option value="00" selected="">00</option>


         </select> น.
       </td>
       <td>ปิด</td>
       <td>
         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Sat" id="hour_close_Sat">

          <option value="01">01</option>


        </select> .
        <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Sat" id="time_close_Sat">

          <option value="00" selected="">00</option>



        </select> น.
      </td>
      <td><label for="time_other_Sat" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>


      <td>

        <input type="checkbox" value="1" id="time_other_Sat" name="time_other_Sat" onclick="timeOther('Sat');" style="width: 20px;">
      </td>
    </tr>
    <tr id="other_time_Sat" style="display: none;">
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
     <td bgcolor="#FDFAD5">เปิด</td>
     <td bgcolor="#FDFAD5">

       <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_Sat_2" id="hour_open_Sat_2">
         <option value="01">01</option>


       </select> .
       <select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_Sat_2" id="time_open_Sat_2">
         <option value="00">00</option>


       </select> น.
     </td>
     <td bgcolor="#FDFAD5">ปิด</td>
     <td bgcolor="#FDFAD5">
       <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_Sat_2" id="hour_close_Sat_2">

        <option value="01">01</option>



      </select> .
      <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_Sat_2" id="time_close_Sat_2">

        <option value="00">00</option>



      </select> น.
    </td>
  </tr>
</tbody></table> 


</td>
</tr>
</table>
</div>
</div>

<div class="form-group form-group-md">
  <div class="col-md-10">

  </div>

  <div class="col-md-2">
    <button type="button" class="btn btn-primary btn-md" id="submit_data_2"> <span id="txt_btn_save5"> บันทึกข้อมูล </span></button>
  </div>
</div>




</form>
</div><!--end .box-body -->
</div><!--end .box -->
</div>










































