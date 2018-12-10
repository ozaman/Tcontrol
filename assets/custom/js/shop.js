// ========================================================================================
if (call_toastr == 1) {
  toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
}
// ========================================================================================
function func_openForm(id, tbl, s_title, i_main) {
  $('#modal_custom').show();
  $('#formModalLabel').html(s_title);
  var url = base_url + "shop/func_openForm";
  var param = {
    id: id
    , tbl: tbl
    , i_main: i_main
  }
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      $('#dody_modal_custom').html(ele);
    }
  });
}
function func_SaveDataFormAction() {
  var url = base_url + "shop/func_SaveDataFormAction";
  var dataForm = $('#DataFormAction').serialize();
  console.log(dataForm);
  $.ajax({
    url: url,
    data: dataForm,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if (res.i_status == 1) {
        $('#modal_custom').hide();
        toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
        setTimeout(function () {
          location.reload();
        }, 300);
      } else {
        toastr.error('บันทึกข้อมูลไม่สำเร็จ', res.s_msg, {"closeButton": true});
      }

    }
  });
}
function func_deleteimg(id) {
  var url = base_url + "shop/deleteimg?id="+id;
  
  $.ajax({
    url: url,
    // data: dataForm,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if (res.status == true) {
        // $('#modal_custom').hide();
        toastr.success(res.msg, '', {"closeButton": true});
        _box_img_book(res.i_shop)
        // setTimeout(function () {
        //   location.reload();
        // }, 300);
      } else {
        toastr.error('ลบไม่สำเร็จ', res.s_msg, {"closeButton": true});
      }

    }
  });
}
function func_EditForm(id, topic_en, topic_th, topic_cn) {
  $('#topic_en').val(topic_en);
  $('#topic_th').val(topic_th);
  $('#topic_cn').val(topic_cn);
  $('#id').val(id);
}
function func_CancelForm() {
  $('#topic_en').val('');
  $('#topic_th').val('');
  $('#topic_cn').val('');
  $('#id').val('');
}
function func_SaveDataFormActionTypeList(sub,tbl) {
  var url = base_url + "shop/func_SaveDataFormAction";
  var dataForm = $('#DataFormAction').serialize();
  console.log(dataForm);
  $.ajax({
    url: url,
    data: dataForm,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if (res.i_status == 1) {
        toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
        
        $('#topic_en').val('');
        $('#topic_th').val('');
        $('#topic_cn').val('');
        $('#id').val('');
        var url = base_url + "shop/func_openList";
        $.post(url,{sub:sub,tbl:tbl},function(res){
          $('#div_typelist').html(res);
        });
        
      } else {
        toastr.error('บันทึกข้อมูลไม่สำเร็จ', res.s_msg, {"closeButton": true});
      }

    }
  });
}
// ========================================================================================
function func_openFormDel(id, tbl, s_title,ele_id='tr_delete') {
  //$('#modal_customDel').show();
  $('#span_title_deleteBase').html(s_title);
  $('#id_item_deleteBase').val(id);
  $('#tbl_item_deleteBase').val(tbl);
  $('#ele_item_deleteBase').val(ele_id);
}
function func_SaveDeleteBase() {
  var id = $('#id_item_deleteBase').val();
  var tbl = $('#tbl_item_deleteBase').val();
  var ele_id = $('#ele_item_deleteBase').val();
  var url = base_url + "shop/func_SaveDeleteBase";
  var param = {
    id: id
    , tbl: tbl
  }
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      toastr.success('ลบข้อมูลสำเร็จ', '', {"closeButton": true});
      $('#'+ele_id + id).fadeOut(300);
    }
  });
}

