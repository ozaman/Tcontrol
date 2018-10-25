function newCarType(){
	var name = $('#name_car_type').val();
	var data = {
		name_th : name
	}
	var url = base_url+"setting/add_car_type";
	console.log(url);
	 $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function changeStatusCarType(id, status){
	if(status==1){
		var change = 0;
	}else{
		var change = 1;
	}
	var data = {
		id : id,
		status : change
	}
	var url = base_url+"setting/change_status_car_type";
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function deleteCarType(id){
	var url = base_url+"setting/delete_car_type?id="+id;
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
//        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}
function editCarType(id){
	$('#txt_name_'+id).hide();
	$('#btn_edit_'+id).hide();
	$('#new_name_'+id).show();
	$('#btn_save_'+id).show();
}
function updateCarType(id){
	
	var name = $('#new_name_'+id).val();
	var data = {
		name_th : name
	}
	var url = base_url+"setting/update_car_type";
	console.log(url);
	 $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				$('#txt_name_'+id).text(name);
				$('#txt_name_'+id).show();
				$('#new_name_'+id).hide();
				$('#btn_save_'+id).hide();
				$('#btn_edit_'+id).show();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

////////////////////////////////////////////////////////
function newCarGen(){
	var name = $('#name_car_gen').val();
	var brand = $('#i_brand').val();
	var data = {
		name_en : name,
		i_brand : brand
	}
	var url = base_url+"setting/add_car_gen";
	console.log(url);
	 $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function changeStatusCarGen(id, status){
	if(status==1){
		var change = 0;
	}else{
		var change = 1;
	}
	var data = {
		id : id,
		status : change
	}
	var url = base_url+"setting/change_status_car_gen";
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function editCarGen(id){
	$('#txt_name_'+id).hide();
	$('#btn_edit_'+id).hide();
	$('#new_name_'+id).show();
	$('#btn_save_'+id).show();
}

function updateCarGen(id){
	
	var name = $('#new_name_'+id).val();
	var data = {
		name_en : name,
		id : id
	}
	var url = base_url+"setting/update_car_gen";
	console.log(url);
	 $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				$('#txt_name_'+id).text(name);
				$('#txt_name_'+id).show();
				$('#new_name_'+id).hide();
				$('#btn_save_'+id).hide();
				$('#btn_edit_'+id).show();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function deleteCarGen(id){
	var url = base_url+"setting/delete_car_gen?id="+id;
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
//        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

////////////////////////////////////////////////////////

function newCarBrand(){
	var name = $('#name_car_brand').val();
	
	var data = {
		name_en : name
	}
	var url = base_url+"setting/add_car_brand";
	console.log(url);
	 $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function changeStatusCarBrand(id, status){
	if(status==1){
		var change = 0;
	}else{
		var change = 1;
	}
	var data = {
		id : id,
		status : change
	}
	var url = base_url+"setting/change_status_car_brand";
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function editCarBrand(id){
	$('#txt_name_'+id).hide();
	$('#btn_edit_'+id).hide();
	$('#new_name_'+id).show();
	$('#btn_save_'+id).show();
}

function updateCarBrand(id){
	
	var name = $('#new_name_'+id).val();
	var data = {
		name_en : name,
		id : id
	}
	var url = base_url+"setting/update_car_brand";
	console.log(url);
	 $.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				$('#txt_name_'+id).text(name);
				$('#txt_name_'+id).show();
				$('#new_name_'+id).hide();
				$('#btn_save_'+id).hide();
				$('#btn_edit_'+id).show();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}

function deleteCarBrand(id){
	var url = base_url+"setting/delete_car_brand?id="+id;
	$.ajax({
        url: url, // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script, if anything
//        data: data,
        type: 'post',
        success: function(res) {
            console.log(res);
			if(res.result==true){
				location.reload();
			}
        },
        error: function(err) {
            console.log(err);
            //your code here
        }
    });
}