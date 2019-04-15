<?php
//echo "<pre>";
//print_r($_POST[data]);
//echo "</pre>";
//exit();
if (count($_POST[data]) == 0) {
  ?>
  <h3 style="color: #FF0000;">ไม่มีรายการ</h3>
  <?php
}
foreach ($_POST[data] as $key => $val) {
  $data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $val[id]),array('*'));

  $sql_ps = "SELECT topic_th ,id ,pic_logo, amphur ,sub ,main, province FROM shopping_product  WHERE id='".$val[program]."' ";
  $query_ps = $this->db->query($sql_ps);
  $res_ps = $query_ps->row();

  $_where = array();
  $_where['id'] = $res_ps->province;
  $_select = array('name_th');
  $data_pv = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where,$_select);

  $_where = array();
  $_where['id'] = $res_ps->sub;
  $_select = array('topic_th');
  $SUB = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,$_where,$_select);

  $_where['id'] = $res_ps->main;
  $_select = array('topic_th');
  $MAIN = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,$_where,$_select);

  $query = $this->db->query("SELECT name_th,id FROM web_area WHERE id = ".$res_ps->amphur);
  $aumper = $query->row();

  $_where = array();
  $_where['id'] = $data->plan_setting;

  $_select = array('*');
  $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);

  //           echo '<pre>';
  // print_r($PLAN_PACK);
  // echo '</pre>';
  $_where = array();
  $_where['id'] = $PLAN_PACK->i_country;
  $_select = array('country_code','id','name_th');
  $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);

  $plan = $PLAN_PACK->s_topic;

  $minutes_to_add = $val[airout_m];
  //        echo $minutes_to_add." ++";
  $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
  $time = new DateTime($time_c);
  if (in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','::1'))) { // debug mode on localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
  }
  else {
    $time->add(new DateInterval('PT'.$minutes_to_add.'M'));
  }
  $stamp = $time->format('H:i');
  //        echo $stamp." +";
  $current_time = date('H:i');
  $datetime1 = new DateTime($current_time);
  $datetime2 = new DateTime($stamp);

  if ($val[lab_approve_job] == 0) {
    $lab_approve_icon = "fa fa-times";
    $lab_approve_color = "color:#e51400";
  }
  else {
    $lab_approve_icon = "fa fa-check";
    $lab_approve_color = "color:#4CAF50";
  }

  if ($val[check_driver_topoint] == 0) {
    $driver_topoint_icon = "fa fa-times";
    $driver_topoint_color = "color:#e51400";
  }
  else {
    $driver_topoint_icon = "fa fa-check";
    $driver_topoint_color = "color:#4CAF50";
  }

  if ($val[check_guest_receive] == 0) {
    $guest_receive_icon = "fa fa-times";
    $guest_receive_color = "color:#e51400";
  }
  else {
    $guest_receive_icon = "fa fa-check";
    $guest_receive_color = "color:#4CAF50";
  }

  if ($val[check_guest_register] == 0) {
    $guest_register_icon = "fa fa-times";
    $guest_register_color = "color:#e51400";
  }
  else {
    $guest_register_icon = "fa fa-check";
    $guest_register_color = "color:#4CAF50";
  }

  if ($val[check_lab_pay] == 0) {
    $lab_pay_icon = "fa fa-times";
    $lab_pay_color = "color:#e51400";
  }
  else {
    $lab_pay_icon = "fa fa-check";
    $lab_pay_color = "color:#4CAF50";
  }

  if ($val[check_driver_pay] == 0) {
    $driver_pay_icon = "fa fa-times";
    $driver_pay_color = "color:#e51400";
  }
  else {
    $driver_pay_icon = "fa fa-check";
    $driver_pay_color = "color:#4CAF50";
  }
  ?>
  <div class="col-lg-12 list-group-item">

    <div class="col-md-5">
      <?php
      $url = "../../data/pic/place/".$res_ps->pic_logo;
