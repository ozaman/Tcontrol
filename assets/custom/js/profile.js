

function get_profile() {
    // alert('aaaaa')
    // console.log(username);
    $('#head_title').html('home')
    $('#head_title_sub').html('profile')
    $('#head_title_sub_2').hide()
    $('#head_title_sub_3').hide()
    $('.head_title_sub_4').hide()
    
    var url = "profile/get_profile";
    $.post(url,function(ele){
        $('#body_page_call').html(ele);
    });

}
