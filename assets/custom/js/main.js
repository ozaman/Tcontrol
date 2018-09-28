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