<?php 
		$rand = time().generateRandomString();    	
    	function generateRandomString($length = 10) {
		    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
?>

<form name="form_addbank" id="form_addbank"  enctype="multipart/form-data">
<input type="hidden" value="<?=$rand;?>" id="rand" name="rand" />
<ons-card class="card">
	<ons-list-header class="list-header"><b>ข้อมูลบัญชี</b></ons-list-header>
	<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <i class="material-icons">account_circle</i><!--<span class="txt-important">*</span>-->
            </div>
            <label class="center list-item__center">
                <ons-input id="bank_name-input" float="" maxlength="30" placeholder="ชื่อบัญชี" name="bank_name" style="width:100%;" value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="ชื่อบัญชี" name="bank_name" >
                    <span class="text-input__label">
                        ชื่อบัญชี</span>
                </ons-input>
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <i class="material-icons">account_balance_wallet</i><!--<span class="txt-important">*</span>-->
            </div>
            <label class="center list-item__center">
                <ons-input id="bank_number-input" float="" maxlength="30" placeholder="เลขที่บัญชี" name="bank_number" style="width:100%;" value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="เลขที่บัญชี" name="bank_number" >
                    <span class="text-input__label">
                        เลขที่บัญชี</span>
                </ons-input>
            </label>
        </ons-list-item>  
      <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" >
                <i class="material-icons">account_balance</i>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'ธนาคาร', 'open':'bank_list'}, 'lift-ios')">
                <span id="txt_bank" style="color: #9E9E9E;" >เลือกธนาคาร</span>
                <input type="hidden" name="bank" id="bank" value="" />
            </div>
      </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <i class="fa fa-font-awesome" aria-hidden="true" style=" font-size: 24px;  margin-left: 3px;"></i>
            </div>
            <label class="center list-item__center">
                <ons-input id="branch_bank-input" float="" maxlength="30" placeholder="สาขาธนาคาร" name="bank_branch" style="width:100%;" value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="สาขาธนาคาร" name="bank_branch" >
                    <span class="text-input__label">
                        สาขาธนาคาร</span>
                </ons-input>
            </label>
        </ons-list-item>
        
</ons-card>
<ons-card  class="card">
      <ons-list-header class="list-header"><b>ภาพสมุดบัญชีธนาคาร</b></ons-list-header>
      <div align="center" style="margin-top: 10px;">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_book_bank" onchange="readURL(this,'img_book_bank','add');"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-img_book_bank" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_book_bank" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_book_bank" onclick="performClick('img_book_bank');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_book_bank"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card>  
</form>
<div style="padding: 10px; margin-bottom: 10px;">
	<ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="submitAddBank();" style="background-color: #fff;">เพิ่มข้อมูลบัญชี</ons-button>
</div>