<?php
$partner_g = $_POST[partner_g];
session_start();
$_where = array();
$_where['i_status'] = 1;
$_select = array('*');
$_order = array();
$_order['id'] = 'asc';
$PLAN_MAIN = $this->Main_model->fetch_data('','',TBL_PLAN_MAIN,$_where,$_select,$_order);

$_where = array();
$_where[id] = $_SESSION['admin_use'];
$_select = array('i_partner');
$WEB_ADMIN = $this->Main_model->rowdata(TBL_WEB_ADMIN,$_where,$_select);
// print_r(json_encode($WEB_ADMIN));
$_where = array();
$_where['i_status'] = 1;
$_select = array('*');

$_order = array();
$_order['id'] = 'asc';
$PAY_TYPE = $this->Main_model->fetch_data('','',TBL_PAY_TYPE,$_where,$_select,$_order);
?>
<!--  -->

<div class="box box-outlined">
  <div class="col-lg-12">
    <div class="box-head">
      <header><h4 class="text-light">เพิ่มค่าตอบแทน</h4></header>
      <input type="hidden" name="" id="id_shop_product" value="<?=$_POST[id];?>">
      <input type="hidden" name="" id="partner_g" value="<?=$partner_g;?>">
    </div>
    <div class="box-body ">
      <div class="form-group form-group-md">


        <div class="col-md-12">
          
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-11">

                <div class="form-group">
                  <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 160px;">เลือกสัญชาติ</span>
                    <select name="select_country" class="form-control" id="select_country" onchange="selectCountry(<?=$partner_g;?>,<?=$_POST[id];?>,this.value);">
                      <option value="">- เลือกสัญชาติ -</option>
                      <?php
                      
                      if ($partner_g == 1) {
                        foreach ($country as $key => $val) {
                          ?>
                          <option value="<?=$val->id;?>" ><?=$val->name_th;?></option>
                          <?php
                        }
                      }
                      
                      else {
                        $_where = array();
                        $_where[i_status] = 1;
                        $_where[i_shop] = $_POST[id];
                        $_where[i_partner] = 2;
                        $this->db->select('*');
                        $this->db->group_by('i_country');
                        $query = $this->db->get_where(TBL_PLAN_PACK,$_where);
                         foreach ($query->result() as $key => $val) {
                            $_where = array();
                            $_where[id] = $val->i_country;
                            $this->db->select('*');
                            $query_country = $this->db->get_where(TBL_WEB_COUNTRY,$_where);
                            $data_country = $query_country->row();
                          ?>
                          <option value="<?=$data_country->id;?>" ><?=$data_country->name_th;?></option>
                          <?php
                        }
                        
                      }
                      
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-1" align="right">
                <button type="button" class="btn btn-primary btn-md"   onclick="submit_planpack('<?=$_POST[id];?>', '<?=$_SESSION['admin_use'];?>', '<?=$partner_g;?>')" style="width: 100%"> 
                  <span id="txt_btn_save5"> เพิ่ม </span>
                </button>
              </div>
              <!-- <div id="box_com_add"> -->

              <!-- </div> -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="padding: 0px 20px;">
              <div class="form-group" id="area_plan_select">
                
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="box-head">
              <header><h4 class="text-light">จัดการค่าตอบแทน</h4></header>
            </div>
            <div class="col-md-12">

              <div id="box_com_add">

              </div>
            </div>
          </div>
          
        </div>

      </div>
      <!-- </form> -->
    </div><!--end .box-body -->
  </div><!--end .box -->
</div>
<script>
  var param;
  function change_region(item) {
    // console.log(item)
    var data_country = JSON.parse('<?=json_encode($country);?>');
    // console.log(data_country[item])

    param = {
      id: data_country[item].id,
      name_en: data_country[item].name_en,
      name_th: data_country[item].name_th,
      name_cn: data_country[item].name_cn,
      country_code: data_country[item].country_code,
      i_shop: '<?=$_POST[id];?>'
    }
    console.log(param)

  }
  //          init('<?=$_POST[id];?>','<?=$_GET[option];?>')
  function init(item, options) {
    var url2 = base_url + "shop/get_region?option=" + options;
    var param = {
      i_shop: item
    }
    console.log('************************************')
    console.log(url2)
    $.ajax({
      url: url2,
      data: param,
      type: 'post',
      error: function () {
        console.log('Error Profile');
      },
      success: function (ele) {
        // console.log(ele);
        $('#box_com_add').html(ele);

      }
    });
    // var url3 = base_url+ "shop/get_car_price?option="+options;

    // $.ajax({
    //     url: url3,
    //     data: param,
    //     type: 'post',
    //     error: function() {
    //         console.log('Error Profile');
    //     },
    //     success: function(ele) {
    //         // console.log(ele);
    //         $('#box_car_add').html(ele);

    //     }
    // });
  }



</script>