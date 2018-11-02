<style>
.btn-equal{
	padding: 5px;
}
</style>
<div class="section-body ">
		<div class="row" id="body_page_call">
			<div class="col-lg-12">
				<div class="box box-outlined">
					<div class="box-head">
						<div class="box-body" style="padding-bottom: 0px;">
						<form method="post" id="search_form">
		                  <table width="100%">
		                  		<tbody><tr>
		                  			<td width="50"><span style="font-size: 16px;">Code</span></td>
		                  			<td width="140"><input type="text" class="form-control" id="code" name="code" value="" style="width: 120px;"></td>
		                  			
		                  			<td width="65"><span style="font-size: 16px;">ทะเบียน</span></td>
		                  			<td width="140"><input type="text" class="form-control" id="plate_num" name="plate_num" value="" style="width: 120px;"></td>
		                  			
		                  			<td width="40"><span style="font-size: 16px;">วันที่</span></td>
		                  			<td width="140">				
										<input type="text" value="2018-11-02" class="form-control" id="datepicker" name="date" style="width: 120px;" autocomplete="off">
		                  			</td>
		                  			
		                  			<td valign="middle">
		                  				 <button type="submit" class="btn btn-primary" style="margin-top: 0px;">ค้นหา</button>
		                  			</td>
		                  		</tr>
		                  </tbody>
		                </table>

                  </form>
							
						</div>
					</div>
					<div class="box-body table-responsive" style="padding-top: 0;">
						<div class="card-body no-padding">         
						<h3 style="margin-top: 0;padding-left:30px;padding-top: 5px;"> 1 รายการ </h3> 
                     	<?php 
                     		foreach($order as $val){ ?>
                           <div onclick="openBook('70','S00070');" data-toggle="modal" data-target="#modal_lg" style="border: 1px solid #ccc;padding: 15px;cursor: pointer;">
                          <!-- <a class="tile-content ink-reaction pd-top-bottom" href="invoice.php?order=70" target="_blank" >-->
                              <table width="100%">
                                 <tbody><tr>
                                    <td>
                                       <div class="tile-text">
                                      	  <b class="txt_pay" role="" data="70"></b><br>
                                          <span>S00070</span><br>
                                          <small>
                                          คิงส์ พาวเวอร์ (ภูเก็ต)<br>
                                          </small>
                                          <small>2018-11-02</small>
                                       </div>
                                    </td>
                                    <td>
                                       <table width="100%" border="0" cellspacing="4" cellpadding="2" class="div-all-booking">
                                          <tbody>
                                             <tr>
                                                <td width="150" rowspan="6" valign="top">
                                                <img src="../../data/pic/driver/small/HKT0019.jpg?v=1541135917" width="120" height="120" class="img-pic" style="margin-top:5px;border-radius:5px;" border="0">   	
                                                </td>
                                                <td width="120"><strong>จำนวนแขก</strong></td>
                                                <td>ผู้ใหญ่ : 4 เด็ก : 1                                                </td>
                                             </tr>
                                             <tr>
                                                <td><strong>สัญชาติ</strong></td>
                                                <td>
                                                                                                    </td>
                                             </tr>
                                             <tr>
                                                <td><strong>ลงทะเบียนสำเร็จ</strong></td>
                                               <!-- <td>4 คน</td>-->
                                               <td>
                                               	 คน                                               </td>
                                             </tr>
                                             <tr>
                                                <td><strong>คนขับรถ</strong></td>
                                                <td class="font-22">ชื่อ - นามสกุล (โชค)                           						</td>
                           					</tr>
                           					<tr>
                                                <td><strong>เบอร์โทรศัพท์</strong></td>
                                                <td class="font-22">
                           							<a href="tel:0865265851" style="color:#333333;">0865265851</a>
                           						</td>
                           					</tr>
                           <tr>
	                           <td><strong>ข้อมูลรถ</strong></td>
	                           <td><b>ทะเบียน</b>&nbsp;กขค555&nbsp;ภูเก็ต</td>
                           </tr>
                           </tbody>
                           				</table>
                           			</td>
		                           <td>
		                           	 <div class="box-code">
                           <table>
                           	<tbody><tr>
                           		<td width="40">Code:</td>
                           		<td>
                           		<div class="btn-raised" style="border: 1px solid #eee; background: #eee; font-weight: 600; padding: 3px 7px;cursor: pointer;" onclick="showImgModal('1','70');"></div>
                           		</td>
                           	</tr>
                           </tbody></table>
                           
                           </div>
			                           <div>
			                           <img src="../../data/pic/place/1_logo.jpg" width="150px" alt="" class="img_place">			                           </div>
		                           </td>
                           		</tr>
                           	</tbody></table>
                           </div>
                        <?php 
							}
                     	?>      
                  </div>	
					</div><!--end .box-body -->
			</div><!--end .box -->
		</div>     
                    </div><!--end .row -->



</div>