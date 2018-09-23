<style>
.btn-action-bank{
   	    border: 1px solid #ccc;
   	    color: #000;
   	    background-color: #fff;
   	    box-shadow: 1px 1px 3px #cacaca;
   }
   .logo-bank{
   	width: 50px; 
   	box-shadow: 1px 2px 3px #9E9E9E; 
   	border-radius: 10px;
   }
   .bookbank-img{
   	height: 60px; 
   	width: 100px; 
   	border: 1px solid #eee; 
   	box-shadow: 1px 1px 3px #ccc;
   }
</style>
<div style="padding: 10px 10px;">
    <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addBank();">เพิ่มข้อมูลบัญชี</ons-button>
</div>

<?php 
		$sql = "SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id order by status_often desc, status desc ";
      	$query_bank = $this->db->query($sql);
      	$num = 0;
      	foreach($query_bank->result()  as $row){ 
      	$num+=1;
      	if($row->status==0){
      		$tr_often = "display:none;";
      		$num_close_bank +=1;
      	}else{
			$tr_often = "";
			$num_open_bank +=1;
		}
		
		if($before != $row->status){
				$before = $row->status; 
				if($row->status==1){
				?>
				
			<p class="intro" style=" color: #4CAF50;font-weight: bold;">ใช้งาน <span id="txt_num_bank_open">0</span> บัญชี</p>	
		<?php		}else{ ?>
			<p class="intro"  style=" color: #F44336;font-weight: bold;">หยุดใช้งาน <span id="txt_num_bank_close">0</span> บัญชี</p>	
	<?php	}
			}
      	?>
			<ons-card class="card">
				<table width="100%">
					<tr>
						<td width="35%">
							<table width="100%">
								<tr style="<?=$tr_often;?>">
							   	  	<td colspan="">
							   	  		<label class="left">
								         <?php 
								         	if($row->status_often==1){
												$this_status_usecar = "checked";
											}else{
												$this_status_usecar = "";
											}
								         ?>
								          <ons-radio <?=$this_status_usecar;?> class="radio-fruit" input-id="often-<?=$num;?>" value="<?=$num;?>" name="use_often" onclick="changeBankOften('<?=$row->id;?>');" ></ons-radio>
								        </label>
								        <label for="often-<?=$num;?>" class="center">ใช้ประจำ</label>
							   	  	</td>
							   	  </tr>
								<tr>
									<td>
										<button type="button" class="button btn-action-bank" onclick="editBank('<?=$row->id;?>');" style="width:100%">
	                                       <center>
	                                          <div class="font-30"><i class="fa fa-edit" style="color:#3b5998"></i></div>
	                                          <span style="padding-bottom:20px;" class="font-16"> แก้ไขข้อมูล </span>
	                                       </center>
	                                    </button>
									</td>
								</tr>
								<tr>	
									<td>
										<?php 
											if($row->status==1){ ?>
												<button type="button" class="button btn-action-bank" onclick="changeBankStatus('<?=$row->id;?>',0)" style="width:100%">
			                                       <center>
			                                          <div class="font-30"><i class="fa fa-check " style="color:#34cb4a;"></i></div>
			                                          <span style="padding-bottom:20px;" class="font-16">  ใช้งาน  </span>
			                                       </center>
			                                    </button>
										<?php	}else{ ?>
												<button type="button" class="button btn-action-bank" onclick="changeBankStatus('<?=$row->id;?>',1)" style="width:100%">
			                                       <center>
			                                          <div class="font-30"><i class="fa fa-times " style="color:#ff0000;"></i></div>
			                                          <span style="padding-bottom:20px;" class="font-16">  หยุดใช้งาน  </span>
			                                       </center>
			                                    </button>
										<?php }
										?>
										
									</td>
								</tr>
							</table>
						</td>
						<td>
							<table width="100%" border="0" cellspacing="2" cellpadding="2">
							   <tbody>
							   	  <tr>
							   	  
							   	  </tr>
							   	  <tr>
							         <td width="80" class="font-16 "><strong>ชื่อบัญชี</strong></td>
							         <td>
							            <div class="input-group date" style="padding:0px;width: 100%"><span><?=$row->bank_name;?></span></div>
							         </td>
							      </tr>
							      <tr>
							         <td width="80" class="font-16"><strong>เลขที่บัญชี</strong></td>
							         <td width="" class="font-16"> <span><?=$row->bank_number;?></span></td>
							      </tr>
							      <tr>
							         <td width="80" class="font-16 "><strong>ธนาคาร</strong></td>
							         <td width="" class="font-16 " >
							            <span><?=$row->bank_list;?> </span>
							         </td>
							      </tr>
							      <tr>
							      	<td class="font-16 "><strong>สาขา</strong></td>
							      	<td width="" class="font-16 " >
							            <span><?=$row->bank_branch;?> </span>
							         </td>
							      </tr>
							      <!--<tr>
							      	<td class="font-16 "><strong>วันที่เพิ่ม</strong></td>
							      	<td width="" class="font-16 " >
							            <span><?=date('Y-m-d h:i',$row->post_date);?> </span>
							         </td>
							      </tr>../data/pic/driver/book_bank/<?=$row->id;?>.jpg-->
							      <tr>
							   	  	<td colspan="2">
							   	  		<table width="100%">
							   	  			<tr>
							   	  				<td><img id="<?=$row->id;?>_bookbank" src="assets/images/nopic.png" class="bookbank-img" /></td>
							   	  				<td width="70" align="center"><img src="assets/images/bank/<?=$row->bank_img;?>" class="logo-bank" /></td>
							   	  			</tr>
							   	  		</table>
							   	  		
							   	  		
							   	  	</td>
							   	  </tr>
							   </tbody>
							</table>
						</td>
					</tr>
				</table>
			</ons-card>
			<script>
				setTimeout(function(){ checkPicBank('<?=$row->id;?>','<?=$row->id;?>_bookbank'); }, 500);
			</script>
<?php		}
?>
<input type="hidden" value="<?=$num_open_bank;?>" id="num_open_bank" />
<input type="hidden" value="<?=$num_close_bank;?>" id="num_close_bank" />
<input type="hidden" value="<?=$num;?>" id="detect_num_bank" />
