<div class="card">
      <div class="row">
			<div class="col-md-6">
				<div class="box box-outlined">
					<div class="box-head">
						<header><h4 class="text-light">ข้อมูลช้อปปิ้ง</h4></header>
					</div>
					<div class="box-body no-padding">
												<form class="form-horizontal form-bordered" role="form">
							<div class="form-group">
								<div class="col-lg-5 col-md-4 col-sm-3">
									<label for="shop_cost" class="control-label">ยอดช้อปปิ้ง</label>
								</div>
								<div class="col-lg-7 col-md-8 col-sm-9">
									<input type="number" name="shop_cost" id="shop_cost" class="form-control" onkeyup="calcost(this.value);" >
								</div>
							</div>
							<div style="padding: 10px;">
								<b class="font-16">ยอดรวม <span id="price">0</span> บาท</b>
							</div>
						</form>
					</div><!--end .box-body -->
				</div><!--end .box -->
			</div>
			
			<div class="col-md-6">
				<div class="box box-outlined">
					<div class="box-head">
						<header><h4 class="text-light">เอกสารยืนยันการโอน</h4></header>
					</div>
					<div class="box-body no-padding">
												<form class="form-horizontal form-bordered" role="form">
							<div class="form-group">
								
								<div class="col-lg-7 col-md-8 col-sm-9">
									<input type="file" id="uploadfile" name="uploadfile" onchange="readURLslip(this);" style="opacity: 1;">
								</div>
							</div>
							<div class="form-group" style="display: none;" id="box_preview_slip">
								<div id="" align="center">
			  			<img src="" width="100px" id="preview_img" style="border: 1px solid #ddd; box-shadow: 1px 1px 5px #615e5c; padding: 2px;cursor: pointer;" onclick="showImgModal('preview_img');">
			  					</div>
							</div>
							<div class="form-group">
								<table>
									<tr>
							  		<td>
							  			<span class="font-16">เวลาโอน</span> 
							  		</td>
							  		<td width="10"></td>
							  		<td width="120"><input type="text" value="" class="form-control" id="date_trans" name="date"  autocomplete="off" placeholder="ex..13/07/2018"></td>
							  		<td width="10"></td>
							  		<td width="120"><input type="text" id="pay_transfer_time" value="" class="form-control time-mask" placeholder="ex..16:54"></td>
							  	</tr>
								</table>
							</div>
						</form>
					</div><!--end .box-body -->
				</div><!--end .box -->
			</div>
		</div>
	  
	  <div class="row" style="margin-top: 10px;">
	  	<div class="col-md-6">
				<div class="box box-outlined">
					<div class="box-head">
						<header><h4 class="text-light">รายรับ/รายจ่าย</h4></header>
					</div>
					<table class="table">
									<thead>
										<tr>
											<th style="width:60px" class="text-center"></th>
											<th class="text-left">DESCRIPTION</th>
											<th style="width:140px" class="text-right">UNIT PRICE</th>
											<th style="width:90px" class="text-right">TOTAL</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">1</td>
											<td>รายรับบริษัท</td>
											<td class="text-right">10%</td>
											<td class="text-right">$770.00</td>
										</tr>
										<tr>
											<td class="text-center">2</td>
											<td></td>
											<td class="text-right">$215.00</td>
											<td class="text-right">$215.00</td>
										</tr>
										<tr>
											<td class="text-center">3</td>
											<td>commodo consequat &amp; Duis aute- irure dolor</td>
											<td class="text-right">$405.25</td>
											<td class="text-right">$1,621.00</td>
										</tr>
										
										<tr>
											<td></td>
											<td></td>
											<td class="text-right"><strong class="text-lg text-support3">Total</strong></td>
											<td class="text-right"><strong class="text-lg text-support3">$2,606.00</strong></td>
										</tr>
									</tbody>
								</table>
				</div>
			</div>
	  </div>
</div>