<?php 
	
	$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('id' => $_GET[order_id]), '');
	
	$sql_ps = "SELECT topic_th ,id FROM shopping_product  WHERE id='".$data->program."' ";
 	$query_ps = $this->db->query($sql_ps);
 	$res_ps = $query_ps->row();
?>
<style>
	.list-pd-r{
		padding-left: 15px;
	}
	.txt-center{
		color: #afafaf;
	}
</style>
<div style="padding: 10px 0px;">
	<p class="intro">
		<span class="font-22" style="color: #2cce33;">เสร็จสมบูรณ์</span><br/>
		<span class="font-16 txt-center">คุณได้รับค่าตอบแทนจากการส่งแขกแล้ว</span>
	</p>
</div>

<div style="padding: 0px 0px; background-color:#fff; ">
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">เลขการจอง</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=$data->invoice;?></span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">สถานที่ส่ง</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=$res_ps->topic_th;?></span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">จำนวนแขก</span>
	    </div>
	    <div class="right">
	    	<span class="font-16">ผู้ใหญ่ <?=$data->adult;?> เด็ก <?=$data->child;?></span>
	    </div>
	</ons-list-item>
</div>

<div style="margin: 15px 0px; background-color:#fff; ">
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">ค่าตอบแทน</span>
	    </div>
	    <div class="right">
	    	<span class="font-16">ค่าหัว + ค่าจอด</span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">รายรับ</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=number_format($data->price_all_total,2);?> บาท</span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">เวลาสร้าง</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=date("Y-m-d h:i:s",$data->post_date);?></span>
	    </div>
	</ons-list-item>
	<ons-list-item>
	    <div class="center list-pd-r">
	    	<span class="font-16 txt-center">เวลาเสร็จสิ้น</span>
	    </div>
	    <div class="right">
	    	<span class="font-16"><?=date("Y-m-d h:i:s",$data->driver_complete_date);?></span>
	    </div>
	</ons-list-item>
</div>