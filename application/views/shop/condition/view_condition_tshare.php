<style>
  .tb-pad td,
  th {
    padding: 2px;
  }
  .button-cus{
    padding: 2px 8px;
    font-size: 18px;
  }
</style>
<?php
$partner_g = $_GET[partner_g];
//echo $partner_g;
$_where = array();
$_where[i_plan_main] = $_GET[plan_main];
$this->db->select('*');
$query = $this->db->get_where(TBL_PLAN_MAIN_LIST,$_where);
?>
<div class="row">
  <form id="form_condition">
    <input type="hidden" value="<?=$_GET[pack_id];?>" id="pack_id" name="pack_id"/>
    <input type="hidden" value="<?=$_GET[plan_main];?>" id="plan_main" name="plan_main"/>
  </form>
  <div class="col-md-12">

    <?php
    $_where = array();
    $_where[i_plan_pack] = $_GET[pack_id];
    $_where[i_plan_main] = $_GET[plan_main];
    $this->db->select('i_con_plan_main_list, id');
    $querys = $this->db->get_where(TBL_PLAN_PACK_LIST,$_where);
    $con_pack = $querys->row();

    $_where = array();
    $_where['t2.i_plan_main'] = $_GET[plan_main];
    $_where['t1.i_shop'] = $_GET[shop_id];
    $_where['t1.i_country'] = $_GET[i_country];
    $_where['t1.i_partner'] = 2;
    $this->db->select('*');
    $this->db->from(TBL_PLAN_PACK." as t1");
    $this->db->join(TBL_PLAN_PACK_LIST." as t2",'t1.id = t2.i_plan_pack');
    $this->db->where($_where);
    $con_ref_query = $this->db->get();
    $con_ref = $con_ref_query->row();
