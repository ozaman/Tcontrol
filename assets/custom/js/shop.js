// callinit();
var param_plan_price;
// shop('categorie')

function get_shop_all() {
    // alert('aaaaa')
    // console.log(username);
    // $('#head_title').html('จัดการร้านค้า')
    // $('#head_title_sub').html('ร้านค้าทั้งหมด')
    // $('#head_title_sub_2').hide()
    // $('.head_title_sub_3').hide()

    // $('.head_title_sub_4').hide()

    var url = base_url+ "shop/data_shop_all";
    $.post(url,function(ele){
        $('#body_page_call').html(ele);
    });

}
function get_categories_sub(item){
    // $('.head_title').html('จัดการร้านค้า')
    // $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    // $('.head_title_sub_2').show()
    // $('.head_title_sub_2').html('ประเภทหมวดหมู่ ')
    // $('.head_title_sub_3').hide()
    // $('.head_title_sub_4').hide()

    var url = base_url+ "shop/categorie_sub";
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
    var url = base_url+ "shop/shop_ordertype";
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
   var url = base_url+"shop/shop_manage";
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
function commision(item) {
    $('#modal_custom').show()
   // $('.head_title').html('จัดการร้านค้า')
   //  $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
   //  $('.head_title_sub_2').show()
   //  $('.head_title_sub_2').html('ช้อปปิ้งทั้งหมด ')
   //  $('.head_title_sub_3').show()
   //  $('.head_title_sub_4').show()
   //  $('.head_title_sub_3').html('ร้านช้อปปิ้งทั้งหมด')
   //  $('.head_title_sub_4').html('จัดการร้านช้อปปิ้ง')
   var url = base_url+ "shop/shop_manage_com";
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
    var url = base_url+ "shop/add_region";
    $.ajax({
        url: url,
        data: param,
        type: 'post',
        error: function() {
            console.log('Error Profile');
        },
        success: function(res) {
            console.log(res);
            var url2 = base_url+ "shop/get_region";
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
    var url = base_url+ "shop/get_region_sub";
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
function close_modal_custom(opt){
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
    var url = base_url+ "shop/add_region_sub";
    // console.log(shop)
    // console.log(id_shop_country)
    param.i_shop = $('#id_shop_product').val();
    param.id_shop_country =  $('#id_country').val();
    console.log(param)
    $.ajax({
        url: url,
        data: param,
        type: 'post',
        error: function() {
            console.log('Error Profile');
        },
        success: function(ele) {
           console.log(ele);
                    // $('.box_sub_region'+id).html(ele);
                    // $('#btn_region_sub'+id).attr('onclick','save_region_sub('+shop+','+id_shop_country+')');

                }
            });
    // body...
}
function save_plan_price() {
    var url = base_url+ "shop/add_plan_price";
    // console.log(shop)
    // console.log(id_shop_country)
    
    console.log(param_plan_price)
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
            if (res == true) {
               var url = base_url+ "shop/get_region_sub";
               var param = {
                country_id: $('#id_country').val()
            }
            $.ajax({
                url: url,
                data: param,
                type: 'post',
                error: function() {
                    console.log('Error Profile');
                },
                success: function(ele) {

                   $('#dody_modal_custom_2').html(ele);


               }
           });
        }
    }

});
    // body...
}
function get_plan_price_sub(id) {
    console.log(id)
    $('#modal_custom_3').show();
    var url = base_url+ "shop/get_plan_price_sub";
    // console.log(shop)
    // console.log(id_shop_country)
    var param = {
        i_shop_country_com: id,
        i_shop_country:$('#id_country').val()
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
    var url = base_url+"shop/add_plan_price_sub";
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
function updateStatus(id,status,table) {
 var url = base_url + "shop/updateStatus";
    // console.log(shop)
    // console.log(id_shop_country)
    var param = {
        id: id,
        tbl:table,
        status:status
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
           if (status ==1) {
               Command: toastr["warning"]("ปิดบริการแล้ว")
               $('#span_status'+id).removeClass('text-success')
               $('#span_status'+id).addClass('text-danger')
               $('#span_status'+id).html('ปิด');
               $('#span_status'+id).attr("onclick","updateStatus('"+id+"','0','"+table+"')");
           }
           else {
               Command: toastr["success"]("เปิดบริการแล้ว")
               $('#span_status'+id).addClass('text-success')
               $('#span_status'+id).removeClass('text-danger')
               $('#span_status'+id).html('เปิด');
               $('#span_status'+id).attr("onclick","updateStatus('"+id+"','1','"+table+"')");
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
function firstDelete(topic,id,table) {
   $('#span_title_delete').html(topic);
   $('#id_item_delete').val(id)
}


