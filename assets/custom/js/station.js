// function open_commision(id) {
//     // body...
    
//     commision(id)
//   }

  function fun_add_station() {
    $('#modal_custom').show()
    $('#formModalLabel').html('เพิ่มคิวรถ')
    var url = base_url + "station/add_station";
    // var param = {
    //   id: item
    // }
    console.log(url)

    $.ajax({
      url: url,
      // data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
        console.log('Success Profile');
        $('#dody_modal_custom').html(ele);

      }
    });
  }
  function fun_edit_station(item) {
    $('#modal_custom').show()
    $('#formModalLabel').html('เพิ่มคิวรถ')
    var url = base_url + "station/box_edit_station";
    var param = {
      id: item
    }
    console.log(url)

    $.ajax({
      url: url,
       data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
        console.log('Success Profile');
        $('#dody_modal_custom').html(ele);

      }
    });
  }
  function form_detail_station() {
var url = base_url + "station/save_station?opt=ADD";
  console.log($('#form_station_all').serialize())
  // console.log(form_station_all)
  $.ajax({
    url: url,
    data: $('#form_station_all').serialize(),
    type: 'post',
    error: function() {
      console.log('Error Profile');
    },
    success: function(res) {
      console.log(res)
      if (res.station == true) {
        Command: toastr[res.icon](res.msg)
      }
      else {
        $('#btn_save_price_plann').hide();
        commision($('#manage_com').val())
        $('#box_plan_com').html('');
        _box_plan_comision();
        box_price_plan();
      }



    }
  });
  }