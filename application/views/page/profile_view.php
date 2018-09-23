<?php 
			$name_th = "ชื่อ - นามสกุล";
			$name_en = "ชื่อ - นามสกุล (อังกฤษ)";
			$nickname = "ชื่อเล่น";
			$idcard = "เลขบัตรประชาชน";
			$address = "ที่อยู่ปัจจุบัน";
			$phone = "เบอร์โทรศัพท์";
			$phone2 = "เบอร์โทรศัพท์ที่สอง (ไม่บังคับ)";
			$phone_em = "เบอร์โทรศัพท์ฉุกเฉิน";
			$province = "จังหวัดที่คุณอยู่ประจำ";
			$email = "อีเมล์";
			$plate = "เลขทะเบียนรถ";
			$card_dv = "เลขใบขับขี่";
			$txt_ex_idcard = "วันหมดอายุ";
			$txt_ex_iddriving = "วันหมดอายุ";
			$username = "ชื่อผู้ใช้งาน";
			$password = "รหัสผ่าน";
			
		$sql = "SELECT * FROM web_driver  WHERE id = ".$_COOKIE['detect_user']." ";
	  	$query = $this->db->query($sql);
	  	$driver = $query->row();
	  	
	  	if($driver->i_gender==0){
					$ck_men = "checked";
				}else{
					$ck_men = "";
				}
				
				if($driver->i_gender==1){
					$ck_girl = "checked";
				}else{
					$ck_girl = "";
				}
				
		$sql = "SELECT id,name,name_th,name_cn FROM web_province WHERE id = ".$driver->province." ";
	  	$query = $this->db->query($sql);
	  	$pv = $query->row();
	  	if($pv->name_th!=""){
			$txt_pv = $pv->name_th;
		}else{
			$txt_pv = "เลือกจังหวัด";
		}		
		?>

<div style="padding: 1px 0 0 0;">
	<!--<p class="intro" >
      กรุณากรอกข้อมูลที่เป็นความจริง เพื่อง่ายต่อการทำงานและการติดต่อของท่าน
    </p>-->
	<form name="edit_form" id="edit_form"  enctype="multipart/form-data">
	<input type="hidden" value="<?=$rand;?>" id="rand" name="rand" />
	<input type="hidden" value="" id="code_privince" name="code_privince" />
	<input type="hidden" value="<?=$_GET[ref];?>" id="register_reference" name="register_reference" />
    <ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลส่วนตัว</b></ons-list-header>
		 <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon><!--<span class="txt-important">*</span>-->
            </div>
            <label class="center list-item__center">
                <ons-input id="username-input" float="" maxlength="30" placeholder="<?=$username;?>" name="username" style="width:100%;" disabled value="<?=$driver->username;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$username;?>" name="username" >
                    <span class="text-input__label">
                        <?=$username;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-key" class="list-item__icon ons-icon" style="padding-left: 0px;"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="password-input" float="" maxlength="30" placeholder="<?=$password;?>" name="password" style="width:100%;" value="<?=$driver->password;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$password;?>" name="password" >
                    <span class="text-input__label">
                        <?=$password;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$name_th;?>" name="name_th" style="width:100%;" value="<?=$driver->name;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_th;?>" name="name_th">
                    <span class="text-input__label">
                        <?=$name;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name_en-input" float="" maxlength="30" placeholder="<?=$name_en;?>"  name="name_en" style="width:100%;" value="<?=$driver->name_en;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_en;?>"  name="name_en">
                    <span class="text-input__label">
                        <?=$name_en;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="nickname-input" float="" maxlength="30" placeholder="<?=$nickname;?>"  name="nickname" style="width:100%;" value="<?=$driver->nickname;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$nickname;?>"  name="nickname">
                    <span class="text-input__label">
                        <?=$nickname;?></span>
                </ons-input>
            </label>
        </ons-list-item>
       
        <ons-list-item class="input-items list-item p-l-0" >
        	<div class="left list-item__left">
                 
                 <ons-icon icon="fa-venus-mars" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
           
            	<ons-list-item tappable onclick="selectGender(0);" style="border-bottom: 0px solid #ccc;">
		        <label class="left">
		          
		          <ons-radio class="radio-fruit" input-id="radio-man" value="0" name="check" <?=$ck_men;?>></ons-radio>
		        </label>
		        <label class="center" for="radio-man" style="background-image: unset;">
		          ชาย
		        </label>
		      </ons-list-item>
		        <ons-list-item tappable onclick="selectGender(1);" style="border-bottom: 0px solid #ccc;">
		        <label class="left">
		        
		         <ons-radio class="radio-fruit" input-id="radio-girl" value="1" name="check" <?=$ck_girl;?>></ons-radio>
		        </label>
		        <label class="center" for="radio-girl" style="background-image: unset;">
		          หญิง
		        </label>
		      </ons-list-item>
		    
            <input type="hidden" value="<?=$driver->i_gender;?>" id="gender" value="" name="gender"/>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-home" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="address-input" float=""  placeholder="<?=$address;?>" name="address" style="width:100%;" value="<?=$driver->address;?>">
                    <input type="text" class="text-input" placeholder="<?=$address;?>" name="address" id="address">
                    <span class="text-input__label">
                        <?=$address;?></span>
                </ons-input>
            </label>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone;?>" name="phone" style="width:100%;" value="<?=$driver->phone;?>">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone;?>" name="phone" id="phone" onkeyup="validPhoneNum($(this).val());" >
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_phone" />
                 <i id="corrent-phone" class="fa fa-check-circle pass checking-phone" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-phone" class="fa fa-times-circle no-pass checking-phone" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important"></span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone2;?>" name="phone2" style="width:100%;" value="<?=$driver->phone2;?>">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone2;?>" name="phone2" id="phone2" >
                    <span class="text-input__label">
                        <?=$phone2;?></span>
                </ons-input>
             
            </label>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <div class="center list-item__center" style="   /* margin-left: -7px;*/">
                <ons-input id="phone_em-input" float="" placeholder="<?=$phone_em;?>" name="phone_em" style="width:100%;"  maxlength="10" value="<?=$driver->phone_emergency;?>" >
                    <input type="number" pattern="\d*" class="text-input" placeholder="<?=$phone_em;?>" name="phone_em" id="phone_em"  maxlength="10">
                    <span class="text-input__label">
                        <?=$phone_em;?></span>
                </ons-input>
            </div>
            
            <div class="right list-item__right">
                <ons-select name="em_person" id="em_person" style=" right: 0px;  margin-top: 0px;  width: 100%;">
						    <option>สถานะ</option>
			  <?php 
