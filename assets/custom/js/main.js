function shop(opt) {
	console.log(opt+"_____"+'options')
	if (opt == 'store') {
		// var url = "shop/data_shop_all";
		// $.post(url,function(ele){
		// 	$('#body_page_call').html(ele);
		// });

		// $('#head_title').html('จัดการร้านค้า')
		// $('#head_title_sub').html('ร้านค้าทั้งหมด')
		// $('#head_title_sub_2').hide()
		// $('.head_title_sub_3').hide()

		// $('.head_title_sub_4').hide()

		var url = "shop/data_shop_all";
		$.post(url,function(ele){
			$('#body_page_call').html(ele);
		});
	}
	if (opt == 'categorie') {
		// $('.head_title').html('จัดการร้านค้า')
		// $('.head_title_sub').html('หมวดหมู่ทั้งหมด')
		// $('.head_title_sub_2').hide()
		// $('.head_title_sub_3').hide()
		// $('.head_title_sub_4').hide()
		


		var url = "shop/data_shop_categorie";
		$.post(url,function(ele){
			$('#body_page_call').html(ele);
		});
	}
}
$('#send_login').click(function(){
   login()
});

function login() {
	console.log($('#form_login').serialize())
	var url = base_url + "login/login";
	// var param = {
	// 	id: item
	// }
	console.log(url)

	$.ajax({
		url: url,
		data: $('#form_login').serialize(),
		type: 'post',
		dataType: 'json',
		error: function() {
			console.log('Error Profile');
		},
		success: function(res) {
             console.log(res);
             if (res.status == true) {
             	location.href = base_url;
             }
             else{
             	 Command: toastr[res.icon](res.msg)
             }
             // $('.box_region_show').html(ele);

         }
     });
}