// ========================================================================================
function func_UpdateSubTypelist(i_main_typelist, main, sub, i_count) {
  var url = base_url + "shop/func_UpdateSubTypelist";
  var param = {
    i_main_typelist: i_main_typelist,
    main: main,
    sub: sub,
    i_count: i_count
  }
  console.log(param);
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    dataType: 'json',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      if (res == true) {
        console.log(res);
        toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
      }
    }
  });
}
// ========================================================================================
function func_withholding(i_id, s_where, s_col, s_tbl, s_id) {
  if ($('#i_withholding' + s_id).prop("checked") === true) {
    $('#i_withholding' + s_id).prop("checked", false);
    $('#div_i_withholding_rate' + s_id).hide();
    var s_val = 0;
    func_withholding_update(s_val, i_id, s_where, s_col, s_tbl);
  } else {
    $('#i_withholding' + s_id).prop("checked", true);
    $('#div_i_withholding_rate' + s_id).show();
    var s_val = 1;
    func_withholding_update(s_val, i_id, s_where, s_col, s_tbl);
  }
}
function func_withholding_rate(s_val, i_id, s_where, s_col, s_tbl, s_id) {
  func_withholding_update(s_val, i_id, s_where, s_col, s_tbl);
}
function func_withholding_update(s_val, i_id, s_where, s_col, s_tbl) {
  var url = base_url + "shop/func_withholding_update";
  var param = {
    s_val: s_val,
    i_id: i_id,
    s_where: s_where,
    s_col: s_col,
    s_tbl: s_tbl
  }
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    dataType: 'json',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      if (res == true) {
        console.log(res);
        toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
      }
    }
  });
}
// ========================================================================================
// ========================================================================================
function func_TypeListPercent(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col) {
  if ($('#i_checkbox' + i_list_price+''+i_main_typelist).prop("checked") === true) {
    $('#i_checkbox' + i_list_price+''+i_main_typelist).prop("checked", false);
    $('.td_percent' + i_list_price+''+i_main_typelist).hide();
    var s_val = 0;
    func_UpdateTypeListPercent(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val);
  } else {
    $('#i_checkbox' + i_list_price+''+i_main_typelist).prop("checked", true);
    $('.td_percent' + i_list_price+''+i_main_typelist).show();
    var s_val = 1;
    func_UpdateTypeListPercent(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val);
  }
}
function func_UpdateTypeListPercent_rate(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val) {
  func_UpdateTypeListPercent(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val);
}
function func_UpdateTypeListPercent(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val) {
  var url = base_url + "shop/func_UpdateTypeListPercent";
  var param = {
    product: i_shop,
    i_list_price: i_list_price,
    i_main_typelist: i_main_typelist,
    i_main: i_main,
    i_sub: i_sub,
    s_col:s_col,
    s_val:s_val
  }
  console.log(param);
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    dataType: 'json',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if (res.data == true) {
        
        toastr.success('บันทึกข้อมูลสำเร็จ', '', {"closeButton": true});
      }
    }
  });
}
// ========================================================================================

// callinit();
var param_plan_price,
        day, obj_day;
var option = '';
// shop('categorie')
// box_region_show()
function _box_region_show(item, options) {
  console.log(item)
  console.log(options)
  $('#section_state').val(options)
  option = options;
  var url = base_url + "shop/box_region_show?option=" + options;
  var param = {
    id: item
  }
  console.log(url)

  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
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

  var url = base_url + "shop/data_shop_all?option=" + option;
  $.post(url, function (ele) {
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

  var url = base_url + "shop/categorie_sub?option=" + option;
  var param = {
    id: item
  }

  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
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
  var url = base_url + "shop/shop_ordertype?option=" + option;
  var param = {
    id: item
  }

  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
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
  var url = base_url + "shop/shop_manage?option=" + option;
  var param = {
    id: item
  }

  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      console.log('Success Profile');
      $('#body_page_call').html(ele);

    }
  });
}


function open_commision(id) {
  // body...
  $('#modal_custom').show()
  console.log('--------------------------------------')
  console.log(id)
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
  var url = base_url + "shop/shop_manage_com?option=" + option;
  var param = {
    id: item
  }
  console.log(url)

  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      console.log('Success Profile');
      $('#dody_modal_custom').html(ele);

    }
  });
}



function submit_region(item) {
  console.log(param)
  var url = base_url + "shop/add_region?option=" + option;
  console.log(url)
  // return false;
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      Command: toastr["success"]("เพิ่มสัญชาติสำเร็จ")
      var url2 = base_url + "shop/get_region?option=" + option;
      var param = {
        i_shop: item
      }
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

    }
  });
}

function submit_region_sub(id) {
  $('#modal_custom_2').show()
  $('#title_add_region_sub').html('เพ่ิมสัญชาติ')
  var url = base_url + "shop/get_region_sub?option=" + option;
  var param = {
    country_id: id
  }
  // console.log(country)
  console.log(id)
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
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
  var url = base_url + "shop/add_region_sub?option=" + option;
  // console.log(shop)
  // console.log(id_shop_country)
  param.i_shop = $('#id_shop_product').val();
  param.id_shop_country = $('#id_country').val();
  console.log(param)
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
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
  var url = base_url + "shop/save_plan_price?option=" + option;
  console.log(url)
  console.log($('#plan_com_price').serialize())
  console.log(param_plan_price)
  $.ajax({
    url: url,
    data: $('#plan_com_price').serialize(),
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res)
      if (res == '') {
        Command: toastr["warning"]("กรุณาเลือกช่องทางการจ่ายเงิน")
      } else {
        Command: toastr["success"]("เพิม่ค่าตอบแทนสำเร็จ")
        $('#btn_save_price_plann').hide();
        commision($('#manage_com').val())
        $('#box_plan_com').html('');
        _box_plan_comision();
      _box_price_plan();
      }



    }
  });
}


