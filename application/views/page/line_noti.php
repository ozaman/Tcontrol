<script>
	$('.text-topic-action-mod').html('สมัครแจ้งเตือนไลน์');
</script>
<style type="text/css">
</style>

<div class="page-header card" >
	<div class="form-group" style="text-align: center; margin-top: 20px;">
		<legend style="font-size: 16px; color: #3b5998;">กรุณาจำชื่อผู้ใช้งานของตัวเอง</legend>
		<h2><?=$_COOKIE["app_remember_user"];?></h2>
		<!-- <input type="text" class="form-control" id="usernameline" placeholder="Email"  name="usernameline" value="<?=$_COOKIE["app_remember_user"];?>" > -->
	</div>
	<div id="state_one" type="image"  class="btn btn_se_line " onclick="regisAuthss()" style="text-align: center;">รับการแจ้งเตือน</div>
	<!-- <button id="state_two" type="image"  class="btn btn_se_line" onclick="saveregisAuthss()">ยืนยันการสมัครแจ้งเตือนไลน์</button> -->
	<!-- <a class="btn btn-default" href="listuser.php" role="button">list User</a> -->
</div>

<style>
.btn_se_line{
	margin-top: 100px;
	bottom: 50px;
	padding: 10px 0;
	font-size: 18px;
	background-color: #3b5998;
	color: #fff;
	z-index: 200;
	border-radius: 12px;
}
</style>

<script>
	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}
   function regisAuthss(){
   	var load = 'https://line.me/R/ti/p/%40lwt1228q';
   	console.log(load)
   	location.href = load;
   }
   function saveregisAuthss(){
   	console.log(getParameterByName('code'))
   	$.ajax({
   		type: 'POST',
   		url: 'https://www.welovetaxi.com/app/TShare_new/curl/savetokenLine.php',
   		data: { code: getParameterByName('code'),user: '<?=$_COOKIE["app_remember_user"];?>'},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res) {
            	console.log(res)
            	swal({
            		title: "ทำรายการสำเร็จ!",
            		text: "",
            		html: false,
            		type: "success"
            	},
            	function () {
            		$('.close-small-popup').click();
            		$('.button-close-popup-mod').click();
            		location.href='https://www.welovetaxi.com/app/TShare_new';
            	});
                //console.log(getParameterByName('code'))
            }
        });
   }
</script>