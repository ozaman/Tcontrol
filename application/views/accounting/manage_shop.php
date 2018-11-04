<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $_GET[id]),array('*'));
$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
$num = 0;

$display_person = "display:none";
$display_com = "display:none";
$display_park = "display:none";
$park_total = 0;
$person_total = 0;
$com_total = 0;
foreach ($query_price->result() as $row_price) {
  if ($num >= 1) {
    $push = " + ";
  }
  else {
    $push = "";
  }
  $plan .= $push.$row_price->s_topic_th;
  $num++;
}

$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.i_shop_country_com_list='".$data->plan_id."'    ";
$query_country = $this->db->query($sql_country);
$res_country = $query_country->row();

$sql = "SELECT t4.s_topic_th, t4.i_price from shop_country_company as t1 left join shop_country_icon_company as t2 on t1.id = i_shop_country "
        ." left join shop_country_com_list_company as t3 on t2.id = t3.i_shop_country_icon"
        ." left join shop_country_com_list_price_company as t4 on t3.id = t4.i_shop_country_com_list"
        ." where t1.i_shop = 1 ";
$query = $this->db->query($sql);
$res_com = $query->row();
//    echo $_GET[id];

$sql_dv = "SELECT nickname, name FROM web_driver where id =".$data->drivername;
$query_dv = $this->db->query($sql_dv);
$res_dv = $query_dv->row();
?>
<div class="card">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-outlined">
        <div class="box-head">
          <header><h4 class="text-light">ข้อมูลการจอง</h4></header>
        </div>
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <td><span class="font-16">เลขการจอง</span></td>
              <td><span class="font-16"><?=$data->invoice;?></span></td>
            </tr>
            <tr>
              <td><span class="font-16">วันที่</span></td>
              <td><span class="font-16">2018-11-03</span></td>
            </tr>
            <tr>
              <td><span class="font-16">จำนวน</span></td>
              <td><span class="font-16">ผู้ใหญ่ : 5 เด็ก : 3</span></td>
            </tr>
            <tr>
              <td><span class="font-16">ลงทะเบียน</span></td>
              <td><span class="font-16">5 คน</span></td>
            </tr>
            <tr>
              <td><span class="font-16">ค่าตอบแทน</span></td>
              <td>
                <table  width="100%" id="table_show_income_driver">
                  <tr>
                    <td style="padding: 5px;"  ><span class="font-16">ประเภท</span></td>
                    <td style="padding: 5px;" colspan="2"><span class="font-16" id="txt_type_plan"><?=$plan;?></span></td>
                  </tr>
                  <tr>
                    <td style="padding: 5px;"><span class="font-16">สัญชาติ</span></td>
                    <td style="padding: 5px;" colspan="2">
                      <table>
                        <tr>
                          <td>
                            <img src="<?=base_url();?>assets/img/flag/icon/<?=$res_country->s_country_code;?>.png" width="25" height="25" alt="">
                          </td>
                          <td>&nbsp;</td>
                          <td><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>เอกสาร</td>
              <td>
                <button class="btn" style="font-size:20px;" onclick="showImgModalSrc('../../data/fileupload/store/guest_register_<?=$data->id;?>.jpg?v=<?=time();?>');">
                  <i class="fa fa-file-image-o" aria-hidden="true"></i>
                </button>
               
              </td>
            </tr>
          </table>
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>

    <div class="col-md-6">
      <div class="box box-outlined">
        <div class="box-head">
          <header><h4 class="text-light">ข้อมูลแท็กซี่</h4></header>
        </div>
        <table class="table">
          <tr>
            <td>ชื่อ-สกุล</td>
            <td><?=$res_dv->name;?> <?="(".$res_dv->nickname.")";?></td>
          </tr>
          <tr>
            <td>ทะเบียน</td>
            <td><?=$data->car_plate;?></td>
          </tr>
          <tr>
            <td>เบอร์โทร</td>
            <td><?=$data->phone;?></td>
          </tr>
          <tr>
            <td>ข้อมูลบัญชี</td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-6">
      <div class="box box-outlined">
        <div class="box-head">
          <header><h4 class="text-light">ข้อมูลช้อปปิ้ง</h4></header>
        </div>
        <div class="box-body no-padding">
          <form class="form-horizontal form-bordered" role="form">
            <div class="form-group">
              <div class="col-lg-5 col-md-4 col-sm-3">
                <label for="shop_cost" class="control-label">ยอดช้อปปิ้ง</label>
              </div>
              <div class="col-lg-7 col-md-8 col-sm-9">
                <input type="number" name="shop_cost" id="shop_cost" class="form-control" onkeyup="calcost(this.value);" >
              </div>
            </div>
            <div style="padding: 10px;">
              <b class="font-16">ยอดรวม <span id="price">0</span> บาท</b>
            </div>
          </form>
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>

    <div class="col-md-6">
      <div class="box box-outlined">
        <div class="box-head">
          <header><h4 class="text-light">เอกสารยืนยันการโอน</h4></header>
        </div>
        <div class="box-body no-padding">
          <form class="form-horizontal form-bordered" role="form">
            <div class="form-group">

              <div class="col-lg-7 col-md-8 col-sm-9">
                <input type="file" id="uploadfile" name="uploadfile" onchange="readURLslip(this);" style="opacity: 1;">
              </div>
            </div>
            <div class="form-group" style="display: none;" id="box_preview_slip">
              <div id="" align="center">
                <img src="" width="100px" id="preview_img" style="border: 1px solid #ddd; box-shadow: 1px 1px 5px #615e5c; padding: 2px;cursor: pointer;" onclick="showImgModal('preview_img');">
              </div>
            </div>
            <div class="form-group">
              <table>
                <tr>
                  <td>
                    <span class="font-16">เวลาโอน</span> 
                  </td>
                  <td width="10"></td>
                  <td width="120"><input type="text" value="" class="form-control" id="date_trans" name="date"  autocomplete="off" placeholder="ex..13/07/2018"></td>
                  <td width="10"></td>
                  <td width="120"><input type="text" id="pay_transfer_time" value="" class="form-control time-mask" placeholder="ex..16:54"></td>
                </tr>
              </table>
            </div>
          </form>
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>
  </div>
  
  <div class="row" style="margin-top: 10px;">
    <div class="col-md-6">
      <div class="box box-outlined">
        <div class="box-head">
          <header><h4 class="text-light">รายรับ/รายจ่าย</h4></header>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th style="width:60px" class="text-center"></th>
              <th class="text-left">รายการ</th>
              <th style="width:140px" class="text-right">เปอร์เซ็น</th>
              <th style="width:90px" class="text-right">รวม</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>รายรับ (บริษัท)</td>
              <td class="text-right"><span id="persen_com"><?=$res_com->i_price;?></span> %</td>
              <td class="text-right"><span id="price_company">0</span></td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>รายจ่าย (แท็กซี่)</td>
              <td class="text-right"><span id="persen_taxi"><?=$data->commission_persent;?></span> %</td>
              <td class="text-right"><span id="price_taxi">0</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>