//            	 $query_em = $this->db->get('web_emergency_person');
				 $sql = "SELECT id,name_th FROM web_emergency_person  WHERE status = 1 order by i_index asc ";
	  			 $query = $this->db->query($sql);
            	 foreach($query->result() as $val){ 
            	 if($val->id==$driver->emergency_person){
				 	$select_em = "selected";
				 }else{
				 	$select_em = "";
				 }
            	 ?>
			      <option value="<?=$val->id;?>" <?=$select_em;?> ><?=$val->name_th;?></option>  	
			    <?    }
            	?>
				</ons-select>
            </div>
        </ons-list-item>
		
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="padding-right: 20px;">
                <!--<ons-icon icon="fa-location-arrow" class="list-item__icon ons-icon"></ons-icon>-->
                <i class="material-icons">location_on</i>
                <span class="txt-important">*</span>
            </div>
            <label class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'user_province'}, 'lift-ios')">
                <span id="txt_user_province" style="color: #000;margin-left: 0px;" ><?=$txt_pv;?></span>
                 <input type="hidden" name="province" id="province" value="<?=$driver->province;?>" />
            </label>
            
        </ons-list-item>
             
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-at" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="email-input" float="" placeholder="<?=$email;?>" name="email" style="width:100%;" value="<?=$driver->email;?>">
                    <input type="email" class="text-input"  placeholder="<?=$email;?>" name="email" id="email" onkeyup="validEmail($(this).val());">
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
                <i id="corrent-email" class="fa fa-check-circle pass checking-mail" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-email" class="fa fa-times-circle no-pass checking-mail" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
		
 		
		<ons-list-header class="list-header"><b>ภาพประจำตัว</b></ons-list-header>        
        <div align="center">
			<div >
			  
			  <input type="file" class="cropit-image-input" id="img_profile" accept="image/*"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-profile" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-profile" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_profile"  style="width: 170px;height: 170px;" onclick="performClick('img_profile');">
	      	<img src="../data/pic/driver/small/default-avatar.jpg" style="max-width: 100%; height: 170px;" id="pv_profile"   /><br/>
	      	<span class="txt-upload-profile" style="margin-left: -42px;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; แก้ไขรูปภาพ</span>
	      </div> 
	    </div>
	   

    </ons-card>
    
    <ons-card  class="card">
      <ons-list-header class="list-header"><b>เลขประชาชน/วันหมดอายุ</b></ons-list-header>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <ons-icon icon="fa-id-badge" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="idcard-input" float="" placeholder="<?=$idcard;?>" name="idcard" style="width:100%;" value="<?=$driver->idcard;?>">
                    <input type="number" pattern="\d*" class="text-input" placeholder="<?=$idcard;?>" onkeyup="checkIdCard(this.value);" name="idcard" id="idcard">
                    <span class="text-input__label">
                        <?=$idcard;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_idc" />
                <!---- 0=pass, 1=incorrect, 2=overlap ----->
                <i id="corrent-idc" class="fa fa-check-circle pass checking" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-idc" class="fa fa-times-circle no-pass checking" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
            	<img src="assets/images/ex_card/crd.png?v=<?=time();?>" width="25px;" />
                <!--<b style="width: 100px;font-size: 14px;">หมดอายุ</b>-->
            </div>
            <div class="center list-item__center">
                <!--<ons-input id="idcard-input" float=""  name="ex_idcard" style="width:100%;" value="" placeholder="<?=$txt_ex_idcard;?>" >
                    <input type="text"  class="text-input"  name="ex_idcard" id="ex_idcard">
                    <span class="text-input__label">
                        <?=$txt_ex_idcard;?></span>
                </ons-input>-->
                 <ons-input id="idcard-input" float=""  name="ex_idcard" style="width:100%;" value="<?=$driver->idcard_finish;?>" placeholder=""  >
                    <input type="date"  class="text-input"  name="ex_idcard" id="ex_idcard">
                    <span class="text-input__label">
                        </span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 45px;"><?=$txt_ex_idcard;?></span>  
            </div>
            
        </ons-list-item>
        <div align="center" style="margin: 10px;">
			<div >
			  <!--<button class="btn-ip" type="button">เลือกภาพบัตรประจำตัวประชาชน</button>-->
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_id_card"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-id_card" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-id_card" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_id_card" >
	      	<img src="assets/images/ex_card/id_card.jpg?v=<?=time();?>" class="img-preview-show" id="pv_id_card" onclick="performClick('img_id_card');" />
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -4px;
/*    bottom: 278px;*/
	margin-top: -25px;
    border-top-left-radius: 5px; pointer-events: none;" ><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; แก้ไขรูปภาพ</span>
	    </div>
        
 	</ons-card>

   <ons-card  class="card">
	<ons-list-header class="list-header"><b>ใบขับขี่/วันหมดอายุ</b></ons-list-header>  
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" >
                <ons-icon icon="fa-id-card-o" class="list-item__icon ons-icon"></ons-icon><span class="txt-important" style="margin-left: 35px;">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="iddriving-input" float="" placeholder="<?=$card_dv;?>" name="iddriving" style="width:100%;" value="<?=$driver->iddriving;?>">
                    <input type="text" class="text-input" placeholder="<?=$card_dv;?>"  name="iddriving" id="iddriving">
                    <span class="text-input__label">
                        </span>
                </ons-input>    
               
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 6px; padding-right: 18px;">
            	<img src="assets/images/ex_card/crd.png" width="25px;" />
                <!--<b style="width: 100px; font-size: 14px;">หมดอายุ</b>-->
            </div>
            <div class="center list-item__center">
                <!--<ons-input id="idcard-input" float=""  name="ex_iddriving" style="width:100%;" value=""  >
                    <input type="text"  class="text-input"  name="ex_iddriving" id="ex_iddriving">
                    <span class="text-input__label"><?=$txt_ex_iddriving;?></span>
                </ons-input>-->
                <ons-input id="idcard-input" float=""  name="ex_iddriving" style="width:100%;" value="<?=$driver->iddriving_finish;?>"  >
                    <input type="date"  class="text-input"  name="ex_iddriving" id="ex_iddriving">
                    <span class="text-input__label"></span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 45px;"><?=$txt_ex_iddriving;?></span>
            </div>
        </ons-list-item>
      <div align="center" style="margin: 10px;">
			<div >
			  <!--<button class="btn-ip" type="button" onclick="$('#img_id_driving').click();" >เลือกภาพใบขับขี่</button>-->
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_id_driving"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-id_driving" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-id_driving" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_id_driving" >
	      	<img src="assets/images/ex_card/id_driving.jpg" class="img-preview-show" id="pv_id_driving" onclick="performClick('img_id_driving');" />
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -4px;
    /*bottom: 22px;*/
    margin-top: -25px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; แก้ไขรูปภาพ</span>
	    </div>
	</ons-card>
</form>
     <div style="margin: 0px 10px;">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="saveDataPf();" style="background-color: #fff;" >แก้ไขข้อมูลส่วนตัว</ons-button>
    </div>
	
</div>   
<template id="pf_edit-dialog.html">
	  <ons-alert-dialog id="pf_edit-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="pf_edit-submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการแก้ไขข้อมูลส่วนตัว
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="$('#pf_edit-alert-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="saveDataPf()">ยืนยัน</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
	
	 <script src="<?=base_url();?>assets/script/profile.js"></script>   