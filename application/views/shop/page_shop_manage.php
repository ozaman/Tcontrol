<div class="col-md-6" >
  <div class="col-lg-12">
    <div class="box box-outlined">
      <div class="box-head">
        <header><h4 class="text-light"><i class="fa fa-pencil fa-fw"></i> ข้อมูลสถานที่ <strong></strong></h4></header>
      </div>
      <div class="box-body no-padding">
        <form class="form-horizontal form-banded form-bordered" action="" accept-charset="utf-8" method="post" id="form-action"  enctype="multipart/form-data" >
          <div class="form-group form-group-md">
            <div class="col-md-2">
              <label class="control-label">หมวดหมู่</label>
            </div>

            <div class="col-md-10">
              <select id="select_category" class="form-control" >
                <option value="29">บริการ</option>
              </select>
              
            </div>
          </div>
          <div class="form-group form-group-md">
            <div class="col-md-2">
              <label class="control-label">ประเภท</label>
            </div>

            <div class="col-md-10">
              <select id="select_type" class="form-control" >
                <option value="8" class="sub_option">Birds nest</option>

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
             <input class="form-control" name="topic_en" type="text" id="topic_en"  value="King Power (Phuket)">
           </div>
         </div>
         <div class="form-group form-group-md">
          <div class="col-md-2">
            <label class="control-label">ชื่อ TH</label>
          </div>

          <div class="col-md-10">
           <input class="form-control" name="topic_th" type="text" id="topic_th"  value="คิงส์ พาวเวอร์ (ภูเก็ต)">
         </div>
       </div>
       <div class="form-group form-group-md">
        <div class="col-md-2">
          <label class="control-label">ชื่อ CN</label>
        </div>

        <div class="col-md-10">
          <input class="form-control" name="topic_cn" type="text" id="topic_cn"  value="皇权免税店（普吉岛）">
        </div>
      </div>
      <div class="form-group form-group-md">
        <div class="col-md-2">
          <label class="control-label">ภูมิภาค</label>
        </div>

        <div class="col-md-10">
          <select class="form-control" name="region" id="region" >
            <option value="">- เลือกภูมิภาค -</option>

          </select>
        </div>
      </div>
      <div class="form-group form-group-md">
        <div class="col-md-2">
          <label class="control-label">จังหวัด</label>
        </div>

        <div class="col-md-10">
          <select class="form-control" name="province" id="province" >
            <option value="">- เลือกจังหวัด -</option>


          </select>
        </div>
        
      </div>
      <div class="form-group form-group-md">
        <div class="col-md-2">
          <label class="control-label">อำเภอ/เขต</label>
        </div>

        <div class="col-md-10">
          <select name="select_amphur" class="form-control" id="select_amphur" >
            <option value="">- เลือกเขต/อำเภอ -</option>

          </select>
        </div>
        
      </div>
      <div class="form-group form-group-md">
        <div class="col-md-2">
          <label class="control-label">ที่อยู่</label>
        </div>

        <div class="col-md-10">
         <textarea name="address" rows="3" class="form-control" id="address" placeholder="ที่อยู่">88 Road Vichit, Muang 83000, 88 Chao Fah Tawan Tok                                                                                                  
         </textarea>

       </div>

     </div>
     <div class="form-group form-group-md">
      <div class="col-md-2">
        <label class="control-label">Link แผนที่ </label>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control">

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
        <input type="hidden" name="lat_db" value="7.872888" id="lat">
        <input type="hidden" name="lng_db" value="98.360599" id="lng">
        <div id="map_frame" style="height: 200px">



        </div>
        <div class="col-md-6">
          <input class="form-control" name="lat" type="text" id="lat" value="7.872888">
          <p class="help-block">ละติดจูด</p>
        </div>
        <div class="col-md-6">
          <input class="form-control" name="lng" type="text" id="lng" value="98.360599">
          <p class="help-block">ลองติจูด</p>
        </div>
      </div>
    </div>
    <div class="form-group form-group-md">
      <div class="col-md-2">
        <label class="control-label">เบอร์โทรศัพท์</label>
      </div>

      <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone"  value="07639 7888">
      </div>
    </div>
    <div class="form-group form-group-md">
      <div class="col-md-2">
        <label class="control-label">อีเมล์</label>
      </div>

      <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email"  value="system.goldenbeachgroup@gmail.com">
      </div>
    </div>
    <div class="form-group form-group-md">
      <div class="col-md-8">

      </div>

      <div class="col-md-2">
        <button type="button" class="btn btn-primary btn-lg" id="submit_data_1"> <span id="txt_btn_save5"> บันทึกข้อมูล </span></button>
      </div>
    </div>

    
  </form>
