// callinit();
var param_plan_price,
day, obj_day;
var option = '';
// shop('categorie')
// box_region_show()
function _box_region_show(item,options) {
  console.log(item)
  console.log(options)
  $('#section_state').val(options)
  option = options;
  var url = base_url + "shop/box_region_show?option="+options;
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
             //console.log(ele);
             $('.box_region_show').html(ele);

           }
         });
}
function get_shop_all() {
    // alert('aaaaa')
    // console.log(username);
    // $('#head_title').html('จัดการร้านค้า')
    // $('#head_title_sub').html('ร้านค้าทั้งหมด')
    // $('#head_title_sub_2').hide()
    // $('.head_title_sub_3').hide()

    // $('.head_title_sub_4').hide()

    var url = base_url + "shop/data_shop_all?option="+option;
    $.post(url, function(ele) {
      $('#body_page_call').html(ele);
    });

  }

  function get_categories_sub(item) {
    // $('.head_title').html('จัดการร้านค้า')
    // $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    // $('.head_title_sub_2').show()
    // $('.head_title_sub_2').html('ประเภทหมวดหมู่ ')
    // $('.head_title_sub_3').hide()
    // $('.head_title_sub_4').hide()

    var url = base_url + "shop/categorie_sub?option="+option;
    var param = {
      id: item
    }

    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
        console.log('Success Profile');
        $('#body_page_call').html(ele);

      }
    });
  }

  function get_shop_ordertype(item) {
    // $('.head_title').html('จัดการร้านค้า')
    // $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    // $('.head_title_sub_2').show()
    // $('.head_title_sub_2').html('ช้อปปิ้งทั้งหมด ')
    // $('.head_title_sub_3').show()
    // $('.head_title_sub_4').hide()

    // $('.head_title_sub_3').html('ร้านช้อปปิ้งทั้งหมด')
    var url = base_url + "shop/shop_ordertype?option="+option;
    var param = {
      id: item
    }

    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
        console.log('Success Profile');
        $('#body_page_call').html(ele);

      }
    });
  }

  function manage_shop_ordertype(item) {
    // $('.head_title').html('จัดการร้านค้า')
    // $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    // $('.head_title_sub_2').show()
    // $('.head_title_sub_2').html('ช้อปปิ้งทั้งหมด ')
    // $('.head_title_sub_3').show()
    // $('.head_title_sub_4').show()
    // $('.head_title_sub_3').html('ร้านช้อปปิ้งทั้งหมด')
    // $('.head_title_sub_4').html('จัดการร้านช้อปปิ้ง')
    var url = base_url + "shop/shop_manage?option="+option;
    var param = {
      id: item
    }

    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
        console.log('Success Profile');
        $('#body_page_call').html(ele);

      }
    });
  }

  function open_commision(id) {
    // body...
    $('#modal_custom').show()
    commision(id)
  }

  function commision(item) {
    // alert('aaaaaa')
    // $('#modal_custom').show()
    // $('.head_title').html('จัดการร้านค้า')
    //  $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    //  $('.head_title_sub_2').show()
    //  $('.head_title_sub_2').html('ช้อปปิ้งทั้งหมด ')
    //  $('.head_title_sub_3').show()
    //  $('.head_title_sub_4').show()
    //  $('.head_title_sub_3').html('ร้านช้อปปิ้งทั้งหมด')
    //  $('.head_title_sub_4').html('จัดการร้านช้อปปิ้ง')
    var url = base_url + "shop/shop_manage_com?option="+option;
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

  

  function submit_region(item) {
    console.log(param)
    var url = base_url + "shop/add_region?option="+option;
    console.log(url)
    // return false;
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        Command: toastr["success"]("เพิ่มสัญชาติสำเร็จ")
        var url2 = base_url + "shop/get_region?option="+option;
        var param = {
          i_shop: item
        }
        console.log(url2)
        $.ajax({
          url: url2,
          data: param,
          type: 'post',
          error: function() {
            console.log('Error Profile');
          },
          success: function(ele) {
                    // console.log(ele);
                    $('#box_com_add').html(ele);

                  }
                });

      }
    });
  }

  function submit_region_sub(id) {
    $('#modal_custom_2').show()
    $('#title_add_region_sub').html('เพ่ิมสัญชาติ')
    var url = base_url + "shop/get_region_sub?option="+option;
    var param = {
      country_id: id
    }
    // console.log(country)
    console.log(id)
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
            // console.log(ele);
            $('#dody_modal_custom_2').html(ele);
            $('#id_country').val(id);
            // $('#btn_region_sub'+id).attr('onclick','save_region_sub('+id+')');

          }
        });


  }

  function close_modal_custom(opt) {
    console.log(opt)
    if (opt == 'shop_manage') {
      $('#modal_custom').hide(500)
    }
    if (opt == 'shop_manage_sub') {
      $('#modal_custom_2').hide(500)
    }
    if (opt == 'plan_price') {
      $('#modal_custom_3').hide(500)
    }

  }

  function save_region_sub() {
    var url = base_url + "shop/add_region_sub?option="+option;
    // console.log(shop)
    // console.log(id_shop_country)
    param.i_shop = $('#id_shop_product').val();
    param.id_shop_country = $('#id_country').val();
    console.log(param)
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
            // console.log(ele);
            Command: toastr["success"]("เพิ่มสัญชาติสำเร็จ")
            
            commision($('#manage_com').val())
            _box_region_icon()
            _box_select_region_icon()
            // $('.box_sub_region'+id).html(ele);
            // $('#btn_region_sub'+id).attr('onclick','save_region_sub('+shop+','+id_shop_country+')');

          }
        });
    // body...
  }
