// callinit();
shop('categorie')

function callinit() {
    // alert('aaaaa')
    // console.log(username);
    $('#head_title').html('จัดการร้านค้า')
    $('#head_title_sub').html('ร้านค้าทั้งหมด')
    $('#head_title_sub_2').hide()
    $('.head_title_sub_3').hide()

    $('.head_title_sub_4').hide()

    var url = "shop/data_shop_all";
    $.post(url,function(ele){
        $('#body_page_call').html(ele);
    });

}
function get_categories_sub(item){
    $('.head_title').html('จัดการร้านค้า')
    $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    $('.head_title_sub_2').show()
    $('.head_title_sub_2').html('ประเภทหมวดหมู่ ')
    $('.head_title_sub_3').hide()
    $('.head_title_sub_4').hide()

    var url = "shop/categorie_sub";
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
    $('.head_title').html('จัดการร้านค้า')
    $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    $('.head_title_sub_2').show()
    $('.head_title_sub_2').html('ช้อปปิ้งทั้งหมด ')
    $('.head_title_sub_3').show()
    $('.head_title_sub_4').hide()

    $('.head_title_sub_3').html('ร้านช้อปปิ้งทั้งหมด')
    var url = "shop/shop_ordertype";
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
   $('.head_title').html('จัดการร้านค้า')
    $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
    $('.head_title_sub_2').show()
    $('.head_title_sub_2').html('ช้อปปิ้งทั้งหมด ')
    $('.head_title_sub_3').show()
    $('.head_title_sub_4').show()
    $('.head_title_sub_3').html('ร้านช้อปปิ้งทั้งหมด')
    $('.head_title_sub_4').html('จัดการร้านช้อปปิ้ง')
    var url = "shop/shop_manage";
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
