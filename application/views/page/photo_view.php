<style>
.photo-preview{
/*        position:absolute; */
        left:0; right:0;
        top: 10%;
        margin:auto;
        /*this to solve "the content will not be cut when the window is smaller than the content": */
        max-width:100%;
        max-height:100%;
        overflow:auto;
}
.txt-caption{
	color: #fff;
	margin: 20px;
}
</style>
<?php 
	if($_GET[time]!=""){
		$txt_date = "ถ่ายเวลา ".date('Y-m-d h:i',$_GET[time])." น.";
	}else{
		$txt_date = "ไม่มีเวลาที่บันทึก";
	}
?>
<div style="position: absolute; background-color: #000; width: 100%;  height: 100%;">
	<div class="txt-caption font-24" align="center">
		 <?=$txt_date;?>
	</div>
	<img src="<?=$_GET[path]."?v=".time();?>" width="100%;" class="photo-preview" />
</div>