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
            <div class="input-group control-width-normal" id="filter-date">
              <input type="text" class="form-control" id="input-date" value="<?=date('Y-m-d');?>">
              <span class="input-group-addon" style="cursor: pointer;"><i class="fa fa-calendar"></i></span>
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

<script>
  openHistoryShopJob($('#input-date').val());
  $('#filter-date').datetimepicker({pickTime: false, format: 'YYYY-MM-DD' }).on("change.dp", function (e) {
    var date = $('#input-date').val();
    console.log(date);
    openHistoryShopJob(date);
  });

  var array_rooms;
  var res_socket;
  var socket = io.connect('https://www.welovetaxi.com:3443');
  var check_run_shop = 0;

  var frist_socket = true;

  socket.on('getbookinglab', function (data) {
//    console.log(data);   
    var done = [];
    var proceed = [];
    var waittrans = [];

//    $('#proceed_job_num').text(data.length);

    var url = base_url + "job/count_shop_job";
    var current = formatDate(new Date());
    var param = {
      date: current
    };

    $.ajax({
      url: url,
      data: param,
      dataType: 'json',
      type: 'post',
      error: function () {
        console.log('Error Profile');
      },
      success: function (res) {
//        console.log(res);
        $('#wait_pay_job_num').text(res.wait_trans);
        $('#count_job').text(res.all);
        $('#all_job_num').text(res.all);
      }
    });
  });

  var dataorder = {
    order: parseInt(153)
  };
  socket.on('connect', function () {
    console.log(dataorder);
    socket.emit('adduser', dataorder);
  });

</script>