</div><!--end .box-body -->
</div><!--end .box -->
</div>
</div>






<div class="col-md-5">
  <table>
    <tr>
      <td valign="top" style="border: 2px solid #eaebec;padding: 15px;border-radius: 20px;">
        <div class="form-topic">ประเภทรายจ่าย</div>
        <table width="100%">
          <tbody>
            <tr>
              <td bgcolor="#FFFDE9"><strong>รายจ่าย 1: </strong></td>
              <td bgcolor="#FFFDE9" style="font-size:16px;"><select class="form-control" name="price_plan" id="price_plan" >
                <option value="">- เลือกประเภทรายจ่าย -</option>
                <option value="1" selected="">ค่าจอด + ค่าหัว </option><option value="2">ค่าจอด + ค่าคอมมิชชั่น </option><option value="3">ค่าหัว +  ค่าคอมมิชชั่น </option><option value="4">ค่าจอด + ค่าหัว +  ค่าคอมมิชชั่น </option><option value="5">ค่าจอด </option><option value="6">ค่าหัว </option><option value="7">ค่าคอมมิชชั่น </option>                  </select></td>
              </tr>
              <tr>
                <td bgcolor="#FFFDE9"><strong>รายจ่าย 2: </strong></td>
                <td bgcolor="#FFFDE9" style="font-size:16px;"><select class="form-control" name="price_plan_2" id="price_plan4" >
                  <option value="">- เลือกประเภทรายจ่าย -</option>
                  <option value="1">ค่าจอด + ค่าหัว </option><option value="2">ค่าจอด + ค่าคอมมิชชั่น </option><option value="3">ค่าหัว +  ค่าคอมมิชชั่น </option><option value="4">ค่าจอด + ค่าหัว +  ค่าคอมมิชชั่น </option><option value="5">ค่าจอด </option><option value="6">ค่าหัว </option><option value="7" selected="">ค่าคอมมิชชั่น </option>                  </select></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFDE9"><strong>รายจ่าย 3: </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;"><select class="form-control" name="price_plan_3" id="price_plan5" >
                    <option value="">- เลือกประเภทรายจ่าย -</option>
                    <option value="1">ค่าจอด + ค่าหัว </option><option value="2" selected="">ค่าจอด + ค่าคอมมิชชั่น </option><option value="3">ค่าหัว +  ค่าคอมมิชชั่น </option><option value="4">ค่าจอด + ค่าหัว +  ค่าคอมมิชชั่น </option><option value="5">ค่าจอด </option><option value="6">ค่าหัว </option><option value="7">ค่าคอมมิชชั่น </option>                  </select></td>
                  </tr>
                  <tr style="display: none;">
                   <td><strong>ภาษีมูลค่าเพิ่ม :</strong></td>
                   <td><input type="checkbox" checked="" name="vat_check" id="vat_check" value="1" style="width: 20px;"><label for="vat_check" style="position: absolute;margin-top: 9px;margin-left: 4px;">มีภาษีมูลค่าเพิ่ม</label>

                   </td>
                 </tr>
                 <tr id="set_vat_row" style="display: none;">
                   <td></td>
                   <td>
                     <div class="input-group" style="width: 120px;">
                      <input id="old_vat" value="7" type="hidden">
                      <input type="number" class="form-control" name="set_vat" id="set_vat" value="7">
                      <span class="input-group-addon danger"><span class=""><strong>%</strong></span></span>
                    </div>
                  </td>
                </tr>   
                <tr>
                 <td><strong>จ่ายค่าคอมมิชชั่น :</strong></td>
                 <td><input type="checkbox" name="return_guest" id="return_guest" value="1" style="width: 20px;"><label for="return_guest" style="position: absolute;margin-top: 9px;margin-left: 4px;">แขกเดินทางกลับ</label></td>
               </tr>
               <tr>
                 <td><strong>คืนภาษามูลค่าเพิ่ม :</strong></td>
                 <td><input type="checkbox" name="return_vat" id="return_vat" checked="" value="1" style="width: 20px;"><label for="return_vat" style="position: absolute;margin-top: 9px;margin-left: 4px;">ลูกค้าสามารถคืนภาษามูลค่าเพิ่มได้</label></td>
               </tr>
               <tr>
                <td colspan="2">
                  <div class="form-topic">ผู้ติดต่อ</div>
                  <div id="load_edit_contact"> 
                   <table width="100%" cellspacing="2" cellpadding="1">
                    <tbody><tr bgcolor="#990000" height="25">
                     <td width="50" align="center" bgcolor="#999999"><center>
                       <font color="#FFFFFF">แก้ไข</font>     
                     </center></td>
                     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>


                     <td height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">ชื่อ</font></td>


                     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">เบอร์โทรศัพท์</font></td>
                     <!--<td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">อีเมล</font></td>-->

                     <td width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">ตำแหน่ง</font></td>

                   </tr> 
                   <tr bgcolor="#FFFEF2">
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
                    <!-- <td align="center">    </td>-->
                    <td align="center">ผู้จัดการ  </td>
                  </tr>
                  <tr>
                    <td colspan="29" height="1" class="dotline"></td>
                  </tr>
                </tbody></table>   
              </div>


              <div class="form-topic">เวลาทำการ</div>             


            </td>
          </tr>  
          <tr>
            <td><strong>เวลาทำการ A :</strong></td>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="60">เปิด</td>
                  <td width="140">
                   <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default" id="hour_open_default">

                    <option value="01">01</option>


                  </select> .
                  <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default" id="time_open_default">

                    <option selected="" value="00">00</option>


                  </select> น.</td>
                  <td width="50">ปิด&nbsp;</td>
                  <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default" id="hour_close_default">

                    <option value="01">01</option>



                  </select> .
                  <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default" id="time_close_default">

                    <option selected="" value="00">00</option>



                  </select> น.</td>
                  <td align="right"><button type="button" class="btn btn-md btn-info" id="default_time"><strong>ค่าเริ่มต้น</strong></button></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
           <td><label for="time_other_all" style=" margin-bottom: -3px;">แสดงเวลาทำการ B  :</label></td>
           <td> <input type="checkbox" value="1" id="time_other_all" name="time_other_all" style="width: 20px;"></td>
         </tr>          
         <tr id="row_time_other" style="display: none;">
          <td><strong>เวลาทำการ B :</strong></td>

          <td style="display: nones;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td width="60">เปิด</td>
                <td width="140">
                 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default_other" id="hour_open_default_other">

                  <option value="01">01</option>



                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default_other" id="time_open_default_other">

                  <option selected="" value="00">00</option>



                </select> น.</td>
                <td width="50">ปิด&nbsp;</td>
                <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default_other" id="hour_close_default_other">

                  <option value="01">01</option>



                </select> .
                <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default_other" id="time_close_default_other">

                  <option selected="" value="00">00</option>


                </select> น.</td>
                <td align="right"><button type="button" class="btn btn-md btn-warning" id="default_time_other"><strong>ค่าเริ่มต้น</strong></button></td>
              </tr>
            </tbody>
          </table></td>

        </tr>
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

</tbody>
</table>

<table width="100%">
 <tbody><tr>
  <td align="right">
    <button type="button" class="btn btn-primary btn-lg" id="submit_data_2"> <span id="txt_btn_save5"> บันทึกข้อมูล </span></button>
    <script>
      $('#submit_data_2').click(function(){
       $('#submit_data').click();
     });
   </script>  
 </td>
</tr>
</tbody></table>
</td>
</tr>
</table>
</div>