
function render_job_shop() {
  var url = base_url + "job/render_shop";
  var param = {data: array_rooms};
  console.log(param);
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      $('#body_list_shop_realtime').html(ele);
    }
  });

}

function formatDate(date) {
  var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();
  if (month.length < 2)
    month = '0' + month;
  if (day.length < 2)
    day = '0' + day;
  return [year, month, day].join('-');
}

function openAllJobShop(val) {
  $('#check_func_now').val(val);

  $('#body_list_shop_realtime').html(loader);
  render_job_shop();
}

//function openProcessJobShop(val) {
//  $('#check_func_now').val(val);
//  $('#body_list_shop_realtime').html(loader);
//}

function openWaitPayJobShop(val) {
  $('#check_func_now').val(val);
  var url = base_url + "api/shop_wait_trans_shop";
//  var param = {data: array_rooms};
//  console.log(param);
  $('#body_list_shop_realtime').html(loader);
  var post = {
    date: formatDate(new Date())
  };
  $.ajax({
    url: url,
    data: post,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      var url = base_url + "job/render_shop";
      var param = res;
      $.ajax({
        url: url,
        data: param,
        type: 'post',
        error: function () {
          console.log('Error Profile');
        },
        success: function (ele) {
          $('#body_list_shop_realtime').html(ele);
        }
      });
    }
  });
}

function openHistoryShopJob(date) {
  console.log(date);
  $('#body_list_shop_hise').html(loader);
  var url = base_url + "api/shop_history_fix";
  var param = {
    date: date,
    class_name: "lab"
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
      console.log(res);
      var url = base_url + "job/render_shop_his";
      $.ajax({
        url: url,
        data: res,
        type: 'post',
        success: function (ele) {
          $('#body_list_shop_hise').html(ele);
        }
      });
    }
  });
}

function countJob(date) {
  var url = base_url + "job/count_shop_job";

  var param = {
    date: date
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
      console.log(res);
      $('#wait_pay_job_num').text(res.wait_trans);
      $('#count_job').text(res.all);
      $('#all_job_num').text(res.process);
    }
  });
}

function viewDetailWorkstep(order_id, type) {
//  $('#modal_custom_3').show();
  $('#title_md_modal').text('ตรวจสอบการทำงาน');
  var url = base_url + "job/view_detail_work";
  var param = {
    order_id: order_id,
    type: type
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
      console.log(res);
      
    }
  });
}