//        if (file_exists($url) != 1 || $res_ps->pic_logo == '') {
//          $images_url = base_url().'assets/images/noimage_2.gif';
//        }
//        else {
//          $images_url = $url;
//        }
      $images_url = $url;
      ?>
      <!--<img class="chat_gallery_items" src="<?=$images_url;?>"  alt="" style="box-shadow: 1px 1px 3px #333333;border-radius:  8px; border: 1px solid #ddd;height: 65px;width: 110px; ">-->

      <h3 class="list-group-item-heading"><?=$res_ps->topic_th;?></h3>
      <p class="list-group-item-text">

        <span class="font-16"><?=$MAIN->topic_th;?>(<span class="font-17" ><?=$SUB->topic_th;?> </span>)</span>&nbsp;
        <span class="font-16" style="color: #00000087;"><?=$data_pv->name_th;?> / <?=$aumper->name_th;?></span>
      </p>
      <table width="100%">
        <tr>
          <td>
            <span class="font-16">
              จำนวน : 
              <?php if ($val[adult] > 0) {?>
                ผู้ใหญ่ : <span id="txt_mn_adult_<?=$val[id];?>"><?=$val[adult];?></span> 
              <?php }?>
              <?php if ($val[child] > 0) {?>
                เด็ก : <span id="txt_mn_child_<?=$val[id];?>"><?=$val[child];?></span>	
              <?php }
              ?>
            </span>
          </td>
        </tr>
        <tr>
          <td>
            <table style="margin-left: 0px;">
              <tr>
                <td style="padding: 0;"><span class="font-16">สัญชาติ</span> : </td>
                <td style="padding: 0;">
                  &nbsp;
                  <img src="<?=base_url();?>assets/img/flag/icon/<?=$COUNTRY->country_code;?>.png" width="20" height="20" alt="">
                </td>
                <td style="padding: 0;">&nbsp;</td>
                <td style="padding: 0;"><span class="font-16" id="txt_county_pp"><?=$COUNTRY->name_th;?></span></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <span class="font-16">ประเภท : <?=$plan;?></span>
          </td>
        </tr>
        <tr>
          <td>
            <span class="font-16" >เลขจอง : <?=$val[invoice];?></span>
            <font color="#ff0000;" style="margin-left: 10px;" id="time_toplace_<?=$val[id];?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-4">
      <table width="100%" class="table-cus" style="margin-top: -9px;">
        <tr>
          <td style="<?=$lab_approve_color;?>" class="font-15">
            <a data-toggle="modal" data-target="#md_modal" onclick="viewDetailWorkstep(<?=$val[id];?>,'lab_approve');"><span class="x"><i class="<?=$lab_approve_icon;?>" aria-hidden="true"></i></span>
            พนักงานรับทราบงาน</a>
          </td>

          <td style="<?=$driver_topoint_color;?>" class="font-15">
            <a onclick="viewDetailWorkstep(<?=$val[id];?>,'driver_topoint');"><span class="x"><i class="<?=$driver_topoint_icon;?>" aria-hidden="true"></i></span>
              คนขับถึงสถานที่</a>
          </td>
        </tr>
        <tr>
          <td style="<?=$guest_receive_color;?>" class="font-15">
            <a onclick="viewDetailWorkstep(<?=$val[id];?>,'guest_receive');"><span class="x"><i class="<?=$guest_receive_icon;?>" aria-hidden="true"></i></span>
              พนักงานรับแขก</a>
          </td>

          <td style="<?=$guest_register_color;?>" class="font-15">
            <a onclick="viewDetailWorkstep(<?=$val[id];?>,'guest_register');"><span class="x"><i class="fa <?=$guest_register_icon;?>" aria-hidden="true"></i></span>
              พนักงานลงทะเบียน</a>
          </td>
        </tr>
        <tr>
          <td style="<?=$lab_pay_color;?>" class="font-15">
            <a onclick="viewDetailWorkstep(<?=$val[id];?>,'lab_pay');"><span class="x"><i class="fa <?=$lab_pay_icon;?>" aria-hidden="true"></i></span>
              พนักงานยืนยันการจ่ายเงิน</a>
          </td>

          <td class="font-15" style="<?=$driver_pay_color;?>">
            <a onclick="viewDetailWorkstep(<?=$val[id];?>,'driver_pay');"><span class="x"><i class="fa <?=$driver_pay_icon;?>" aria-hidden="true"></i></span>
              คนขับยืนยันการรับเงิน</a>
          </td>
        </tr>
        <?php
        if ($val[check_tran_job] > 0) {
          if ($val[transfer_money] <= 0) {
            $transfer_icon = "fa fa-times";
            $transfer_color = "color:#e51400";
          }
          else {
            $transfer_icon = "fa fa-check";
            $transfer_color = "color:#4CAF50";
          }
          
          if ($val[driver_approve] <= 0) {
            $driver_approve_icon = "fa fa-times";
            $driver_approve_color = "color:#e51400";
            
          }
          else {
            $driver_approve_icon = "fa fa-check";
            $driver_approve_color = "color:#4CAF50";
          }
          ?>
          <tr>
            <td style="<?=$transfer_color;?>" class="font-15">
              <a onclick="viewDetailWorkstep(<?=$val[id];?>,'transfer_money');"><span class="x"><i class="fa <?=$transfer_icon;?>" aria-hidden="true"></i></span>
                แจ้งโอนเงิน</a>
            </td>

            <td class="font-15" style="<?=$driver_approve_color;?>">
              <a onclick="viewDetailWorkstep(<?=$val[id];?>,'driver_approve');"><span class="x"><i class="fa <?=$driver_approve_icon;?>" aria-hidden="true"></i></span>
                คนขับยืนยันการรับโอน</a>
            </td>
          </tr>
          <tr>
            <td></td>
          </tr>
        <?php }?>
      </table>
      <!--      <ul class="list-group" style="display: none;">
              <li class="list-group-item " style="padding: 7px;<?=$lab_approve_color;?>">
                <span class="x"><i class="<?=$lab_approve_icon;?>" aria-hidden="true"></i></span>
                พนักงานรับทราบงาน
              </li>
              <li class="list-group-item" style="padding: 7px;<?=$driver_topoint_color;?>">
                <span class="x"><i class="<?=$driver_topoint_icon;?>" aria-hidden="true"></i></span>
                คนขับถึงสถานที่
              </li>
              <li class="list-group-item" style="padding: 7px;<?=$guest_receive_color;?>">
                <span class="x"><i class="<?=$guest_receive_icon;?>" aria-hidden="true"></i></span>
                พนักงานรับแขก
              </li>
              <li class="list-group-item" style="padding: 7px;<?=$guest_register_color;?>">
                <span class="x"><i class="fa <?=$guest_register_icon;?>" aria-hidden="true"></i></span>
                พนักงานลงทะเบียน
              </li>
              <li class="list-group-item" style="padding: 7px;<?=$lab_pay_color;?>">
                <span class="x"><i class="fa <?=$lab_pay_icon;?>" aria-hidden="true"></i></span>
                พนักงานยืนยันการจ่ายเงิน
              </li>
              <li class="list-group-item" style="padding: 7px;<?=$driver_pay_color;?>">
                <span class="x"><i class="fa <?=$driver_pay_icon;?>" aria-hidden="true"></i></span>
                คนขับยืนยันการรับเงิน
              </li>
      
      
            </ul>-->
    </div>

    <div class="col-md-3" align="center">
      <b class="font-16">ติดต่อ</b>
      <table width="100%">
        <tr>
          <td width="65">
            <span class="font-16" >คนขับ</span>
          </td>
          <td width="15"> : </td>
          <td>
            <span class="font-16" >
              <?php
              $sql_dv = "SELECT name,nickname,phone,name_en,zello_id,line_id,username FROM web_driver WHERE id='".$val[drivername]."'    ";
              $query_dv = $this->db->query($sql_dv);
              $res_dv = $query_dv->row();
              if ($res_dv->name != "") {
                $name_dv = $res_dv->name;
              }
              if ($res_dv->nickname != "") {
                $name_dv = $res_dv->nickname;
              }
              ?>
              <a style="cursor: pointer;"><?=$val[phone]." (".$name_dv.")";?></a>
            </span>
          </td>
        </tr>
        <tr>
          <td>
            <span class="font-16" >พนักงาน</span>
          </td>
          <td> : </td>
          <td>
            <span class="font-16" >
              <?php
              $query_lab = $this->db->query("SELECT id,phone,name,usertype FROM shopping_contact  WHERE product_id='".$res_ps->id."' and type='phone' and status=1");
              foreach ($query_lab->result() as $key => $val) {
                ?>
                <a style='cursor: pointer;'><?=$val->phone." (".$val->name.")";?></a><br/>
              <?php }
              ?>
            </span>
          </td>
        </tr>
      </table>

    </div>

  </div>

<?php }
?>