// function save_plan_price() {
//     var url = base_url+ "shop/add_plan_price";
//     // console.log(shop)
//     // console.log(id_shop_country)

//     console.log(param_plan_price)
//     $.ajax({
//         url: url,
//         data: param_plan_price,
//         type: 'post',
//         error: function() {
//             console.log('Error Profile');
//         },
//         success: function(res) {
//             console.log(res);
//             param_plan_price = ''
//             console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa--------------------------***********************************')
//              commision($('#manage_com').val())
//             if (res == true) {
//                var url = base_url+ "shop/get_region_sub";
//                var param = {
//                 country_id: $('#id_country').val()
//             }
//             $.ajax({
//                 url: url,
//                 data: param,
//                 type: 'post',
//                 error: function() {
//                     console.log('Error Profile');
//                 },
//                 success: function(ele) {
//                     // commision($('#manage_com').val())
//                    $('#dody_modal_custom_2').html(ele);


//                }
//            });
//         }
//     }

// });
//     // body...
// }

function save_plan_price() {
  var url = base_url + "shop/save_plan_price?option="+option;
  console.log($('#plan_com_price').serialize())
  console.log(param_plan_price)
  $.ajax({
    url: url,
    data: $('#plan_com_price').serialize(),
    type: 'post',
    error: function() {
      console.log('Error Profile');
    },
    success: function(res) {
      console.log(res)
      if (res == '') {
        Command: toastr["warning"]("กรุณาเลือกช่องทางการจ่ายเงิน")
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


function get_plan_price_sub(id) {
  console.log(id)
  $('#modal_custom_3').show();
  var url = base_url + "shop/get_plan_price_sub?option="+option;
    // console.log(shop)
    // console.log(id_shop_country)
    var param = {
      i_shop_country_com: id,
      i_shop_country: $('#id_country').val()
    }
    // $('#i_shop_country_com').val(id)
    // param.i_shop_country_com = $('#id_shop_product').val();
    // param.id_shop_country =  $('#id_country').val();
    console.log(param)
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
            //console.log(ele);
            $('#dody_modal_custom_3').html(ele);
            // $('#btn_region_sub'+id).attr('onclick','save_region_sub('+shop+','+id_shop_country+')');

          }
        });
    // body...
  }




  function save_plan_price_sub(id) {
    var url = base_url + "shop/add_plan_price_sub?option="+option;
    // console.log(shop)
    // console.log(id_shop_country)

    console.log(param_plan_price)
    // param_plan_price.i_shop_country_com = id;
    $.ajax({
      url: url,
      data: param_plan_price,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        param_plan_price = ''
            // if (res == true) {
            //      var url = "shop/get_region_sub";
            //     var param = {
            //         country_id: $('#id_country').val()
            //     }
            //     $.ajax({
            //         url: url,
            //         data: param,
            //         type: 'post',
            //         error: function() {
            //             console.log('Error Profile');
            //         },
            //         success: function(ele) {

            //          $('#dody_modal_custom_2').html(ele);


            //      }
            //  });
            // }
          }

        });
    // body...
  }
  function updatetype(id, values,op,icom) {

    var url = base_url + "shop/updatetype?option="+option;

    console.log(url)
    console.log(id)
    console.log(values)
    console.log(op)
    console.log($('#i_'+op).prop('checked'))
    if (op == 'company') {
      $('#l_company').addClass('active')
      return false;
    }
    if ($('#i_'+op).prop('checked') == true) {
      $('#i_'+op).prop('checked', false);
      Command: toastr["success"]("ปิดบริการแล้ว")
    }
    else{
      $('#i_'+op).prop('checked', true);
      Command: toastr["warning"]("ปิดบริการแล้ว")



    }

    var param = {
     id: id,
     field: op,
     status: values,
     i_icompensation: icom
   }
    // $('#i_shop_country_com').val(id)
    // param.i_shop_country_com = $('#id_shop_product').val();
    // param.id_shop_country =  $('#id_country').val();
    console.log(param)
    $.ajax({
      url: url,
      data: param,
      type: 'post',
       dataType: 'json',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        if (res == true) {
          location.reload();
        }



      }
    });
  }

  function updateStatus(id, status, table) {
    var url = base_url + "shop/updateStatus?option="+option;
    // console.log(shop)
    // console.log(id_shop_country)
    var param = {
      id: id,
      tbl: table+option,
      status: status
    }
    // $('#i_shop_country_com').val(id)
    // param.i_shop_country_com = $('#id_shop_product').val();
    // param.id_shop_country =  $('#id_country').val();
    console.log(param)
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        if (status == 1) {
          Command: toastr["warning"]("ปิดบริการแล้ว")
          if (table == 'shop_country') {
            $('#btn_status' + id).removeClass('btn-success')
            $('#btn_status' + id).addClass('btn-warning')
            $('#btn_status' + id).html('ปิด');
            $('#btn_status' + id).attr("onclick", "updateStatus('" + id + "','0','" + table + "')");
          } else {

            $('#span_status' + id).removeClass('text-success')
            $('#span_status' + id).addClass('text-danger')
            $('#span_status' + id).html('ปิด');
            $('#span_status' + id).attr("onclick", "updateStatus('" + id + "','0','" + table + "')");
          }

        }
        else {
          Command: toastr["success"]("เปิดบริการแล้ว")
          if (table == 'shop_country') {
            $('#btn_status' + id).addClass('btn-success')
            $('#btn_status' + id).removeClass('btn-warning')

            $('#btn_status' + id).html('เปิด');
            $('#btn_status' + id).attr("onclick", "updateStatus('" + id + "','1','" + table + "')");
          } else {
            $('#span_status' + id).addClass('text-success')
            $('#span_status' + id).removeClass('text-danger')
            $('#span_status' + id).html('เปิด');
            $('#span_status' + id).attr("onclick", "updateStatus('" + id + "','1','" + table + "')");
          }


        }

        toastr.options = {
          "closeButton": true,
          "debug": false,
          "positionClass": "toast-top-right",
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }


      }
    });
  }
  var topic_delete, id_delete, table_delete;

  function firstDelete(topic, id, table) {
    $('#span_title_delete').html(topic);
    $('#id_item_delete').val(id)
    topic_delete = topic;
    id_delete = id;
    table_delete = table;
    console.log(topic_delete)
    console.log(id_delete)
    console.log(table_delete)
  }

  function finalDelete() {
    var url = base_url + "shop/delete?option="+option;
    var param = {
      id: id_delete,
      tbl: table_delete
    }
    console.log(param)
    console.log(url)
    // return false;
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        // console.log($('#section_state').val())
        // if ($('#section_state').val() == 1) {
        if (table_delete == 'shopping_contact') {
          _box_contact($('#manage_com').val())
              Command: toastr["success"]("ลบผู้ติดต่อสำเร็จ")

        }
        if (table_delete == 'shop_country'+option || table_delete == 'shop_country_com_list'+option) {
            commision($('#manage_com').val())
          // _box_plan_comision();
          _box_region_icon();
        } else if(table_delete != 'shop_country'+option || table_delete != 'shop_country_com_list'+option) {
          _box_region_icon();
          _box_plan_comision();
        }
      // }
      // else{
        // if (table_delete == 'shop_country_icon_company' || table_delete == 'shop_country_com_list_company') {
        //   commision_company($('#manage_com').val())
        //   _box_plan_comision_company();
        //   _box_region_icon_company();
        // } else {
        //   _box_region_icon_company();
        //   _box_plan_comision_company();
        // }
      // }

    }

  });
  }

  function cal_map(id) {
    var url = base_url + "shop/get_shop_map";
    var param = {
      id: id
    }

    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(ele) {
        console.log('Success Profile');
        $('#map_frame').html(ele);

      }
    });
  }

  function edit_plan_com_price(id) {
    console.log(id)

    $('.btn_show_hide').addClass('hide')
    $('.btn_show_hide').removeClass('show')
    $('#btn_' + id).addClass('show')

    $(".input_" + id).prop('disabled', false);

  }

  function save_edit_com(id) {
    console.log(id)


    var url = base_url + "shop/save_edit_com?i_shop_country_com_list=" + id+"&option="+option;
    console.log($('#edit_plan_com_price' + id).serialize())
    $.ajax({
      url: url,
      data: $('#edit_plan_com_price' + id).serialize(),
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        _box_plan_comision();
        commision($('#manage_com').val())
        box_price_plan();
        $('.btn_show_hide').addClass('hide')
        $('.btn_show_hide').removeClass('show')
        $('#btn_' + id).hide()

        $(".input_" + id).prop('disabled', true);


      }
    });
  }

  function submit_data_plan_time(id,op) {
    // console.log($('#myform_main').serialize());
    var url = base_url + "shop/submit_data_plan_time?shop_id=" + id + '&op='+op;
    $.ajax({
      url: url,
      data: $('#form_shop_all').serialize(),
      type: 'post',
        // contentType: "application/json; charset=utf-8",
        dataType: 'json',
        error: function() {
          console.log('Error Profile');
        },
        success: function(res) {
          console.log(res);

          var url = base_url + "shop/box_plan_time?id="+id;
          console.log(url)
          Command: toastr["success"]("บันทึกข้อมูลสำเร็จ")

          $.post(url, function(ele) {
            // console.log(ele)
            $('#box_plan_time').html(ele);
          });
        }
      });
  }

  function timeOther(day) {
    if ($('#time_other_all').prop("checked") === false) {
        //    $.each(obj_day, function( index, value ) {
        // console.log('#other_time_'+value)
        // console.log($('#other_time_'+value).prop("checked"))
        //                   if($('#other_time_'+value).prop("checked") === true) {
        //                    console.log('bbbb')
        //                    // $('#time_other_'+value).click();
        //                    $('#other_time_'+value).show();
        //                  }
        //                  });
      }
      if ($('#time_other_' + day).prop("checked") === false) {
        $('#other_time_' + day).show();
        console.log('#other_time_' + day)

        var hour_main = $('#hour_open_' + day).val();
        var time_main = $('#time_open_' + day).val();
      } else {
       $('#time_other_' + day).prop( "checked", true );
       $('#other_time_' + day).hide();
     }
   }

   function time_other_all() {
    console.log($('#time_other_all').is(":checked"))
    console.log(obj_day)
    if ($('#time_other_all').prop("checked") === false) {
      $('#row_time_other').show();
      $.each(obj_day, function(index, value) {
            //                   
            if (!$('#time_other_' + value).is(":checked")) {
              $('#time_other_' + value).click();
              $('#time_other_' + value).prop( "checked", true );
                // $('#time_other_' + day).prop("checked",true)
                $('#other_time_' + value).show();
              }
            });
    } else {
      $('#row_time_other').hide();
      $.each(obj_day, function(index, value) {

            // $('#time_other_all').prop('checked', false);
            if ($('#time_other_' + value).is(":checked") === true) {
              $('#time_other_' + value).prop( "checked", false );
              $('#time_other_' + value).click();
            }
          });
    }
  }

  function open_time_all() {
    // body...

    // console.log($('#open_time_all').prop("checked"))

    var hour_open_default = $('#hour_open_default').val();
    var time_open_default = $('#time_open_default').val();
    var hour_close_default = $('#hour_close_default').val();
    var time_close_default = $('#time_close_default').val();
    if ($('#open_time_all').prop("checked") === false) {


      $.each(obj_day, function(index, value) {

        if (!$('#open_alway_' + value).is(":checked")) {
          $('#open_alway_' + value).click();
          $('#open_alway_' + value).prop("checked", true)
        }

            // $('#open_alway_'+value).click();

            // $('#open_alway_'+value).prop('checked', true);

            $('#hour_open_' + value).val('24');
            $('#time_open_' + value).val('00');

            $('#hour_close_' + value).val('24');
            $('#time_close_' + value).val('00');

            $('#hour_open_' + value).attr("disabled", true);
            $('#hour_open_' + value).css("background-color", '#ddd');
            $('#time_open_' + value).attr("disabled", true);
            $('#time_open_' + value).css("background-color", '#ddd');

            $('#hour_close_' + value).attr("disabled", true);
            $('#hour_close_' + value).css("background-color", '#ddd');
            $('#time_close_' + value).attr("disabled", true);
            $('#time_close_' + value).css("background-color", '#ddd');
          });
    } else {
      $.each(obj_day, function(index, value) {
        if ($('#open_alway_' + value).prop("checked")) {
                // alert('aaaa')
                $('#open_alway_' + value).click();
                $('#open_alway_' + value).prop("checked", false)
              }
            //$('#open_alway_'+value).prop('checked', false);

            $('#hour_open_' + value).val(hour_open_default);
            $('#time_open_' + value).val(time_open_default);

            $('#hour_close_' + value).val(hour_close_default);
            $('#time_close_' + value).val(time_close_default);

            $('#hour_open_' + value).attr("disabled", false);
            $('#hour_open_' + value).css("background-color", '#fff');
            $('#time_open_' + value).attr("disabled", false);
            $('#time_open_' + value).css("background-color", '#fff');

            $('#hour_close_' + value).attr("disabled", false);
            $('#hour_close_' + value).css("background-color", '#fff');
            $('#time_close_' + value).attr("disabled", false);
            $('#time_close_' + value).css("background-color", '#fff');
          });
    }
    $('#open_time_all').val($(this).is(':checked'));
  }

  function eachOpenAlway(day) {
    if ($('#open_alway_' + day).is(":checked")) {

      $('#hour_open_' + day).val('24');
      $('#time_open_' + day).val('00');

      $('#hour_close_' + day).val('24');
      $('#time_close_' + day).val('00');

      $('#hour_open_' + day).attr("disabled", true);
      $('#hour_open_' + day).css("background-color", '#ddd');
      $('#time_open_' + day).attr("disabled", true);
      $('#time_open_' + day).css("background-color", '#ddd');

      $('#hour_close_' + day).attr("disabled", true);
      $('#hour_close_' + day).css("background-color", '#ddd');
      $('#time_close_' + day).attr("disabled", true);
      $('#time_close_' + day).css("background-color", '#ddd');
    } else {
      var hour_open_default = $('#hour_open_default').val();
      var time_open_default = $('#time_open_default').val();

      var hour_close_default = $('#hour_close_default').val();
      var time_close_default = $('#time_close_default').val();
      $('#hour_open_' + day).val(hour_open_default);
      $('#time_open_' + day).val(time_open_default);

      $('#hour_close_' + day).val(hour_close_default);
      $('#time_close_' + day).val(time_close_default);

      $('#hour_open_' + day).attr("disabled", false);
      $('#hour_open_' + day).css("background-color", '#fff');
      $('#time_open_' + day).attr("disabled", false);
      $('#time_open_' + day).css("background-color", '#fff');

      $('#hour_close_' + day).attr("disabled", false);
      $('#hour_close_' + day).css("background-color", '#fff');
      $('#time_close_' + day).attr("disabled", false);
      $('#time_close_' + day).css("background-color", '#fff');
    }
  }

  function open_all() {
    console.log($('#open_all').is(":checked"))
    if ($('#open_all').is(":checked") === false) {
      $.each(obj_day, function(index, value) {
        if (!$('#' + value).is(":checked")) {
          $('#' + value).click();
          $('#' + value).prop("checked", true)
        }

        if ($('#open_alway_' + value).is(":checked")) {

        } else {
          $('#hour_open_' + value).attr("disabled", false);
          $('#hour_open_' + value).css("background-color", '#fff');
          $('#time_open_' + value).attr("disabled", false);
          $('#time_open_' + value).css("background-color", '#fff');

          $('#hour_close_' + value).attr("disabled", false);
          $('#hour_close_' + value).css("background-color", '#fff');
          $('#time_close_' + value).attr("disabled", false);
          $('#time_close_' + value).css("background-color", '#fff');
        }

      });

    } else {
      $.each(obj_day, function(index, value) {
        if ($('#' + value).is(":checked") === true) {
          $('#' + value).click();
          $('#' + value).prop("checked", false)

        }
            // $('#'+value).click();
            $('#hour_open_' + value).attr("disabled", true);
            $('#hour_open_' + value).css("background-color", '#ddd');
            $('#time_open_' + value).attr("disabled", true);
            $('#time_open_' + value).css("background-color", '#ddd');

            $('#hour_close_' + value).attr("disabled", true);
            $('#hour_close_' + value).css("background-color", '#ddd');
            $('#time_close_' + value).attr("disabled", true);
            $('#time_close_' + value).css("background-color", '#ddd');
          });
    }
  }

  function closeDay(day) {
   // alert(day)
   if ($('#' + day).is(":checked")) {
    if ($('#open_alway_' + day).is(":checked")) {

    } else {
      $('#hour_open_' + day).attr("disabled", false);
      $('#hour_open_' + day).css("background-color", '#fff');
      $('#time_open_' + day).attr("disabled", false);
      $('#time_open_' + day).css("background-color", '#fff');

      $('#hour_close_' + day).attr("disabled", false);
      $('#hour_close_' + day).css("background-color", '#fff');
      $('#time_close_' + day).attr("disabled", false);
      $('#time_close_' + day).css("background-color", '#fff');
    }

  } else {
        //        if($('#open_alway_'+day).is(":checked")){
          $('#hour_open_' + day).attr("disabled", true);
          $('#hour_open_' + day).css("background-color", '#ddd');
          $('#time_open_' + day).attr("disabled", true);
          $('#time_open_' + day).css("background-color", '#ddd');

          $('#hour_close_' + day).attr("disabled", true);
          $('#hour_close_' + day).css("background-color", '#ddd');
          $('#time_close_' + day).attr("disabled", true);
          $('#time_close_' + day).css("background-color", '#ddd');
        //      }

      }
    }

    function default_time() {
      var hour_open_default = $('#hour_open_default').val();
      var time_open_default = $('#time_open_default').val();
      var hour_close_default = $('#hour_close_default').val();
      var time_close_default = $('#time_close_default').val();
      $.each(obj_day, function(index, value) {
        if ($('#open_alway_' + value).is(":checked")) {

        } else {
          $('#hour_open_' + value).val(hour_open_default);
          $('#time_open_' + value).val(time_open_default);

          $('#hour_close_' + value).val(hour_close_default);
          $('#time_close_' + value).val(time_close_default);
        }
        console.log(value + " : " + hour_open_default);


      });

    }

    function default_time_other() {
      var hour_open_default = $('#hour_open_default_other').val();
      var time_open_default = $('#time_open_default_other').val();
      var hour_close_default = $('#hour_close_default_other').val();
      var time_close_default = $('#time_close_default_other').val();
      $.each(obj_day, function( index, value ) {
        if($('#open_alway_'+value).is(":checked")){
        }else{
          $('#hour_open_'+value+'_2').val(hour_open_default);
          $('#time_open_'+value+'_2').val(time_open_default);
          $('#hour_open_'+value+'_2').css('border-color','#fd0101');
          $('#time_open_'+value+'_2').css('border-color','#fd0101');
          $('#hour_close_'+value+'_2').val(hour_close_default);
          $('#time_close_'+value+'_2').val(time_close_default);
          $('#hour_close_'+value+'_2').css('border-color','#fd0101');
          $('#time_close_'+value+'_2').css('border-color','#fd0101');
          setTimeout(function(){
            $('#hour_open_'+value+'_2').css('border-color','#ccc');
            $('#time_open_'+value+'_2').css('border-color','#ccc');
            $('#hour_close_'+value+'_2').css('border-color','#ccc');
            $('#time_close_'+value+'_2').css('border-color','#ccc');
          }, 2000);
        }
//                  console.log(value+" : "+hour_open_default);
});
    }

    function form_detail_shop(id,op) {
      console.log($('#form_shop_all').serialize());
      var url = base_url + "shop/submit_data_plan_time?shop_id=" + id + '&op='+op;
      $.ajax({
        url: url,
        data: $('#form_shop_all').serialize(),
        type: 'post',
        // contentType: "application/json; charset=utf-8",
        dataType: 'json',
        error: function() {
          console.log('Error Profile');
        },
        success: function(res) {
          console.log(res);
          Command: toastr["success"]("บันทึกข้อมูลสำเร็จ")

          // var url = base_url + "shop/box_plan_time?id="+id;
          // console.log(url)
          // $.post(url, function(ele) {
          //   // console.log(ele)
          //   $('#box_plan_time').html(ele);
          // });
        }
      });
    }
    
    function _select_category(itm) {
      console.log('-----')
      console.log(itm)
      var url = base_url + "shop/select_type?id_sub=" + itm+'&table=shop_sub';
      $.post(url, function(res) {
        console.log(res)
        var htmlOption = "<option value=''>กรุณาเลือก</option>";
        $.each(res, function (i, item) {
          htmlOption += "<option value='" + item.id + "'>" + item.topic_th + "</option>";
        });
        $("#select_type").html(htmlOption);
        // $("#select_type").val();
        // $('select_type', select).remove();
        // select.val(selectedOption);
           // $('#select_type').html(ele);
         });
    }
    function _region(itm) {
      console.log('-----')
      console.log(itm)
      var htmlOption = '';
      var url = base_url + "shop/select_type?id_sub=" + itm+'&table=province';
      console.log(url)
      $.post(url, function(res) {
        console.log(res)
        htmlOption = "<option value=''>กรุณาเลือก</option>";
        $.each(res, function (i, item) {
          htmlOption += "<option value='" + item.id + "'>" + item.name_th + "</option>";
        });
        $("#province").html(htmlOption);
        // $("#select_type").val();
        // $('select_type', select).remove();
        // select.val(selectedOption);
           // $('#select_type').html(ele);
         });
    }
    function _province(itm) {
      var url = base_url + "shop/select_type?id_sub=" + itm+'&table=amphur';
      var htmlOption = '';
      $.post(url, function(res) {
        console.log(res)
        htmlOption = "<option value=''>กรุณาเลือก</option>";
        $.each(res, function (i, item) {
          htmlOption += "<option value='" + item.id + "'>" + item.name_th + "</option>";
        });
        $("#select_amphur").html(htmlOption);
        // $("#select_type").val();
        // $('select_type', select).remove();
        // select.val(selectedOption);
           // $('#select_type').html(ele);
         });
    }

    /********ADD SHOP ********/
    function submit_add_shop() {
      var  ss = $('#form_shop_all').serialize();
      console.log(JSON.stringify(ss));
      var url = base_url + "shop/submit_data_plan_time?op=add";
      $.ajax({
        url: url,
        data: $('#form_shop_all').serialize(),
        type: 'post',
        // contentType: "application/json; charset=utf-8",
        dataType: 'json',
        error: function() {
          console.log('Error');
        },
        success: function(res) {
          console.log(res);
          if (res.result == true) {
            location.href = base_url+'shop/shop_manage?sub='+res.sub+'&id='+res.product_id;
          }

          // var url = base_url + "shop/box_plan_time?id="+id;
          // console.log(url)
          // $.post(url, function(ele) {
          //   // console.log(ele)
          //   $('#box_plan_time').html(ele);
          // });
        }
      });
    }

    /*********** contact *********/
    function edit_contact(id) {
      console.log(id)
      $('#modal_custom').show()
      $('#formModalLabel').html('แก้ใขข้อมูลผู้ติดต่อ')
      var url = base_url + "shop/detail_contact?op=edit";
      var param = {
        id: id
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
    // commision(id)
  }
  function submit_detail_contact(id,op) {
    console.log($('#form_contact').serialize());
    console.log(id)
    console.log(op)
    var  ss = $('#form_contact').serialize();
    console.log(JSON.stringify(ss));
    var url = base_url + "shop/submit_submit_detail_contact?op="+op;
    $.ajax({
      url: url,
      data: $('#form_contact').serialize(),
      type: 'post',
        // contentType: "application/json; charset=utf-8",
        dataType: 'json',
        error: function() {
          console.log('Error');
        },
        success: function(res) {
          console.log(res);
          if (res.result == true) {
            $('#modal_custom').hide()
            if (op == 'add') {
              Command: toastr["success"]("เพิ่มข้อมูลผู้ติดต่อสำเร็จ")
              _box_contact(res.id);

            }
            else{
              Command: toastr["success"]("แก้ใขข้อมูลผู้ติดต่อสำเร็จ")
              _box_contact($('#manage_com').val());

            }
          }
          // if (res.result == true) {
          //   location.href = base_url+'shop/shop_manage?sub='+res.sub+'&id='+res.product_id;
          // }

          // var url = base_url + "shop/box_plan_time?id="+id;
          // console.log(url)
          // $.post(url, function(ele) {
          //   // console.log(ele)
          //   $('#box_plan_time').html(ele);
          // });
        }
      });

    // body...
  }
  function add_contact(id) {
    console.log(id)
    $('#modal_custom').show()
    $('#formModalLabel').html('เพิ่มข้อมูลผู้ติดต่อ')
    var url = base_url + "shop/detail_contact?op=add";
    var param = {
      id: id
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
    // commision(id)
  }
  function _box_contact(id) {
    var url = base_url + "shop/box_contact?id="+id;
    console.log(url)
    $.post(url, function(ele) {
            // console.log(ele)
            $('#box_contact').html(ele);
          });
  }
  /************ load document **********/
  function _box_document(id) {
    // alert(id)
    var url = base_url + "shop/box_document?id="+id;
    console.log(url)
    $.post(url, function(ele) {
            // console.log(ele)
            $('#box_document').html(ele);
          });
  }
  function open_check_expired() {
    console.log($('#check_expired').is(":checked"))
     if (!$('#check_expired').is(":checked")) {
          $('.row_expired').show();
          $('#' ).prop("checked", false)

        }
        else{
          $('.row_expired').hide();

        }
            
  }
$( document ).ready(function() {
    console.log( "ready!" );

$('#file_doc').change(function () {

  var vals = $(this).val(),
          val = vals.length ? vals.split('\\').pop() : '';
          console.log(val)
  $("#form_upload_file").submit();

});
$('#form_upload_file').submit(function (e) {

  e.preventDefault();
  var formData = new FormData($("form_upload_file")[0]);
  // formData.append('func', 'import');
  // formData.append('file', $('input[type=file]')[0].files[0]);
   formData.append('date1', $('#datetimepicker2').val());
          formData.append('date2', $('#datetimepicker22').val());
          formData.append('type_doc', $('#type_doc').val());
          formData.append('day_alert', $('#set_day_alert').val());
          formData.append('alert_email', $('#alert_email').val());
          formData.append('alert_phone', $('#alert_phone').val());
          formData.append('email', $('#email_for_alert').val());
          formData.append('phone', $('#phone_for_alert').val());
          formData.append('check_expired', $('#check_expired').val());
            // for(var i=0;i<$('#file_doc')[0].files.length;i++){
          formData.append('file', $('#file_doc')[0].files[0]);
//            console.log(data);
          // }
          console.log(formData)
  $.ajax({
    type: 'POST',
    url: base_url + '/shop/save_document',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      //blockui_always();
    },
    success: function (data) {
      console.log(data)
     
    },
    error: function (data) {
//            $("#file").val("");
    }
  });
});
});

  function _form_upload_file(id) {
    var data_form = $('#form_upload_file').serialize();
     // data_form.append('file[]', $('#file_doc')[0].files[0]);
    // data_form.file_doc = $('#file_doc')[0].files[0];
           var data_form = new FormData($('#form_upload_file')[0]);
          // data_form.append('date1', $('#datetimepicker2').val());
          // data_form.append('date2', $('#datetimepicker22').val());
          // data_form.append('type_doc', $('#type_doc').val());
          // data_form.append('day_alert', $('#set_day_alert').val());
          // data_form.append('alert_email', $('#alert_email').val());
          // data_form.append('alert_phone', $('#alert_phone').val());
          // data_form.append('email', $('#email_for_alert').val());
          // data_form.append('phone', $('#phone_for_alert').val());
          // data_form.append('check_expired', $('#check_expired').val());
          // data_form.append('file', $('#file_doc')[0].files[0]);
          console.log(data_form);
          var vals = $('#file_doc').val(),
          val = vals.length ? vals.split('\\').pop() : '';
         // console.log($('#file_doc').val());
        console.log(val)
          var url = base_url + "shop/save_document";
          // console.log($('#file_doc')[0].files[0])
    console.log(data_form)
    // console.log(data_form2)
// var formData = new FormData($("#form_upload_file")[0]);
  // formData.append('func', 'import');
  // formData.append('file', $('input[type=file]')[0].files[0]);
  $.ajax({
    type: 'POST',
    url: url,
    data: data_form,
    // cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      //blockui_always();
    },
    success: function (data) {
      console.log(data)
     
    },
    error: function (data) {
//            $("#file").val("");
    }
  });
    // $.ajax({
    //   url: url,
    //   data: data_form,
    //   type: 'post',
    //   error: function() {
    //     console.log('Error Profile');
    //   },
    //   success: function(ele) {
    //     console.log('Success Profile');
    //     console.log(ele)

    //   }
    // });
  }
