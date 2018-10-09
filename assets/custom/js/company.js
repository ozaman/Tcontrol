  function open_commision_company(id) {
    // body...
    $('#modal_custom').show()
    $('#section_state').val(2);
    commision_company(id)

  }

  function commision_company(item) {
    var url = base_url + "company/shop_manage_com_company";
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

  function box_region_show_company(item) {
    console.log(item)
    var url = base_url + "company/box_region_show_company";
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
            // console.log('Success Profile');
            $('#box_region_show_company').html(ele);

          }
        });
  }

  function submit_region_company(item) {
    console.log(param)
    var url = base_url + "company/add_region_company";
    $.ajax({
      url: url,
      data: param,
      type: 'post',
      error: function() {
        console.log('Error Profile');
      },
      success: function(res) {
        console.log(res);
        var url2 = base_url + "company/get_region_company";
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
                    $('#box_com_add_company').html(ele);

                  }
                });

      }
    });
  }

  function submit_region_sub_company(id){
    $('#modal_custom_2').show()
    $('#title_add_region_sub').html('เพ่ิมสัญชาติ')
    var url = base_url + "company/get_region_sub_company";
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

  function close_modal_custom_company(opt) {
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

  function save_region_sub_company() {
    var url = base_url + "company/save_region_sub_company";
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
            commision_company($('#manage_com').val())
            box_region_icon()
            box_select_region_icon()
            // $('.box_sub_region'+id).html(ele);
            // $('#btn_region_sub'+id).attr('onclick','save_region_sub('+shop+','+id_shop_country+')');

          }
        });
    // body...
  }

function save_plan_price_company() {
  var url = base_url + "company/save_plan_price_company";
  console.log($('#plan_com_price').serialize())
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
        commision_company($('#manage_com').val())
        $('#box_plan_com').html('');
        box_plan_comision_company();
        box_price_plan_company();
      }



    }
  });
}


function get_plan_price_sub_company(id) {
  console.log(id)
  $('#modal_custom_3').show();
  var url = base_url + "company/get_plan_price_sub_company";
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




  function save_plan_price_sub_company(id) {
    var url = base_url + "company/save_plan_price_sub_company";
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
          }

        });
  }

  
  var topic_delete, id_delete, table_delete;
  function edit_plan_com_price_company(id) {
    console.log(id)

    $('.btn_show_hide').addClass('hide')
    $('.btn_show_hide').removeClass('show')
    $('#btn_' + id).addClass('show')

    $(".input_" + id).prop('disabled', false);

  }

  function save_edit_com_company(id) {
    console.log(id)


    var url = base_url + "company/save_edit_com_company?i_shop_country_com_list=" + id;
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
        box_plan_comision_company();
        commision_company($('#manage_com').val())
        box_price_plan_company();
        $('.btn_show_hide').addClass('hide')
        $('.btn_show_hide').removeClass('show')
        $('#btn_' + id).hide()

        $(".input_" + id).prop('disabled', true);


      }
    });
  }