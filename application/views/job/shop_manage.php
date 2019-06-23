<ol class="breadcrumb">
  <li class="head_title"><a class="head_title">จัดการงานส่งแขก</a></li>
  <li class="head_title_sub">วันนี้</li>
  <!--	<li class="head_title_sub_2" style="display: none;"><a class="head_title_sub_2"></a></li>
      <li class="head_title_sub_3" style="display: none;" ><a class="head_title_sub_3"></a></li>
      <li class="head_title_sub_4" style="display: none;" ><a class="head_title_sub_4"></a></li>-->
</ol>

<div class="section-body">
  <div class="row"> 
    <div class="col-lg-12">
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-2">
          <a href="<?=base_url();?>job/job_manage_shop" class="btn btn-outline btn-primary btn-block btn-labeled active">
            <span><i class="fa fa-clock-o"></i></span>
            <div>วันนี้</div>
            <span class="label label-warning" id="count_job" style=" top: -10px;right: -7px; font-size: 13px;">0</span> 
          </a>
        </div>
        <div class="col-lg-2">
          <a href="<?=base_url();?>job/job_history_shop" class="btn btn-default btn-block btn-labeled">
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
          <div style="margin-bottom: 15px;">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-primary btn-outline btn-rounded active" onclick="openAllJobShop(1);">
                <input type="radio" name="options" id="all_job" ><span class="label label-danger" id="all_job_num">0</span>  ดำเนินการ 
              </label>
              <!--              <label class="btn btn-primary btn-outline btn-rounded" onclick="openProcessJobShop(2);">
                              <input type="radio" name="options" id="proceed_job" ><span class="label label-danger" id="proceed_job_num">0</span> ดำเนินการ
                            </label>-->
              <label class="btn btn-primary btn-outline btn-rounded" onclick="openWaitPayJobShop(3);">
                <input type="radio" name="options" id="wait_pay_job" ><span class="label label-danger" id="wait_pay_job_num">0</span> งานรอโอน
              </label>
            </div>
          </div>
          <input type="hidden" id="check_func_now" value="1" />
          <div class="row">
            <div class="col-lg-12" id="body_list_shop_realtime">
              <h3 style="color: #FF0000;">ไม่มีรายการ</h3>
            </div>
            <div class="col-lg-12" id="body_list_shop_history">
            </div>
          </div><!--end .row -->
        </div><!--end .box-body -->
      </div><!--end .box -->
    </div>
  </div>
</div>
<script>
  var array_rooms = [];
  var res_socket;
  var socket = io.connect('https://www.welovetaxi.com:3443');
  var check_run_shop = 0;

  var frist_socket = true;

  var current = formatDate(new Date());
  countJob(current);

//  $.ajax({
//    url: base_url + "job/get_id_web_driver",
//    dataType: 'json',
//    type: 'post',
//    success: function (res) {
//      console.log(res);
//      if(res.admin >0 ){
//        connectSocket(res.dv);
//        socketEachdata();
//      }else{
//        connectSocket(0);
//        socketAlldata();
//      }
//      
//    }
//  });
  
//  function connectSocket(id){
//    var dataorder = {
//        order: parseInt(id)
//      };
//      socket.on('connect', function () {
//        console.log(dataorder);
//        socket.emit('adduser', dataorder);
//      });
//  }
//  
//  function socketEachdata() {
//    socket.on('getbookinglab', function (data) {
//      console.log(data)
//      array_rooms = data;
//      array_rooms = [];
//      console.log(array_rooms);
//      var chk_menu = $('#check_func_now').val();
//      if (chk_menu == 1) {
//        render_job_shop();
//      }
//    });
//  }
//  function socketAlldata() {
//    socket.on('monitor', function (rooms, data) {
//      array_rooms = [];
//      // console.log('in case monitor')
//      array_rooms = data;
//      // console.log(all_data)
////      array_rooms = data;
//      console.log(array_rooms);
//      var chk_menu = $('#check_func_now').val();
//      if (chk_menu == 1) {
//        render_job_shop();
//      }
//    });
//  }
  
  
  var dataorder = {
        order: parseInt(1)
      };
      socket.on('connect', function () {
//        console.log(dataorder);
        socket.emit('adduser', dataorder);
      });
      
  socket.on('monitor', function (rooms, data) {
      array_rooms = [];
      // console.log('in case monitor')
      array_rooms = data;
      // console.log(all_data)
//      array_rooms = data;
      console.log(array_rooms);
      var chk_menu = $('#check_func_now').val();
      if (chk_menu == 1) {
        render_job_shop();
      }
    });
</script>