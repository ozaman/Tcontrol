function render_job_shop() {
//  console.log(array_rooms);

  var url = base_url + "job/render_shop";
  var param = { data : array_rooms};
//  console.log(param);
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