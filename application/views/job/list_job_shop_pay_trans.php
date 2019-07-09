<?php
//echo "<pre>";
//print_r($_POST[data]);
//echo "</pre>";
//exit();
if (count($_POST[data]) == 0 or $_POST[data] == "") {
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
    <div class="row">
      <div class="col-md-6">
        <div>
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
  <!--          <tr>
              <td>
                <span class="font-16">ประเภท : <?=$plan;?></span>
              </td>
            </tr>-->
            <tr>
              <td>
                <span class="font-16" >เลขจอง : <?=$val[invoice];?></span>
                <?php if ($data->driver_topoint_date != "") {?>
                  <font color="#ff0000;" style="margin-left: 10px;" id="time_toplace_<?=$val[id];?>">
                  เวลาถึง <?=date('H:i:s',$data->driver_topoint_date);?>
                  </font>
                <?php }
                ?>

              </td>
            </tr>
          </table>
        </div>
        <div>
          <h4 style="margin-bottom: 0;">ค่าตอบแทน</h4>
          <span class="font-16">ประเภท : <?=$plan;?></span>
        </div>
      </div>
      <div class="col-md-3">
        <ul class="list-group">
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
        </ul>
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
                $query_lab = $this->db->query("SELECT id,phone,name,usertype FROM shopping_contact  WHERE product_id='".$res_ps->id."' and type='phone'  and i_online = 1");
                foreach ($query_lab->result() as $key => $val) {
//                $this->db->select('id,i_user_contact');
//                $_where = array();
//                $_where[i_user_id] = $row->id;
//                $query_lab = $this->db->get_where('tbl_ability_user',$_where);
//                $check_status_lab = $query_lab->row();
//                if ($check_status_lab == false) {
//                  $return[msg] = 'ผู้ใช้ถูกปิดการใช้งาน กรุณาติดต่อผู้ดูแลของท่าน';
//                  $return[status] = false;
//                  return $return;
//                }
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

    <!------------------------------------------------------------------------------------------------------------------------>

    <?php
    $_where = array();
    $_where['i_order_booking'] = $data->id;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_LOGS,$_where,$_select,$_order);
// echo 'fsfsafsfsf';
    ?>
    <div class="row">
      <div class="col-md-6">
        <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
          <?php
          // echo $BOOKING_LOGS[0]->i_plan_pack.'************'.count($BOOKING_LOGS);

          $_where = array();
          if ($BOOKING_LOGS == '') {
            $_where['i_plan_pack'] = $data->plan_setting;
          }
          else {
            $_where['i_plan_pack'] = $BOOKING_LOGS[0]->i_plan_pack;
          }
          // echo $_where['i_plan_pack'].'-----------';
          $_select = array('*');
          $_order = array();
          $_order['id'] = 'asc';
          $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
          $all_total_iprice = 0;
//    echo '<pre>';
//    print_r($PACK_LIST);
//    echo '</pre>';
          foreach ($PACK_LIST as $key => $val) {
            $_where = array();
            $_where[id] = $val->i_plan_main;
            $this->db->select('id,s_topic');
            $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
            $main = $query_main->row();
            $_where = array();
            $_where[id] = $val->i_con_plan_main_list;
            $this->db->select('id,s_topic');
            $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
            $mainlist = $query_mainlist->row();
            $partner_g = 2;
            $_where = array();
            $_where[id] = $val->i_con_plan_main_list;
            $this->db->select('*');
            $query = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
            if ($val->i_con_plan_main_list > 0) {

              $txt_btn_add = $mainlist->s_topic;
            }
            else {

              $txt_btn_add = 'เพิ่ม';
            }
            $_where = array();
            $_where[i_order_booking] = $data->id;
            $_where[i_main_list] = $val->i_con_plan_main_list;

            $_select = array('*');
            if ($BOOKING_LOGS == '') {
              $TBL = TBL_COM_ORDER_BOOKING;
            }
            else {
              $TBL = TBL_COM_ORDER_BOOKING_LOGS;
            }
            // echo $TBL.'////////////';
            $COM_ORDER_BOOKING = $this->Main_model->rowdata($TBL,$_where,$_select);

            // echo '<pre>';
            // print_r($COM_ORDER_BOOKING);
            // echo '</pre>';
            // echo $COM_ORDER_BOOKING->i_main_list."<br/>";
            if ($COM_ORDER_BOOKING->i_main_list == 5) {
              $curency = '%';
              $title_head = 'รายการ';
              $title_head2 = 'คอม';


              $_where = array();
              // echo $COM_ORDER_BOOKING->i_com;
              $_where[status] = 1;
              $_where[id] = $COM_ORDER_BOOKING->i_com;
              $_select = array('*');
              $MAIN_TYPELIST = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where,$_select);
              //                      echo '<pre>';
              // print_r($MAIN_TYPELIST);
              // echo '</pre>';
//          // $pax = $COM_ORDER_BOOKING->i_pax;
              $pax = $MAIN_TYPELIST->topic_th;
//        echo 555555555555555555;
            }
            else if ($COM_ORDER_BOOKING->i_main_list == 2) {
              $curency = 'บ.';
              $title_head = 'รายการ';
              $title_head2 = 'ราคา';
              $all_total_iprice += $COM_ORDER_BOOKING->i_price;
              $_where = array();

              $_where[status] = 1;
              $_where[id] = $COM_ORDER_BOOKING->i_com;
              $_select = array('*');
              $USE_TYPE = $this->Main_model->rowdata(TBL_WEB_CAR_USE_TYPE,$_where,$_select);
              //                                echo '<pre>';
              // print_r($USE_TYPE);
              // echo '</pre>';
              $pax = $USE_TYPE->name_th;
            }
            else if ($COM_ORDER_BOOKING->i_main_list == 4) {
              $curency = 'บ.';
              $title_head = 'รายการ';
              $title_head2 = 'ราคา(คนละ)';
              $all_total_iprice += $COM_ORDER_BOOKING->i_price * $COM_ORDER_BOOKING->i_pax;
              $pax = $COM_ORDER_BOOKING->i_pax;
            }
            else if ($COM_ORDER_BOOKING->i_main_list == 3) {
              $curency = 'บ.';
              $title_head = 'จำนวน';
              $title_head2 = 'ราคา(คนละ)';
              $all_total_iprice += $COM_ORDER_BOOKING->i_price * $COM_ORDER_BOOKING->i_pax;
              $pax = $COM_ORDER_BOOKING->i_pax;
            }
            else {
              $all_total_iprice += $COM_ORDER_BOOKING->i_price;
              $curency = 'บ.';
              $title_head = 'จำนวน';
              $title_head2 = 'ราคา';
              $pax = $COM_ORDER_BOOKING->i_pax;
            }
            $_where = array();
            $_where['id'] = $COM_ORDER_BOOKING->i_type_pay;
            $_select = array('name_th');
            $PAY_TYPE = $this->Main_model->rowdata(NEW_TBL_PAY_TYPE,$_where);
            ?>
            <tr >
              <td  colspan="4">
                <table width="100%">
                  <tr>
                    <td colspan="4">
                      <span style="font-weight: 700"><?=$main->s_topic;?> (<?=$txt_btn_add;?>) </span>
                      <span style="margin-left: 10px;color: #0076ff">(<?=$PAY_TYPE->s_topic;?>)</span>
                    </td>

                  </tr>
                  <tr>
                    <td width="90"> <?=$title_head;?></td>
                    <td></td>
                    <td width="150" align="center"> <?=$title_head2;?></td>
                    <td></td> 
                  </tr>
                  <?php
                  $_where = array();
                  $_where[i_order_booking] = $data->id;
                  $_where[i_plan_pack] = $data->plan_setting;
                  $this->db->select('*');
                  $query_plan = $this->db->get_where(TBL_COM_ORDER_BOOKING_COM,$_where);
//            echo 6666666666;
                  // echo '<pre>';
                  // print_r($COM_ORDER_BOOKING);
                  // echo '</pre>';
//            exit();
                  if ($COM_ORDER_BOOKING->i_main_list != 5) {
                    //         echo '<pre>';
                    // print_r($COM_ORDER_BOOKING);
                    // echo '</pre>';
                    ?>

                    <tr>
                      <td width="90" > <span style=""><?=$pax;?></span></td>
                      <td></td>
                      <td width="" align="right"><span><?=number_format($COM_ORDER_BOOKING->i_price,0);?></span></td>                
                      <td align="left"><span class="font-17"><?=$curency;?></span></td> 
                    </tr>

                    <?php
                  }
                  else if ($COM_ORDER_BOOKING->i_main_list == 5) {
                    $_where = array();
                    $_where['i_order_booking'] = $data->id;
                    $_where['i_plan_pack'] = $data->plan_setting;
                    $_select = array('*');
                    $_order = array();
                    $_order['id'] = 'asc';
                    $BOOKING_COM = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_COM,$_where,$_select,$_order);

                    $_where = array();
                    $_where['i_order_booking'] = $data->id;
                    // $_where['i_plan_pack'] = $data->plan_setting;
                    $_select = array('*');
                    $_order = array();
                    $_order['id'] = 'asc';
                    $BOOKING_CHANGE_PLAN = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_CHANGE_PLAN,$_where,$_select,$_order);
                    //      echo '<pre>';
                    // print_r($BOOKING_CHANGE_PLAN);
                    // echo '</pre>';    

                    if ($BOOKING_CHANGE_PLAN == '') {

                      $BOOKING_COM_ROW = $BOOKING_COM;
                    }
                    else {
                      $BOOKING_COM_ROW = $BOOKING_CHANGE_PLAN;
                    }



                    foreach ($BOOKING_COM_ROW as $key => $datacom) {
                      $_where = array();
                      $_where['id'] = $datacom->i_con_com_product_type;
                      $_select = array('id');
                      $COM_PRODUCT_TYPE = $this->Main_model->rowdata(TBL_CON_COM_PRODUCT_TYPE,$_where);

                      $_where = array();
                      $_where[id] = $COM_PRODUCT_TYPE->i_product_sub_typelist;
                      $this->db->select('*');
                      $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
                      $data_pd_sub_typelist = $query->row();


                      $_where = array();
                      $_where[status] = 1;
                      $_where[id] = $data_pd_sub_typelist->i_main_typelist;
                      $this->db->select('*');
                      $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                      $data_pd = $query->row();
                      ?>
                      <tr id="">
                        <td colspan="2">
                          <span style="font-size:16px;"><?=$data_pd->topic_th;?>  </span>

                        </td>

                                                                     <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_price;?></span></td> -->
                        <td align="center"><span   style="width: 90%;" class="form-controls" ><?=$datacom->i_price;?>%</span></td>
                        <!-- <td align="center"><span   style="width: 90%;" class="form-control" ><?=$data_con_pd_typelist->f_wht;?></span></td> -->
                        <td width="30"></td>
                      </tr>

                      <?php
                    }
                  }
                  ?>
                </table>          
              </td>
            </tr>
            <?php
          }
          ?>
          <tr>
            <td ></td>
            <td width="110" style="font-weight: 700"><span>รวม</span></td>
            <td align="left" style="font-weight: 700" colspan="2">
              <span class="16" id="txt_all_total"><?=number_format($all_total_iprice,0);?></span>
              <span class="font-17">บ.</span>
            </td>       
          </tr>
        </table>
      </div>
    </div>

  </div>

<?php }
?>