function get_plan_price_sub(id) {
  console.log(id)
  $('#modal_custom_3').show();
  var url = base_url + "shop/get_plan_price_sub?option=" + option;
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
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      //console.log(ele);
      $('#dody_modal_custom_3').html(ele);
      // $('#btn_region_sub'+id).attr('onclick','save_region_sub('+shop+','+id_shop_country+')');

    }
  });
  // body...
}




function save_plan_price_sub(id) {
  var url = base_url + "shop/add_plan_price_sub?option=" + option;
  // console.log(shop)
  // console.log(id_shop_country)

  console.log(param_plan_price)
  // param_plan_price.i_shop_country_com = id;
  $.ajax({
    url: url,
    data: param_plan_price,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
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
function updatetype(id, values, op, icom) {

  var url = base_url + "shop/updatetype?option=" + option;

  console.log(url)
  console.log(id)
  console.log(values)
  console.log(op)
  console.log($('#i_' + op).prop('checked'))
  if (op == 'company') {
    $('#l_company').addClass('active')
    return false;
  }
  if ($('#i_' + op).prop('checked') == true) {
    $('#i_' + op).prop('checked', false);
    Command: toastr["success"]("ปิดบริการแล้ว")
  } else {
    $('#i_' + op).prop('checked', true);
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
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if (res == true) {
        location.reload();
      }



    }
  });
}
function updateStatusSHOP(id, status, table) {
  var url = base_url + "shop/updateStatusSHOP?option=" + option;
  var ftable = '';
  if (table == 'shopping_contact') {
    ftable = table;
  } else {
    ftable = table + option;

  }
  // console.log(shop)
  // console.log(id_shop_country)
  var param = {
    id: id,
    tbl: ftable,
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
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if (res == 0) {
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

      } else if (res == 1) {
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


      } else if (res < 0) {
        Command: toastr["warning"]("ยังไม่มีการตั้งค่าตอบแทนกรุณาตั้งค่าตอบแทน")
        // $('#span_status' + id).removeClass('text-success')
        // $('#span_status' + id).addClass('text-danger')
        // $('#span_status' + id).html('ปิด');
        // $('#span_status' + id).attr("onclick", "updateStatus('" + id + "','0','" + table + "')");

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

function updateStatus(id, status, table) {
  var url = base_url + "shop/updateStatus?option=" + option;
  var ftable = '';
  if (table == 'shopping_contact') {
    ftable = table;
  } else {
    ftable = table + option;

  }
  // console.log(shop)
  // console.log(id_shop_country)
  var param = {
    id: id,
    tbl: ftable,
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
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
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

      } else {
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
  var url = base_url + "shop/delete?option=" + option;
  var param = {
    id: id_delete,
    tbl: table_delete,
    option: option
  }
  // con
  console.log(param)
  console.log(url)
  // return false;
  // return false;
  // 
  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      // console.log($('#section_state').val())
      // if ($('#section_state').val() == 1) {
      if (table_delete == 'shopping_contact') {
        _box_contact($('#manage_com').val())
        Command: toastr["success"]("ลบผู้ติดต่อสำเร็จ")

      }
      if (table_delete == 'place_document_file') {
        _box_document($('#manage_com').val())
      }
      if (table_delete == 'shop_country' + option || table_delete == 'shop_country_com_list' + option) {
        commision($('#manage_com').val())
        // _box_plan_comision();
        // _box_region_icon();
      } if (table_delete != 'shopping_contact' || table_delete != 'shop_country' + option || table_delete != 'shop_country_com_list' + option || table_delete != 'place_document_file') {
        _box_region_icon();
        _box_plan_comision();
      }
      // }
      // else{
      if (table_delete == 'shop_country_icon_company' || table_delete == 'shop_country_com_list_company') {
         _box_plan_comision();
         _box_price_plan()
      //   commision_company($('#manage_com').val())
      //   _box_plan_comision_company();
      //   _box_region_icon_company();
      // } else {
      //   _box_region_icon_company();
      //   _box_plan_comision_company();
      // }
      }

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
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
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


  var url = base_url + "shop/save_edit_com?i_shop_country_com_list=" + id + "&option=" + option;
  console.log($('#edit_plan_com_price' + id).serialize())
  $.ajax({
    url: url,
    data: $('#edit_plan_com_price' + id).serialize(),
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
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

function submit_data_plan_time(id, op) {
  // console.log($('#myform_main').serialize());
  var url = base_url + "shop/submit_data_plan_time?shop_id=" + id + '&op=' + op;
  $.ajax({
    url: url,
    data: $('#form_shop_all').serialize(),
    type: 'post',
    // contentType: "application/json; charset=utf-8",
    dataType: 'json',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      
        var url = base_url + "shop/box_plan_time?id=" + id;
      console.log(url)
      Command: toastr["success"]("บันทึกข้อมูลสำเร็จ")

      $.post(url, function (ele) {
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
    $('#time_other_' + day).prop("checked", true);
    $('#other_time_' + day).hide();
  }
}

function time_other_all() {
  console.log($('#time_other_all').is(":checked"))
  console.log(obj_day)
  if ($('#time_other_all').prop("checked") === false) {
    $('#row_time_other').show();
    $.each(obj_day, function (index, value) {
      //                   
      if (!$('#time_other_' + value).is(":checked")) {
        $('#time_other_' + value).click();
        $('#time_other_' + value).prop("checked", true);
        // $('#time_other_' + day).prop("checked",true)
        $('#other_time_' + value).show();
      }
    });
  } else {
    $('#row_time_other').hide();
    $.each(obj_day, function (index, value) {

      // $('#time_other_all').prop('checked', false);
      if ($('#time_other_' + value).is(":checked") === true) {
        $('#time_other_' + value).prop("checked", false);
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


    $.each(obj_day, function (index, value) {

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
    $.each(obj_day, function (index, value) {
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
    $.each(obj_day, function (index, value) {
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
    $.each(obj_day, function (index, value) {
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
  $.each(obj_day, function (index, value) {
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
  $.each(obj_day, function (index, value) {
    if ($('#open_alway_' + value).is(":checked")) {
    } else {
      $('#hour_open_' + value + '_2').val(hour_open_default);
      $('#time_open_' + value + '_2').val(time_open_default);
      $('#hour_open_' + value + '_2').css('border-color', '#fd0101');
      $('#time_open_' + value + '_2').css('border-color', '#fd0101');
      $('#hour_close_' + value + '_2').val(hour_close_default);
      $('#time_close_' + value + '_2').val(time_close_default);
      $('#hour_close_' + value + '_2').css('border-color', '#fd0101');
      $('#time_close_' + value + '_2').css('border-color', '#fd0101');
      setTimeout(function () {
        $('#hour_open_' + value + '_2').css('border-color', '#ccc');
        $('#time_open_' + value + '_2').css('border-color', '#ccc');
        $('#hour_close_' + value + '_2').css('border-color', '#ccc');
        $('#time_close_' + value + '_2').css('border-color', '#ccc');
      }, 2000);
    }
//                  console.log(value+" : "+hour_open_default);
  });
}

function form_detail_shop(id, op) {
  console.log($('#form_shop_all').serialize());
  var url = base_url + "shop/submit_data_plan_time?shop_id=" + id + '&op=' + op;
  $.ajax({
    url: url,
    data: $('#form_shop_all').serialize(),
    type: 'post',
    // contentType: "application/json; charset=utf-8",
    dataType: 'json',
    error: function () {
      console.log('Error Profile');
    },
    success: function (res) {
      console.log(res);
      if(res.id > 0){
        Command: toastr["success"]("บันทึกข้อมูลสำเร็จ")
        location.replace(res.url);
      }else{
        Command: toastr["error"]("บันทึกข้อมูลไม่สำเร็จ กรุณากรอกข้อมูลให้ครบด้วยค่ะ")
      }
      //Command: toastr["success"]("บันทึกข้อมูลสำเร็จ")

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
  var url = base_url + "shop/select_type?id_sub=" + itm + '&table=shop_sub';
  $.post(url, function (res) {
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
  var url = base_url + "shop/select_type?id_sub=" + itm + '&table=province';
  console.log(url)
  $.post(url, function (res) {
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
  $('#province').val(itm)
  var url = base_url + "shop/select_type?id_sub=" + itm + '&table=amphur';
  var htmlOption = '';
  $.post(url, function (res) {
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
  var ss = $('#form_shop_all').serialize();
  console.log(JSON.stringify(ss));
  var url = base_url + "shop/submit_data_plan_time?op=add";
  $.ajax({
    url: url,
    data: $('#form_shop_all').serialize(),
    type: 'post',
    // contentType: "application/json; charset=utf-8",
    dataType: 'json',
    error: function () {
      console.log('Error');
    },
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        location.href = base_url + 'shop/shop_manage?sub=' + res.sub + '&id=' + res.product_id;
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
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      console.log('Success Profile');
      $('#dody_modal_custom').html(ele);

    }
  });
  // commision(id)
}
function submit_detail_contact(id, op) {
  console.log($('#form_contact').serialize());
  console.log(id)
  console.log(op)
  
  var contact_admintype = $('#contact_admintype').val();
  if(contact_admintype == ''){
    toastr.error( 'กรุณาเลือกผู้ดูแล','บันทึกข้อมูลไม่สำเร็จ', {"closeButton": true});
    return false;
  }
  var contact_usertype = $('#contact_usertype').val();
  if(contact_usertype == ''){
    toastr.error( 'กรุณาเลือกตำแหน่ง','บันทึกข้อมูลไม่สำเร็จ', {"closeButton": true});
    return false;
  }
  var contact_name = $('#contact_name').val();
  if(contact_name == ''){
    toastr.error( 'กรุณากรอกชื่อ','บันทึกข้อมูลไม่สำเร็จ', {"closeButton": true});
    return false;
  }
  var contact_phone = $('#contact_phone').val();
  if(contact_phone == ''){
    toastr.error( 'กรุณากรอกเบอร์โทรศัพท์','บันทึกข้อมูลไม่สำเร็จ', {"closeButton": true});
    return false;
  }
  
  
  var ss = $('#form_contact').serialize();
  console.log(JSON.stringify(ss));
  var url = base_url + "shop/submit_submit_detail_contact?op=" + op;
  $.ajax({
    url: url,
    data: $('#form_contact').serialize(),
    type: 'post',
    // contentType: "application/json; charset=utf-8",
    dataType: 'json',
    error: function () {
      console.log('Error');
    },
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        $('#modal_custom').hide()
        if (op == 'add') {
          Command: toastr["success"]("เพิ่มข้อมูลผู้ติดต่อสำเร็จ")
          _box_contact(res.id);

        } else {
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
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      console.log('Success Profile');
      $('#dody_modal_custom').html(ele);

    }
  });
  // commision(id)
}
function _box_contact(id) {
  console.log('*********** box_contact')
  console.log(id)
  var url = base_url + "shop/box_contact?id=" + id;
  console.log(url)
  $.post(url, function (ele) {
    // console.log(ele)
    $('#box_contact').html(ele);
  });
}
/************ load document **********/
function _box_document(id) {
  // alert(id)
  var url = base_url + "shop/box_document?id=" + id;
  console.log(url)
  $.post(url, function (ele) {
    // console.log(ele)
    $('#box_document').html(ele);
  });
}
function _box_img(id) {
  // alert(id)
  var url = base_url + "shop/box_img?id=" + id;
  console.log(url)
  $.post(url, function (ele) {
    // console.log(ele)
    $('#box_img').html(ele);
    _box_img_book(id)
  });
}
function open_check_expired() {
  console.log($('#check_expired').is(":checked"))
  if (!$('#check_expired').is(":checked")) {
    $('.row_expired').show();
    $('#').prop("checked", false)

  } else {
    $('.row_expired').hide();

  }

}
$(document).ready(function () {
});

function _form_upload_file(id) {
  
  var data_form = $('#form_upload_file').serialize();
  var data_form = new FormData($('#form_shop_all')[0]);
  var url = base_url + "shop/save_document";
  console.log(data_form)
  $.ajax({
    type: 'POST',
    url: url,
    data: data_form,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      //blockui_always();
    },
    success: function (data) {
      console.log(data)
      if (data.status == true) {
        Command: toastr["success"](data.msg)
        _box_document(id);
      } else {
        Command: toastr["warning"](data.msg)
      }

    },
    error: function (data) {

    }
  });

}

var OPT;
function editProfile(id, op) {
  console.log(id)
  console.log(op)
  //    document.getElementById('file').click();
  OPT = op;
  $("#file").click();
}

function filechange() {
  console.log('aaaa')
  var vals = $('#file').val();
  // val = vals.length ? vals.split('\\').pop() : '';
  // console.log(val)
  // $("#upfile").submit();
  upfile_submit()

}

function checkForm(form) {
  console.log(form)
  if ($("#file").val() == "") {
    return false;
  }
}

function upfile_submit() {
  console.log(OPT)
  var url = base_url + "shop/save_uploadimg?opt=" + OPT;
  var formData = $('#upfile').serialize();
  var formData = new FormData($('#upfile')[0]);
  // var formData = new FormData($("upfile")[0]);
  console.log(formData)
  console.log(url)
  console.log($('#shop_id_upload').val())
  // formData.append('func', 'import');
  formData.append('file', $('input[type=file]')[0].files[0]);
  formData.append('shop_id_upload', $('#shop_id_upload').val());

  $.ajax({
    type: 'POST',
    url: url,
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      //blockui_always();
    },
    success: function (res) {
      console.log(res)
      // $("#file").val("");
      Command: toastr["success"](res.msg)

      // var key = new Date($.now());
      if (res.status == true) {
        if (OPT == 'logo') {
          $('#img_logo_shop').attr('src', '../../data/pic/place/' + res.s_name);

        } else {
          _box_img_book($('#shop_id_upload').val())
        }
      } else {
        Command: toastr["warning"](res.msg)

      }
      // $('#img-profile-2').attr('src', base_url + 'uploads/admin/' + data + "?" + key);
      // $('#img-profile-3').attr('src', base_url + 'uploads/admin/' + data + "?" + key);
    },
    error: function (data) {
//            $("#file").val("");
    }
  });
}
function _box_img_book(id) {
  // alert(id)
  var url = base_url + "shop/box_img_book?id=" + id;
  console.log(url)
  $.post(url, function (ele) {
    // console.log(ele)
    $('#box_img_book').html(ele);
  });
}
function open_detail_pay(i_shop, res_option) {
  $('#modal_custom').show()
  $('#formModalLabel').html('จัดการรายละเอียดการโอนเงิน (ค่าคอม)')

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
  var url = base_url + "shop/open_detail_pay?option=" + option;
  var param = {
    id: i_shop
  }
  console.log(url)

  $.ajax({
    url: url,
    data: param,
    type: 'post',
    error: function () {
      console.log('Error Profile');
    },
    success: function (ele) {
      console.log('Success Profile');
      $('#dody_modal_custom').html(ele);
      // var editor = new wysihtml5.Editor("wysiwyg", {
      //   toolbar: "toolbar",
      //   parserRules: wysihtml5ParserRules
      // });
      // boostbox.App.monitorWysihtml5(editor);

    }
  });
}


function _submit_detail_pay() {
  console.log($('#form_detail_pay').serialize());

  // var  ss = $('#form_contact').serialize();
  // console.log(JSON.stringify(ss));
  var form = $('#form_detail_pay').serialize();
  var url = base_url + "shop/submit_detail_pay";
  console.log(form)
  // return false;
  $.ajax({
    url: url,
    data: form,
    type: 'post',
    // contentType: "application/json; charset=utf-8",
    dataType: 'json',
    error: function () {
      console.log('Error');
    },
    success: function (res) {
      console.log(res);
      if (res.result == true) {
        $('#modal_custom').hide()

        Command: toastr["success"]("เพิ่มข้อมูลผู้ติดต่อสำเร็จ")
         // _box_contact(res.id);


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
// function open_car_price(item) {
//   var url = base_url + "shop/open_car_price"
//   var param = {
//     id: item
//   }
//   $('#modal_custom').show()
//    $.ajax({
//     url: url,
//     data: param,
//     type: 'post',
//     error: function () {
//       console.log('Error Profile');
//     },
//     success: function (ele) {
//       console.log('Success Profile');
//       $('#dody_modal_custom').html(ele);

//     }
//   });
// }


// function func_TypeListPercent(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col) {
//   if ($('#i_checkbox' + i_list_price+''+i_main_typelist).prop("checked") === true) {
//     $('#i_checkbox' + i_list_price+''+i_main_typelist).prop("checked", false);
//     $('.td_percent' + i_list_price+''+i_main_typelist).hide();
//     var s_val = 0;
//     func_Updatecar(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val);
//   } else {
//     $('#i_checkbox' + i_list_price+''+i_main_typelist).prop("checked", true);
//     $('.td_percent' + i_list_price+''+i_main_typelist).show();
//     var s_val = 1;
//     func_Updatecar(i_shop,i_list_price,i_main_typelist,i_main,i_sub,s_col,s_val);
//   }
// }

