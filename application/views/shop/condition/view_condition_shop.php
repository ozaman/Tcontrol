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
//echo $partner_g;
$_where = array();
$_where[i_plan_main] = $_GET[plan_main];
$this->db->select('*');
$query = $this->db->get_where(TBL_PLAN_MAIN_LIST,$_where);
//echo $_GET[plan_main];
//exit();
//echo "<pre>";
//print_r($query->result());
//echo "</pre>"; 
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

    $person = 0;
    
    foreach ($query->result() as $key => $val) {
      $tbl = $val->s_tbl;
      $_where = array();
      $_where[i_plan_pack] = $_GET[pack_id];
      $this->db->select('*');
      $query_con_tb = $this->db->get_where($tbl,$_where);
      $con = $query_con_tb->row();

      if ($con_pack->i_con_plan_main_list == $val->id) {
        $selected = "checked";
        $open_box = "";
//        if ($partner_g > 1) {
//          $box_other = "";
//        }
//        else {
//          $box_other = "";
//        }
      }
      else {
        $selected = "";
        $open_box = "display:none;";
//        if ($partner_g > 1) {
//          $box_other = "display:none;";
//        }
//        else {
//          $box_other = "";
//        }
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
            <button type="button" class="btn btn-support3" onclick="plusRowEachPerson();"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
            <div class="row outbox" id="box_set_<?=$val->id;?>" style="<?=$open_box;?>">
              <div class="col-md-12">
                <form id="each_person_form">
                  <table class="tb-pad" width="100%">
                    <tr>
                      <td></td>
                      <td></td>
                      <td align="center"><b style="font-size: 16px;">จำนวน</b></td>
                      <td align="center" ><b style="font-size: 16px;">ถอด vat%</b></td>
                      <td align="center"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></td>
                    </tr>
                    <?php foreach ($query_con_tb->result() as $key => $con) { ?>
                      <tr class="tr_ms_clone" id="id_tr_each_ps_<?=$val->id;?>">
                        <td  align="center">
                          <div class="input-group">
                            <span class="input-group-addon">จำนวนคน</span>
                            <input class="form-control" type="number" name="i_person" id="each_person_i_person_<?=$con->id;?>" value="<?=$con->i_person_up;?>" style="width:90%;" onkeyup="saveDataKeyupEachps(<?=$con->id;?>);" />
                          </div>
                        </td>
                        <td><span style="">ขึ้นไป</span></td>
                        <td align="center">
                          <input class="form-control" type="number" name="f_price" id="each_person_f_price_<?=$con->id;?>" value="<?=$con->f_price;?>" style="width:80%;" onkeyup="saveDataKeyupEachps(<?=$con->id;?>);" />
                        </td>
                        <td align="center">
                          <input class="form-control" type="number" name="f_vat" id="each_person_f_vat_<?=$con->id;?>" value="<?=$con->f_vat;?>" style="width:80%;" onkeyup="saveDataKeyupEachps(<?=$con->id;?>);" />
                        </td>
                        <td align="center">
                          <input class="form-control" type="number" name="f_wht" id="each_person_f_wht_<?=$con->id;?>" value="<?=$con->f_wht;?>" style="width:80%;" onkeyup="saveDataKeyupEachps(<?=$con->id;?>);" />
                        </td>
                        <td>
                          <button type="button" class="btn btn-danger button-cus del-row" onclick="deletedRowEachPerson(<?=$con->id;?>);">
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
          $this->db->select('*');
          $query = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
          ?>
          <div style="<?=$box_other;?>">
            <label class="container-rd" ><?=$val->s_topic;?>
              <input <?=$selected;?> type="radio" name="condition_type" value="<?=$val->id;?>" onclick="selectOptionSet('<?=$val->id;?>');"  class="radio-check">
              <span class="checkmark"></span>
            </label>

            <div style="padding-top: 5px;padding-left: 25px;padding-right: 25px;<?=$open_box;?>" id="box_set_<?=$val->id;?>" class="outbox">
              <table width="100%">
                <tr>
                  <th style="text-align: left;"><b style="font-size: 16px;">รายการ</b></th>
                  <th style="text-align: center;"><b style="font-size: 16px;">ราคา</b></th>
                  <th style="text-align: center;"><b style="font-size: 16px;">ถอด vat%</b></th>
                  <th style="text-align: center;"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></th>
                </tr>
                <?php
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
                  ?>
                  <tr id="tr_list_type_car_<?=$val->id;?>" >
                    <td>
                      <div data-toggle="buttons">
                        <label class="btn checkbox-inline btn-checkbox-default-inverse <?=$active_box;?>" onclick="openListTypeCar('<?=$val->id;?>');">
                          <span style="font-size:14px;"><?=$val->name_th;?></span>
                          <input type="checkbox" value="<?=$val->id;?>" role="<?=$val->name_th;?>"> </label>
                      </div>
                      <input type="hidden" value="<?=$val_chk;?>" id="val_ck_<?=$val->id;?>" />
                    </td>
                    <td align="center">
                      <input class="form-control" id="car_price_<?=$val->id;?>" onkeyup="saveDataKeyup(<?=$val->id;?>, 'price');" type="number" value="<?=$data_car->f_price;?>" style="width:200px;" <?=$disabled_box_price;?> />
                    </td>
                    <td align="center">
                      <input class="form-control" id="car_vat_<?=$val->id;?>" onkeyup="saveDataKeyup(<?=$val->id;?>, 'vat');" type="number" value="<?=$data_car->f_vat;?>" style="width:200px;" <?=$disabled_box_vat;?> />
                    </td>
                    <td align="center">
                      <input class="form-control" id="car_wht_<?=$val->id;?>" onkeyup="saveDataKeyup(<?=$val->id;?>, 'wht');" type="number" value="<?=$data_car->f_wht;?>" style="width:200px;" <?=$disabled_box_wht;?> />
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
                <form id="each_all_case_form">
                  <table class="tb-pad" width="100%">
                    <tr>
                      <td align="center"><b style="font-size: 16px;">คนละ</b></td>
                      <td></td>
                      <td align="center" width="220px"><b style="font-size: 16px;">ถอด vat%</b></td>
                      <td></td>
                      <td align="center"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="input-group">
                          <span class="input-group-addon">จำนวน</span>
                          <input class="form-control" type="number" name="f_price" id="allpay_f_price" value="<?=$con->f_price;?>" />
                        </div>
                      </td>
                      <td width="30"></td>
                      <td>
                        <input class="form-control" type="number" name="f_vat" id="allpay_f_vat" value="<?=$con->f_vat;?>" />
                      </td>
                      <td width="30"></td>
                      <td>
                        <input class="form-control" type="number" name="f_wht" id="allpay_f_wht" value="<?=$con->f_wht;?>" />
                      </td>
                      <td>
                        <button type="button" class="btn btn-success button-cus" onclick="saveAllpay();"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                        </button>
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
            <div style="padding-top: 5px;padding-left: 25px;padding-right: 25px;<?=$open_box;?>" id="box_set_<?=$val->id;?>" class="outbox">
              <button type="button" class="btn btn-support3" onclick="plusRowRegisOnly();"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
              <form id="each_regis_form">
                <table class="tb-pad" width="100%">
                  <tr>
                    <td align="center"  width="80"><b style="font-size: 16px;">จำนวนคน</b></td>
                    <td></td>
                    <td align="center"><b style="font-size: 16px;">ราคา</b></td>
                    <td></td>
                    <td align="center" width="220px"><b style="font-size: 16px;">ถอด vat%</b></td>
                    <td></td>
                    <td align="center"><b style="font-size: 16px;">ภาษี ณ ที่จ่าย</b></td>
                  </tr>
                  <?php
//                if ($query_con_tb->num_rows() > 0) {

                  foreach ($query_con_tb->result() as $key => $val) {
                    ?>

                    <tr class="tr_regis_only" id="id_tr_regis_<?=$val->id;?>">
                      <td align="center">
                        <span style="font-size:16px;"><?=$person = $person + 1;?>  คน</span>
                      </td>
                      <td width="30"></td>
                      <td><input class="form-control" type="number" name="f_price" id="regis_only_f_price_<?=$val->id;?>" value="<?=$val->f_price;?>" onkeyup="saveDataKeyupRegis(<?=$val->id;?>);" /></td>
                      <td width="30"></td>
                      <td>
                        <input class="form-control" type="number" name="f_vat" id="regis_only_f_vat_<?=$val->id;?>" value="<?=$val->f_vat;?>" onkeyup="saveDataKeyupRegis(<?=$val->id;?>);" />
                      </td>
                      <td width="30"></td>
                      <td>
                        <input class="form-control" type="number" name="f_wht" id="regis_only_f_wht_<?=$val->id;?>" value="<?=$val->f_wht;?>" onkeyup="saveDataKeyupRegis(<?=$val->id;?>);" />
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger button-cus del-row" onclick="deletedRowRegisOnly(<?=$val->id;?>);">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                      </td>
                    </tr>

                    <?php
                  }
//                }
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
          $data = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,array('id' => $_GET[shop_id]));
          $_where = array();

          $_where[main] = $data->main;
          $_where[sub] = $data->id;
          $_where[i_status] = 1;
          $sub_type_list = $this->Main_model->fetch_data('','',TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where,'',array('id' => 'asc'));
//          echo "<pre>";
//          print_r($sub_type_list);
//          echo "</pre>";
          ?>
          <div style="<?=$box_other;?>">
            <div class="col-md-12">
              <div class="form-group ">
                <table width="100%" class="tb-pad">
                  <tr>
                    <td style="font-size: 16px;"><b>รายการ</b></td>
                    <td style="width: 150px;font-size: 16px;text-align: center;"><b>ถอด Vat %</b></td>

                    <td style="width: 150px;font-size: 16px;text-align: center;"><b>ค่าคอม %</b></td>

                    <td style="width: 150px;font-size: 16px;text-align: center;"><b>ภาษี ณ ที่จ่าย</b></td>
                  </tr>
                  <?php
//                echo count($sub_type_list);
                  foreach ($sub_type_list as $key => $value) {
                    $_where = array();
                    $_where[status] = 1;
                    $_where[id] = $value->i_main_typelist;
                    $this->db->select('*');
                    $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
                    $data_pd = $query->row();

                    $_where = array();
//                  $_where[i_status] = 1;
                    $_where[i_plan_pack] = $_GET[pack_id];
                    $_where[i_product_sub_typelist] = $value->id;
                    $this->db->select('*');
                    $query_pd_typelist = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
                    $data_con_pd_typelist = $query_pd_typelist->row();

//                  echo $query_pd_typelist->num_rows()." ++";
                    if ($data_con_pd_typelist->i_status > 0) {
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
                        <div data-toggle="buttons" onclick="selectProductTypeList(<?=$value->id;?>);">
                          <label class="btn checkbox-inline btn-checkbox-default-inverse <?=$active_box;?>  "><span style="font-size:16px;"><?=$data_pd->topic_th;?>  </span>                    
                            <input <?=$checked_pd_tl;?> type="checkbox" value="1" id="i_checkbox412" name="i_checkbox412"> </label>
                        </div>
                        <input id="val_ck_pd_<?=$value->id;?>" type="hidden" value="<?=$val_pd;?>" />
                      </td>
                      <td align="center"><input onkeyup="saveDataComProductType(<?=$value->id;?>);" id="pd_type_f_price_<?=$value->id;?>" type="number" style="width: 90%;" class="form-control" value="<?=$data_con_pd_typelist->f_price;?>" <?=$disabled_box_price;?>></td>
                      <td align="center"><input onkeyup="saveDataComProductType(<?=$value->id;?>);" id="pd_type_f_vat_<?=$value->id;?>" type="number" style="width: 90%;" class="form-control" value="<?=$data_con_pd_typelist->f_vat;?>" <?=$disabled_box_vat;?>></td>
                      <td align="center"><input onkeyup="saveDataComProductType(<?=$value->id;?>);" id="pd_type_f_wht_<?=$value->id;?>" type="number" style="width: 90%;" class="form-control" value="<?=$data_con_pd_typelist->f_wht;?>" <?=$disabled_box_wht;?>></td>
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
    <td width="30"></td>
    <td><input class="form-control" type="number" name="f_price" id="regis_only_f_price_<?=$i;?>" value="<?=$con->f_vat;?>" /></td>
    <td width="30"></td>
    <td>
      <input class="form-control" type="number" name="f_vat" id="regis_only_f_vat_<?=$i;?>" value="<?=$con->f_vat;?>" />
    </td>
    <td width="30"></td>
    <td>
      <input class="form-control" type="number" name="f_wht" id="regis_only_f_wht_<?=$i;?>" value="<?=$con->f_wht;?>" />
    </td>
    <td>
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
    <td align="center">
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
<?php
//if($person)
?>
<input type="hidden" value="<?=$person;?>" id="chk_click_push_regis" />