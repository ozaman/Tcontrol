<style>
   .drivertable{        
  		border-radius:5px; margin-top:10px; margin-bottom:10px;
  		border:0px solid #999999; background-color:#FFFFFF; 
   		box-shadow: 0px 1px 5px #DADADA;  }
   .tdtable  td {height:26px;}
   .img-car{
   		height: 60px;
/*   		width: auto;*/
		max-width: 85px;
   }
   .btn-action-car{
   	    border: 1px solid #ccc;
   	    color: #000;
   	    background-color: #fff;
   	    box-shadow: 1px 1px 3px #cacaca;
   }
</style>
<?php 
      	$sql = "SELECT t1.*, t2.txt_color,t2.plate_color, t3.name_th as car_type_txt FROM web_carall as t1 left join web_car_plate as t2 on t1.i_plate_color = t2.id left join web_car_use_type as t3 on t1.car_type = t3.id where t1.drivername  = '".$_COOKIE['detect_user']."' order by status_usecar desc, status desc  ";
      	$query_car = $this->db->query($sql);

      ?>
<div style="padding: 0px;">
   <div style="padding: 10px 10px;">
      <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addCar();">เพิ่มข้อมูลรถ</ons-button>
      	
   </div>
   <div style="margin-top: 10px;">
      <?php 
      	 $num = 0;
      	 $before = '';
         foreach ($query_car->result()  as $row){
         	$num++;
//         	echo $num;
         	$bg_plate = "background-color: ".$row->plate_color;
//         	$bg_plate = "background-color: #000;";
         	
         	$sql_carcolor = "SELECT name_th FROM web_car_color  WHERE id = ".$row->i_car_color." ";
	  		$query_carcolor = $this->db->query($sql_carcolor);
	  		$carcolor = $query_carcolor->row();
	  		
	  		$sql_pv = "SELECT name_th FROM web_province  WHERE id = ".$row->i_province." ";
	  		$query_pv = $this->db->query($sql_pv);
	  		$car_pv = $query_pv->row();

	  		if($row->status==1){
				$txt_status = "เปิดใช้งาน";
				$btn_use_often = "";
				$num_open_car+=1;
			}else{
				$txt_status = "หยุดใช้งาน";
				$btn_use_often = "display:none;";
				$num_close_car+=1;
			}
			
			if($before != $row->status){
				$before = $row->status; 
				if($row->status==1){
				?>
				
			<p class="intro" style=" color: #4CAF50;font-weight: bold;">ใช้งาน <span id="txt_num_car_open">0</span> คัน</p>	
		<?		}else{ ?>
			<p class="intro"  style=" color: #F44336;font-weight: bold;">หยุดใช้งาน <span id="txt_num_car_close">0</span> คัน</p>	
	<?	}
			}
		
			
         ?>
         
      <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;padding-bottom: 10px;">
         <ons-card class="card">
         	
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
                  <tr>
                     <td valign="middle" class="font-16">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                           	  <tr style="<?=$btn_use_often;?>">
                                 <td width="50%" height="50%" align="center" class="tool-td-chat">
                                 	 
								        <label class="left">
								         <?php 
								         	if($row->status_usecar==1){
												$this_status_usecar = "checked";
											}else{
												$this_status_usecar = "";
											}
								         ?>
								          <ons-radio <?=$this_status_usecar;?> class="radio-fruit" input-id="often-<?=$num;?>" value="<?=$num;?>" name="use_often" onclick="changeCarOften('<?=$row->id;?>');" ></ons-radio>
								        </label>
								        <label for="often-<?=$num;?>" class="center">ใช้ประจำ</label>
                                 </td>
                              </tr> 
                              <tr>
                                 <td width="50%" height="50%" align="center" class="tool-td-chat">
                                    <button type="button" class="button btn-action-car" id="edit_car_38" onclick="editCar('<?=$row->id;?>');" style="width:100%">
                                       <center>
                                          <div class="font-30"><i class="fa fa-edit" style="color:#3b5998"></i></div>
                                          <span style="padding-bottom:20px;" class="font-16"> แก้ไขข้อมูลรถ </span>
                                       </center>
                                    </button>
                                 </td>
                              </tr>
                              
                              <tr>
                                 <td width="50%" height="50%" align="center" class="tool-td-chat">
                                 	<?php 
                                 		if($row->status==1){ ?>
                                 			<button type="button" class="button btn-action-car" onclick="changeCarStatus('<?=$row->id;?>',0)" style="width:100%">
		                                       <center>
		                                          <div class="font-30"><i class="fa fa-car " style="color:#34cb4a;"></i></div>
		                                          <span style="padding-bottom:20px;" class="font-16">  ใช้งาน  </span>
		                                       </center>
		                                    </button>
                                 		<? }else{ ?>
											<button type="button" class="button btn-action-car" onclick="changeCarStatus('<?=$row->id;?>',1)" style="width:100%">
		                                       <center>
		                                          <div class="font-30"><i class="fa fa-car " style="color:#FF0000"></i></div>
		                                          <span style="padding-bottom:20px;" class="font-16">  หยุดใช้งาน  </span>
		                                       </center>
		                                    </button>
										<? }
                                 	?>
                                    
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td width="60%" valign="top" style="padding-left:5px">
                        <table width="100%" cellpadding="1" cellspacing="2" style="margin-top:0px;  margin-right: 0px; margin-bottom:0px; margin-right:0px; ">
                           <tbody>
                              <tr>
                                 <td width="80" height="70" align="center" bgcolor="#009999" style="
                                 border: solid 2px <?=$row->txt_color;?>; 
							     height: 50px;
							     color: #DADADA;
							     padding: 5px;
							     padding-right: 10px;
							     border-radius: 10px;

                                 <?=$bg_plate;?>">
                                 <font color="<?=$row->txt_color;?>" class="font-32"><b><?=$row->plate_num;?><br> 
                                    <font class="font-16"><?=$car_pv->name_th;?></font></b></font>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                           <tbody>
                              <tr>
                                 <td width="50" class="font-16"><strong>ประเภท</strong></td>
                                 <td class="font-16"><?=$row->car_type_txt;?></td>
                              </tr>
                              <tr>
                                 <td class="font-16"><strong>ยี่ห้อ</strong></td>
                                 <td class="font-16"><?=$row->car_brand;?></td>
                              </tr>
                              <!--<tr>
                                 <td class="font-16"><strong>รุ่น</strong></td>
                                 <td class="font-16"></td>
                              </tr>-->
                              <tr>
                                 <td class="font-16"><strong>สีรถ</strong></td>
                                 <td class="font-16"><?=$carcolor->name_th;?></td>
                              </tr>
                              <tr>
                                 <td class="font-16"><strong>สถานะ</strong></td>
                                 <td class="font-16">
                                    <font color="#3b5998"><strong><?=$txt_status;?></strong></font>
                                    <!--<span style="font-size: 12px;"><b>(ใช้งาน)</b></span>-->
                                 </td>
                              </tr>
                              <tr>
                              	<td class="font-16">
                              		<strong>เพิ่มเมื่อ</strong>
                              	</td>
                              	<td class="font-15">
                              		<?=date("Y-m-d h:i",$row->post_date);?>
                              	</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-15px;">
               <tbody>
                  <tr style="display:nones">
                     <td width="33%" align="center" ><img class="<?=$row->id;?>_pic_car_1 img-car" src="assets/images/nopic.png"     border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                     <td width="33%" align="center" ><img class="<?=$row->id;?>_pic_car_2 img-car" src="assets/images/nopic.png"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                     <td width="33%" align="center" ><img class="<?=$row->id;?>_pic_car_3 img-car" src="assets/images/nopic.png"    border="0"      style="margin-top:15px;border-radius:5px;" /></td>
                  </tr>
               </tbody>
            </table>
         </ons-card>
      </div>
      <script>
         setTimeout(function(){ checkPicCar('<?=$row->id;?>','<?=$_GET[checkcalledit];?>'); }, 500);
      </script>

      <?php  }  ?>
      <input type="hidden" value="<?=$num_open_car;?>" id="num_open_car" />
      <input type="hidden" value="<?=$num_close_car;?>" id="num_close_car" />
   </div>
</div>
<input type="hidden" value="<?=$num;?>" id="detect_num_car" />