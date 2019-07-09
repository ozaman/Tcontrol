<style>
  #input-date{
    /*display: block;*/
    /*width: 100%;*/
    height: 32px;
    padding: 6px 12px;
    font-size: 13px;
    line-height: 1.428571429;
    color: #555555;
    background-color: #f7f7f7;
    background-image: none;
    border: 1px solid #bfbfbf;
    border-radius: 0px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    cursor: pointer;
  }
</style>
<ol class="breadcrumb">
  <li class="head_title"><a class="head_title">จัดการงานส่งแขก</a></li>
  <li class="head_title_sub">ประวัติ</li>
  <!--<li class="head_title_sub_2" style="display: none;"><a class="head_title_sub_2"></a></li>
  <li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
  <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>-->
</ol>
<div class="section-body">
  <div class="row"> 
    <div class="col-lg-12">
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-2">
          <a href="<?=base_url();?>job/job_manage_shop" class="btn btn-default btn-block btn-labeled ">
            <span><i class="fa fa-clock-o"></i></span>
            <div>วันนี้</div>
            <span class="label label-warning" id="count_job" style=" top: -10px;right: -7px; font-size: 13px;">0</span> 
          </a>
        </div>
        <div class="col-lg-2">
          <a href="<?=base_url();?>job/job_history_shop" class="btn btn-outline btn-primary btn-block active">
            <span><i class="fa fa-calendar"></i></span>
            <div>ประวัติ</div>
            <span class="label label-danger"></span> 
          </a>
        </div>
      </div>
      <div class="box">
        <div class="box-head style-inverse">
          <header><h4 class="text-light"><i class="fa icon-app-uniF13C fa-fw"></i> <strong>บริการส่งแขก</strong></h4></header>
        </div>
        <div class="box-body">
          <div style="margin-bottom: 15px;" class="col-md-3">
            <!--            <div class="input-group control-width-normal" id="filter-date">
                          <input type="text" class="form-control" id="input-date" value="<?=date('Y-m-d');?>">
                          <span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-calendar"></i></span>
                        </div>-->
            <div class="control-group">
              <!--<label class="control-label">Date Picking</label>-->
              <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                <input size="16" type="text" value="<?=date('Y-m-d');?>" readonly id="input-date">
                <span class="add-on"><i class="icon-remove"></i></span>
                <span class="add-on"><i class="icon-th"></i></span>
              </div>
              <input type="hidden" id="dtp_input2" value="" /><br/>
            </div>
          </div>
          <input type="hidden" id="check_func_now" value="1" />

          <div class="row">
            <div class="col-lg-12" id="body_list_shop_hise">
            </div>
          </div><!--end .row -->
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>
  </div>
</div>
<?php
session_start();
$_where = array();
$_where[id] = $_SESSION['admin_use'];
$this->db->select('product_id');
$admins = $this->db->get_where(TBL_WEB_ADMIN,$_where);
$admin = $admins->row();

//if ($admin->product_id > 0) {
//  $_where = array();
//  $_where[i_company] = $admin->product_id;
//  $this->db->select('id, username');
//  $dvs = $this->db->get_where(TBL_WEB_DRIVER,$_where);
//  $dv = $dvs->row();
////  $return[dv] = $dv;
//}
?>

<script>
  $('.form_date').datetimepicker({
    language: 'th',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  }).on("change.dp", function (e) {
    var date = $('#input-date').val();
    console.log(date);
    openHistoryShopJob(date);
  });
  openHistoryShopJob($('#input-date').val());
//  $('#filter-date').datetimepicker({pickTime: false, format: 'YYYY-MM-DD',todayHighlight: 1 });

//  $('#filter-date').datetimepicker({pickTime: false, format: 'YYYY-MM-DD',todayHighlight: true }).on("change.dp", function (e) {
//    var date = $('#input-date').val();
//    console.log(date);
//    openHistoryShopJob(date);
//  });


  var array_rooms = [];
  var res_socket;
  var socket = io.connect('https://www.welovetaxi.com:3443');
  var check_run_shop = 0;

  var frist_socket = true;

  var current = formatDate(new Date());


  var id = '<?=$admin->product_id;?>';

  console.log("++++++++++++++++++++");
  console.log(id);
//  if (id > 0) {
//    console.log('company');
//    var socket_txt = 'usercompany';
//  } else {
//    console.log('monitor');
//    var socket_txt = 'monitor';
//  }

  var dataorder = {
//    order: parseInt(id),
    company_id: parseInt(id)

  };

//  socket.on('connect', function () {
//    console.log(dataorder);
//    socket.emit('usercompany', dataorder);
//  });

  setInterval(function () {
    countJob(current);
//    socket.emit('usercompany', dataorder);

  }, 3000);
//
//  socket.on('CONMONITOR', function (rooms, data) {
//    countJob(current);
//    array_rooms = [];
//    // console.log('in case monitor')
//    array_rooms = data;
//    // console.log(all_data)
////      array_rooms = data;
//    console.log(array_rooms);
//    var chk_menu = $('#check_func_now').val();
//    if (chk_menu == 1) {
//      render_job_shop();
//    }
//  });
</script>