//     echo "<pre>";
//      print_r($con_ref);
//      echo "</pre>";
    $person = 0;
    foreach ($query->result() as $key => $val) {
//      echo $con_pack->i_con_plan_main_list." ++++ ".$_GET[pack_id];

      $tbl = $val->s_tbl;
      $_where = array();
      $_where[i_plan_pack] = $_GET[pack_id];
      if ($val->id != 5) {
        $_where[i_status] = 1;
      }
      $this->db->select('*');
      $query_con_tb = $this->db->get_where($tbl,$_where);
//      $con = $query_con_tb->row();

      if ($con_pack->i_con_plan_main_list == $val->id) {
        $selected = "checked";
        $open_box = "";
        $box_other = "";
      }
      else {
        $selected = "";
        $open_box = "display:none;";
        $box_other = "display:none;";
      }
      ?>
      <div style="padding: 5px 0px 15px 0px; ">
        <?php
        if ($val->id == 1) {
          ?>
          <div style="<?=$box_other;?>">
            <label class="container-rd"><?=$val->s_topic;?>
              <input <?=$selected;?> type="radio" name="condition_type" value="<?=$val->id;?>" onclick="selectOptionSet('<?=$val->id;?>');" class="radio-check">
              <span class="checkmark"></span>
            </label>
            <div class="row outbox" id="box_set_<?=$val->id;?>" style="<?=$open_box;?>">
              <div style="padding: 0px 10px; padding-top: 5px; margin: 10px 0px; border: 1px solid #efe8e8; box-shadow: 1px 1px 3px #e0e0e0;border-radius: 5px;">
                <h4>ร้านค้า >> ทีแชร์</h3>
                  <table class="table" width="100%" style="margin-bottom: 5px;">
                    <tr>
                      <td  align="center" ><b style="font-size:15px;">จำนวน</b></td>
                      <td width="120" align="center" width="150"><b style="font-size:15px;">ราคา</b></td>
                      <td width="120" align="center" width="150"><b style="font-size:15px;">ภาษี ณ ที่จ่าย</b></td>
                    </tr>
                    <?php
//              echo "<pre>";
//              print_r($con_ref);
//              echo "</pre>";
                    $_where = array();
                    $_where[i_plan_pack] = $con_ref->i_plan_pack;
                    $this->db->select('*');
                    $query_data_ep = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
                    foreach ($query_data_ep->result() as $key => $value) {
                      ?>
                      <tr>
                        <td align="center">
                          <span style="font-size:15px;"><?=$value->i_person_up;?> ขึ้นไป</span>
                        </td>
                        <td align="right"><span style="font-size:15px;"><?=$value->f_price;?></span></td>
                        <td align="right"><span style="font-size:15px;"><?=$value->f_wht;?> %</span></td>

                      </tr>
                    <?php }
                    ?>
                  </table>
              </div>
              <button type="button" class="btn btn-support3" onclick="plusRowEachPerson();"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>

              <div class="col-md-12">
                <form id="each_person_form">
                  <table class="tb-pad" width="100%">
                    <tr>
                      <td></td>
                      <td></td>
                      <td align="center"><b style="font-size: 15px;">ราคา</b></td>
                      <!--<td align="center" ><b style="font-size: 16px;">ถอด vat%</b></td>-->
                      <td align="center"><b style="font-size: 15px;">ภาษี ณ ที่จ่าย</b></td>

                    </tr>
                    <?php foreach ($query_con_tb->result() as $key => $val) {?>
                      <tr class="tr_ms_clone" id="id_tr_each_ps_<?=$val->id;?>">
                        <td  align="center">
                          <div class="input-group">
                            <span class="input-group-addon">จำนวนคน</span>
                            <input class="form-control" type="number" name="i_person" id="each_person_i_person_<?=$val->id;?>" value="<?=$val->i_person_up;?>" style="width:90%;" onkeyup="saveDataKeyupEachps(<?=$val->id;?>);" />
                          </div>
                        </td>
                        <td><span style="">ขึ้นไป</span></td>
                        <td align="center">
                          <input class="form-control" type="number" name="f_price" id="each_person_f_price_<?=$val->id;?>" value="<?=$val->f_price;?>" style="width:80%;" onkeyup="saveDataKeyupEachps(<?=$val->id;?>);" />
                        </td>
                        <td align="center" style="display: none;">
                          <input class="form-control" type="number" name="f_vat" id="each_person_f_vat_<?=$val->id;?>" value="<?=$val->f_vat;?>" style="width:80%;" onkeyup="saveDataKeyupEachps(<?=$val->id;?>);" />
                        </td>
                        <td align="center">
                          <input class="form-control" type="number" name="f_wht" id="each_person_f_wht_<?=$val->id;?>" value="<?=$val->f_wht;?>" style="width:80%;" onkeyup="saveDataKeyupEachps(<?=$val->id;?>);" />
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger button-cus del-row" onclick="deletedRowEachPerson(<?=$val->id;?>);">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                    <tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
          <?php
        }
        else if ($val->id == 2) {
          $_where = array();
          $_where[status] = 1;
          $this->db->select('name_th,id');
          $query = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
//          echo "<pre>";
//          print_r($query->result());
//          echo "</pre>";
          ?>
          <div style="<?=$box_other;?>">
            <label class="container-rd" ><?=$val->s_topic;?>
              <input <?=$selected;?> type="radio" name="condition_type" value="<?=$val->id;?>" onclick="selectOptionSet('<?=$val->id;?>');"  class="radio-check">
              <span class="checkmark"></span>
            </label>
            <div style="<?=$open_box;?>" id="box_set_<?=$val->id;?>" class="outbox">
            <div style="padding: 0px 10px; padding-top: 5px; margin: 10px 0px; border: 1px solid #efe8e8; box-shadow: 1px 1px 3px #e0e0e0;border-radius: 5px;">
              <h4>ร้านค้า >> ทีแชร์</h3>
                <table class="table" width="100%" style="margin-bottom: 5px;">
                  <tr>
                    <td align="center" ><b style="font-size:15px;">รายการ</b></td>
                    <td width="130" align="center"><b style="font-size:15px;">ราคา</b></td>
                    <td width="130" align="center"><b style="font-size:15px;">ภาษี ณ ที่จ่าย</b></td>
                  </tr>
                  <?php
                  $_where = array();
                  $_where[i_plan_pack] = $con_ref->i_plan_pack;
                  $this->db->select('*');
                  $query_data_ap = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
                  foreach ($query_data_ap->result() as $key => $value) {
                    $_where = array();
                    $_where[id] = $value->i_car_type;
                    $this->db->select('name_th,id');
                    $query_car_type = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
                    $car_type = $query_car_type->row();
                    ?>
                    <tr>
                      <td align="left">
                        <span style="font-size:15px;"><?=$car_type->name_th;?></span>
                      </td>
                      <td align="right"><span style="font-size:15px;"><?=$value->f_price;?></span></td>
                      <td align="right"><span style="font-size:15px;"><?=$value->f_wht;?> %</span></td>
                    </tr>
                  <?php }
                  ?>
                </table>
            </div>
            
              <table width="100%">
                <tr>
                  <th style="text-align: left;"><b style="font-size: 16px;">รายการ</b></th>
                  <th style="text-align: center;" width="200"><b style="font-size: 15px;">ราคา</b></th>
                  <th style="text-align: center;" width="200"><b style="font-size: 15px;">ภาษี ณ ที่จ่าย</b></th>
                </tr>
                <?php
//                echo "<pre>";
//                print_r($query->result());
//                echo "</pre>";
                foreach ($query->result() as $key => $val) {
                  $_where = array();
                  $_where[i_car_type] = $val->id;
                  $_where[i_plan_pack] = $_GET[pack_id];
                  $this->db->select('*');
                  $query_c = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
                  $data_car = $query_c->row();

                  if ($data_car->i_status > 0) {
                    $selected_car = "checked";
                    $active_box = "active";
                    $disabled_box_price = "";
                    $disabled_box_vat = "";
                    $disabled_box_wht = "";
                    $val_chk = 1;
                  }
                  else {
                    $selected_car = "";
                    $active_box = "";
                    $disabled_box_price = "disabled";
                    $disabled_box_vat = "disabled";
                    $disabled_box_wht = "disabled";
                    $val_chk = 0;
                  }
                  $_where = array();
                  $_where[i_plan_pack] = $con_ref->i_plan_pack;
                  $_where[i_car_type] = $val->id;
                  $this->db->select('*');
                  $q_car_ref = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
                  $data_car_ref = $q_car_ref->row();
//                  echo $q_car_ref->num_rows()." || ".$con_ref->i_plan_pack."<br/>";
                  if ($q_car_ref->num_rows() > 0) {
                    $tr_show_cartype = '';
                  }
                  else {
                    $tr_show_cartype = 'display:none;';
                  }
                  ?>
                  <tr id="tr_list_type_car_<?=$val->id;?>" style="<?=$tr_show_cartype;?>">
                    <td>
                      <div data-toggle="buttons">
                        <label class="btn checkbox-inline btn-checkbox-default-inverse <?=$active_box;?>" onclick="openListTypeCar('<?=$val->id;?>');">
                          <span style="font-size:15px;"><?=$val->name_th;?></span>
                          <input type="checkbox" value="<?=$val->id;?>" role="<?=$val->name_th;?>"> </label>
                      </div>
                      <input type="hidden" value="<?=$val_chk;?>" id="val_ck_<?=$val->id;?>" />
                      <input class="form-control" id="car_vat_<?=$val->id;?>" onkeyup="saveDataKeyupEachCarType(<?=$val->id;?>, 'vat');" type="hidden" value="<?=$data_car->f_vat;?>" style="width:200px;" <?=$disabled_box_vat;?> />
                    </td>
                    <td align="center">
                      <input class="form-control" id="car_price_<?=$val->id;?>" onkeyup="saveDataKeyupEachCarType(<?=$val->id;?>, 'price');" type="number" value="<?=$data_car->f_price;?>" style="width:95%;" <?=$disabled_box_price;?> />
                    </td>
                    <td align="center">
                      <input class="form-control" id="car_wht_<?=$val->id;?>" onkeyup="saveDataKeyupEachCarType(<?=$val->id;?>, 'wht');" type="number" value="<?=$data_car->f_wht;?>" style="width:95%;" <?=$disabled_box_wht;?> />
                    </td>
                  </tr>

                <?php }
                ?>
              </table>
            </div>
          </div>
          <?php
        }
        else if ($val->id == 3) {
          ?>
          <div style="<?=$box_other;?>">
            <label class="container-rd"><?=$val->s_topic;?>
              <input class="radio-check" <?=$selected;?> type="radio"  name="condition_type" value="<?=$val->id;?>" onclick="selectOptionSet('<?=$val->id;?>');">
              <span class="checkmark"></span>
            </label>
            <div class="row outbox" id="box_set_<?=$val->id;?>" style="<?=$open_box;?>">
              <div class="col-md-12">
                <div style="padding: 0px 10px; padding-top: 5px; margin: 10px 0px; border: 1px solid #efe8e8; box-shadow: 1px 1px 3px #e0e0e0;border-radius: 5px;">
                  <h4>ร้านค้า >> ทีแชร์</h3>
                    <?php
                    $_where = array();
                    $_where[i_plan_pack] = $con_ref->i_plan_pack;
                    $this->db->select('*');
                    $query_payall = $this->db->get_where(TBL_CON_EACH_PS_ALL_PAY,$_where);
                    $con_payall = $query_payall->row();
                    ?>  
                    <table  class="table" width="100%" style="margin-bottom: 5px;">
                      <tr>
                        <td width="150"><b style="font-size:15px;">ราคาคนละ</b></td>
                        <td><span style="font-size:15px;"><?=$con_payall->f_price;?></span></td>
                      </tr>
                      <tr>
                        <td><b style="font-size:15px;">ภาษี ณ ที่จ่าย</b></td>
                        <td><span style="font-size:15px;"><?=$con_payall->f_wht;?> %</span></td>
                      </tr>
                    </table>
    <!--                  <table class="table" width="100%" style="margin-bottom: 5px;">
                        <tr>
                          <td align="center" ><b style="font-size:16px;">ราคาคนละ</b></td>
                          <td width="130" align="center"><b style="font-size:16px;">ภาษี ณ ที่จ่าย</b></td>
                        </tr>
                        <tr>
                          <td align="left">
                            <span style="font-size:16px;"><?=$con_payall->f_price;?></span>
                          </td>
                          <td align="right"><span style="font-size:16px;"><?=$con_payall->f_wht;?> %</span></td>
                        </tr>

                      </table>-->
                </div>
                <form id="each_all_case_form">
                  <table class="tb-pad" width="100%">
                    <tr>
                      <td align="center"><b style="font-size: 15px;">คนละ</b></td>
    <!--                      <td></td>
                      <td align="center" width="220px"><b style="font-size: 16px;">ถอด vat%</b></td>
                      <td></td>-->
                      <td align="center"><b style="font-size: 15px;">ภาษี ณ ที่จ่าย</b></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="input-group">
                          <span class="input-group-addon">จำนวน</span>
                          <input class="form-control" type="number" name="f_price" id="allpay_f_price" value="<?=$con->f_price;?>" onkeyup="saveDataKeyUpPayallcase(<?=$con->id;?>);" />
                        </div>
                      </td>
    <!--                      <td width="30"></td>
                      <td>
                        <input class="form-control" type="number" name="f_vat" id="allpay_f_vat" value="<?=$con->f_vat;?>" onkeyup="saveDataKeyUpPayallcase(<?=$con->id;?>);" />
                      </td>
                      <td width="30"></td>-->
                      <td>
                        <input class="form-control" type="number" name="f_wht" id="allpay_f_wht" value="<?=$con->f_wht;?>" onkeyup="saveDataKeyUpPayallcase(<?=$con->id;?>);" />
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
          <?php
        }
        else if ($val->id == 4) {
          ?>
          <div style="<?=$box_other;?>">
            <label class="container-rd"><?=$val->s_topic;?>
              <input  class="radio-check" <?=$selected;?> type="radio" name="condition_type" value="<?=$val->id;?>" onclick="selectOptionSet('<?=$val->id;?>');">
              <span class="checkmark"></span>
            </label>
            <div style="<?=$open_box;?>" id="box_set_<?=$val->id;?>" class="outbox">
              <div style="padding: 0px 10px; padding-top: 5px; margin: 10px 0px; border: 1px solid #efe8e8; box-shadow: 1px 1px 3px #e0e0e0;border-radius: 5px;">
                <h4>ร้านค้า >> ทีแชร์</h3>
                  <table class="table" width="100%" style="margin-bottom: 5px;">
                    <tr>
                      <td width="" align="center" ><b style="font-size:15px;">จำนวน</b></td>
                      <td width="120" align="center"><b style="font-size:15px;">ราคา</b></td>
                      <td width="120" align="center"><b style="font-size:15px;">ภาษี ณ ที่จ่าย</b></td>
                    </tr>
                    <?php
//              echo "<pre>";
//              print_r($con_ref);
//              echo "</pre>";
                    $_where = array();
                    $_where[i_plan_pack] = $con_ref->i_plan_pack;
                    $this->db->select('*');
                    $query_data_ap = $this->db->get_where(TBL_CON_PS_ONLY_REGIS,$_where);
                    foreach ($query_data_ap->result() as $key => $value) {
                      ?>
                      <tr>
                        <td align="center">
                          <span style="font-size:15px;"><?=$value->i_num_regis;?>  ขึ้นไป</span>
                        </td>
                        <td align="right"><span style="font-size:15px;"><?=$value->f_price;?></span></td>
                        <td align="right"><span style="font-size:15px;"><?=$value->f_wht;?> %</span></td>
                      </tr>
                    <?php }
                    ?>
                  </table>
              </div>
              <button type="button" class="btn btn-support3" onclick="plusRowRegisOnly();"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
              <form id="each_regis_form">
                <table class="tb-pad" width="100%">
                  <tr>
                    <td align="center"><b style="font-size: 16px;">จำนวนคน</b></td>
                    <td align="center" width="170"><b style="font-size: 15px;">ราคา</b></td>
    <!--           <td align="center" width="220px"><b style="font-size: 16px;">ถอด vat%</b></td>-->
                    <td align="center"  width="170"><b style="font-size: 15px;">ภาษี ณ ที่จ่าย</b></td>
                    <td  width="50"></td>
                  </tr>
                  <?php
                  foreach ($query_con_tb->result() as $key => $val) {
                    ?>

                    <tr class="tr_regis_only" id="id_tr_regis_<?=$val->id;?>">
                      <td align="center">
                        <span style="font-size:15px;"><?=$person = $person + 1;?>  คน</span>
                      </td>
                      <td><input class="form-control" type="number" name="f_price" id="regis_only_f_price_<?=$val->id;?>" value="<?=$val->f_price;?>" onkeyup="saveDataKeyupRegis(<?=$val->id;?>);" /></td>
                      <!--<td width="30"></td>-->
                      <td style="display: none;">
                        <input class="form-control" type="number" name="f_vat" id="regis_only_f_vat_<?=$val->id;?>" value="<?=$val->f_vat;?>" onkeyup="saveDataKeyupRegis(<?=$val->id;?>);" />
                      </td>
                      <td>
                        <input class="form-control" type="number" name="f_wht" id="regis_only_f_wht_<?=$val->id;?>" value="<?=$val->f_wht;?>" onkeyup="saveDataKeyupRegis(<?=$val->id;?>);" />
                      </td>
                      <td align="center">
                        <button type="button" class="btn btn-danger button-cus del-row" onclick="deletedRowRegisOnly(<?=$val->id;?>);">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                      </td>
                    </tr>

                    <?php
                  }
                  ?>
                                                                                                                                                                                                        <!--<input type="hidden" value="<?=$i;?>" id="val_num_row" />-->
                </table>
              </form>
            </div>
          </div>
          <?php
        }
        else if ($val->id == 5) {

          if ($con_pack->i_con_plan_main_list <= 0) {
            $_where = array();
            $_where[id] = $con_pack->id;
            $data_up[i_con_plan_main_list] = $val->id;
            $this->db->update(TBL_PLAN_PACK_LIST,$data_up,$_where);
          }

//          $data = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $_GET[shop_id]));
//          $_where = array();
//          $_where[main] = $data->main;
//          $_where[sub] = $data->id;
//          $_where[i_status] = 1;
//          $sub_type_list = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where,'',array('id' => 'asc'));
//          echo "<pre>";
//          print_r($sub_type_list);
//          echo "</pre>";
          ?>
          <div style="<?=$box_other;?>">
            <div class="col-md-12">
              <div class="form-group ">
                <div style="padding: 0px 10px; padding-top: 5px; margin: 10px 0px; border: 1px solid #efe8e8; box-shadow: 1px 1px 3px #e0e0e0;border-radius: 5px;">
                  <h4>ร้านค้า >> ทีแชร์</h3>
                    <table class="table" width="100%" style="margin-bottom: 5px;">
                      <tr>
                        <td  align="center" ><b style="font-size:15px;">รายการ</b></td>
                        <td align="center"><b style="font-size:15px;">ค่าคอม</b></td>
                        <td align="center"><b style="font-size:15px;">ภาษี ณ ที่จ่าย</b></td>
                      </tr>
                      <?php
                      $_where = array();
                      $_where[i_plan_pack] = $con_ref->i_plan_pack;
                      $this->db->select('*');
                      $query_data_product_type = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
                      foreach ($query_data_product_type->result() as $key => $value) {
                        $_where = array();
                        $_where[id] = $value->i_product_sub_typelist;
                        $this->db->select('i_main_typelist');
                        $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
                        $data_pd_sub_typelist = $query->row();


                        $_where = array();
                        $_where[status] = 1;
                        $_where[id] = $data_pd_sub_typelist->i_main_typelist;
                        $this->db->select('topic_th');
                        $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                        $data_pd = $query->row();
                        ?>
                        <tr>
                          <td align="left">
                            <span style="font-size:15px;"><?=$data_pd->topic_th;?></span>
                          </td>
                          <td align="right" width="120"><span style="font-size:15px;"><?=$value->f_price;?> %</span></td>
                          <td align="right" width="120"><span style="font-size:15px;"><?=$value->f_wht;?> %</span></td>
                        </tr>
                      <?php }
                      ?>
                    </table>
                </div>

                <table width="100%" class="tb-pad">
                  <tr>
                    <td style="font-size: 15px;"><b>รายการ</b></td>
                    <td style="width: 150px;font-size: 15px;text-align: center;"><b>ค่าคอม</b></td>
                    <td style="width: 150px;font-size: 15px;text-align: center;"><b>ภาษี ณ ที่จ่าย</b></td>
                  </tr>
                  <?php
                  if ($query_con_tb->num_rows() > 0) {
                    $each_pd_loop = $query_con_tb;
                    $cat = "own";
                  }
                  else {
                    $_where = array();
                    $_where[i_plan_pack] = $con_ref->i_plan_pack;
                    $this->db->select('*');
                    $each_pd_loop = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
//                    $data_pd_sub_typelist = $query->row();
//                    $each_pd_loop = $query;
                    $cat = "prototype";
                  }
//                  echo "<pre>";
//                  print_r($cat." ".$query_con_tb->num_rows());
//                  echo "</pre>";
                  foreach ($each_pd_loop->result() as $key => $value) {

                    $_where = array();
                    $_where[id] = $value->i_product_sub_typelist;
                    $this->db->select('*');
                    $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
                    $data_pd_sub_typelist = $query->row();


                    $_where = array();
                    $_where[status] = 1;
                    $_where[id] = $data_pd_sub_typelist->i_main_typelist;
                    $this->db->select('*');
                    $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                    $data_pd = $query->row();

//                    $_where = array();
////                  $_where[i_status] = 1;
//                    $_where[i_plan_pack] = $_GET[pack_id];
//                    $_where[i_product_sub_typelist] = $value->id;
//                    $this->db->select('*');
//                    $query_pd_typelist = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
//                    $data_con_pd_typelist = $query_pd_typelist->row();

                    if ($value->i_status > 0) {
                      $checked_pd_tl = "checked";
                      $active_box = "active";
                      $val_pd = 1;
                      $disabled_box_price = "";
                      $disabled_box_vat = "";
                      $disabled_box_wht = "";
                    }
                    else {
                      $checked_pd_tl = "";
                      $active_box = "";
                      $disabled_box_price = "disabled";
                      $disabled_box_vat = "disabled";
                      $disabled_box_wht = "disabled";
                      $val_pd = 0;
                    }
                    ?>
                    <tr id="tr_list_type_product_<?=$value->id;?>">
                      <td>
                        <div data-toggle="buttons" >
                          <label class="btn checkbox-inline btn-checkbox-default-inverse <?=$active_box;?>  " onclick="selectProductTypeList(<?=$value->id;?>,<?=$value->i_product_sub_typelist;?>);"><span style="font-size:16px;"> <?=$data_pd->topic_th;?>  </span>                    
                            <input <?=$checked_pd_tl;?> type="checkbox" value="1" id="i_checkbox412" name="i_checkbox_<?=$value->id;?>"> </label>
                        </div>
                        <input id="val_ck_pd_<?=$value->id;?>" type="hidden" value="<?=$val_pd;?>" />
                      </td>
                      <td align="center"><input onkeyup="saveDataComProductType(<?=$value->id;?>);" id="pd_type_f_vat_<?=$value->id;?>" type="number" style="width: 90%;" class="form-control" value="<?=$value->f_vat;?>" <?=$disabled_box_vat;?>></td>
                      <td align="center"><input onkeyup="saveDataComProductType(<?=$value->id;?>);" id="pd_type_f_wht_<?=$value->id;?>" type="number" style="width: 90%;" class="form-control" value="<?=$value->f_wht;?>" <?=$disabled_box_wht;?>></td>
                    </tr>
                  <?php }
                  ?>
                </table>
              </div>
            </div>
          </div>

          <?php
        }
        ?>
      </div>
    <?php }
    ?>

  </div>

</div>

<table class="tb_regis_only">
  <tr class="tr_regis_only" style="display: none;">
    <td align="center">
      <span style="font-size:16px;"><?=$val->id;?>  คน</span>
    </td>
    <td><input class="form-control" type="number" name="f_price" id="regis_only_f_price_<?=$i;?>" value="<?=$con->f_vat;?>" /></td>
    <!--<td width="30"></td>-->
    <td style="display: none;">
      <input class="form-control" type="number" name="f_vat" id="regis_only_f_vat_<?=$i;?>" value="<?=$con->f_vat;?>" />
    </td>
    <td>
      <input class="form-control" type="number" name="f_wht" id="regis_only_f_wht_<?=$i;?>" value="<?=$con->f_wht;?>" />
    </td>
    <td align="center">
      <button type="button" class="btn btn-danger button-cus del-row" onclick="deletedRowRegisOnly();">
        <i class="fa fa-trash-o" aria-hidden="true"></i>
      </button>
    </td>
  </tr>
</table>

<table class="tb_each_person">
  <tr class="tr_ms_clone" style="display: none;">
    <td  align="center">
      <div class="input-group">
        <span class="input-group-addon">จำนวนคน</span>
        <input class="form-control" type="number" name="i_person" id="i_person" value="" style="width:90%;" />
      </div>
    </td>
    <td><span style="">ขึ้นไป</span></td>
    <td align="center">
      <input class="form-control" type="number" name="f_price" id="each_f_price" value="" style="width:80%;" />
    </td>
    <td align="center" style="display: none;">
      <input class="form-control" type="number" name="f_vat" id="each_f_vat" value="" style="width:80%;" />
    </td>
    <td align="center">
      <input class="form-control" type="number" name="f_wht" id="each_f_wht" value="" style="width:80%;" />
    </td>
    <td>
      <button type="button" class="btn btn-danger button-cus del-row" onclick="deletedRowEachPerson();">
        <i class="fa fa-trash-o" aria-hidden="true"></i>
      </button>
    </td>
  </tr>
</table>
<input type="hidden" value="<?=$person;?>" id="chk_click_push_regis" />