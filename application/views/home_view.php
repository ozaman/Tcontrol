<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
<?php 

if($this->Mobile_model->version('iPad')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPad';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('iPhone')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPhone';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('Android')){
    // Code to run for the Apple iOS platform.
$fontmobile=6;
$detectname='Android';
$menu_ion_class = "icon-menu-android";
$border_menu_color = "#eee";
}
else {
$fontmobile=6;	
$detectname='Other';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
$border_menu_color = "border-bottom: 1px solid ".$border_menu_color;
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>T-Share</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--<link rel="stylesheet" href="front_bank/css/thbanklogos.min.css" id="stylesheet">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=time()?>">

    <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/custom.css?v=<?=time()?>">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css?v=<?=time()?>">
<link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsen-css-components.css?v=<?=time()?>">
<script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js?v=<?=time()?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!--<script src="js/jquery.touchSwipe.min.js"></script>-->
<script src="<?=base_url();?>assets/plugin/moment.js?v=<?=time()?>"></script>
<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time();?>"></script>
<!-- <script async defer   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>&v=<?= time(); ?>"></script> -->
<ons-modal direction="up">
	  <div style="text-align: center;">
	    <p sty>
	      <ons-icon icon="md-spinner" size="25px" spin></ons-icon> <span size="18px">Loading...</span>
	    </p>
	  </div>
</ons-modal>
<script>
	
//	alert('<?=$detectname;?>');
	var modal = document.querySelector('ons-modal');
		modal.show();
	var today = "<?=date('Y-m-d');?>";
    var detect_mb = "<?=$detectname;?>";
    var detect_user = $.cookie("detect_user");
   	  var class_user = $.cookie("detect_userclass");
      var username = $.cookie("detect_username");
      console.log(detect_mb+" : "+class_user+" : "+username);
	  if(username=="" || typeof username == 'undefined'){
//	  		window.location = "signin";
			$.cookie("detect_user",'153');
			$.cookie("detect_userclass",'taxi');
			$.cookie("detect_username",'HKT0153');
			location.reload();
	  }else{
	  		username = username.toUpperCase();
	  }
	</script>



<style>
	.icon-menu-ios{
		    margin-left: 7px;
    		padding-right: 10px;
	}
	.icon-menu-android{
		    margin-left: 7px;
    		padding-right: 20px;
	}
</style>
<body style="">

    <ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
        <ons-page>
            <ons-splitter id="appSplitter">
                <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="left" collapse="" width="260px"></ons-splitter-side>
                <ons-splitter-content page="tabbar.html"></ons-splitter-content>
            </ons-splitter>
        </ons-page>
    </ons-navigator>

    <template id="tabbar.html">
        <ons-page id="tabbar-page tabbar_page">
            <ons-toolbar>
                <div class="left">
                    <ons-toolbar-button onclick="fn.toggleMenu()">
                        <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </ons-toolbar-button>
                </div>
                <div class="center">หน้าหลัก</div>
                <div class="right">
                    <ons-toolbar-button onclick="profileInfo('lift-ios')">
                        <img src="../data/pic/driver/small/default-avatar.jpg" class="shotcut-profile" />
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <ons-tabbar swipeable id="appTabbar" position="auto">
                <ons-tab label="หน้าหลัก" icon="ion-home" page="home.html" active></ons-tab>
                <ons-tab label="Forms" icon="ion-edit" page="forms.html"></ons-tab>
                <ons-tab label="Animations" icon="ion-film-marker" page="animations.html"></ons-tab>
            </ons-tabbar>
			
            <script>
                ons.getScriptPage().addEventListener('prechange', function(event) {
        if (event.target.matches('#appTabbar')) {
          event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
        }
      });
    </script>
        </ons-page>
    </template>

    <template id="sidemenu.html">
        <?=$_COOKIE['detect_user'];?>
        <ons-page> 
            <div class="profile-pic" align="center">

                <img src="../data/pic/driver/small/default-avatar.jpg" class="profile-pic-big">

            </div>
            <!--<ons-list-title>เมนู</ons-list-title>-->
            <ons-list>
                <ons-list-item expandable>
                    <div class="left">
                        <!--<ons-icon fixed-width class="list-item__icon" icon="ion-edit, material:md-edit"></ons-icon>-->
                        <i class="icon-new-uniF133-2 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_profile');">
                        ข้อมูลส่วนตัว
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="profileInfo('slide-ios');">ข้อมูลส่วนตัว</div>
                     <?php 
                    	$this->db->select('id');
						$this->db->where('driver_id = '.$_COOKIE['detect_user']);
						$query = $this->db->get('web_bank_driver');
						$num_bank = $query->num_rows();
                    ?>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="myAccountBank();" >บัญชีธนาคาร (<?=$num_bank." บัญชี";?>)</div>
                    <div class="right arr" id="list_profile">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                
                <ons-list-item onclick="myCar();">
                <?php 
                    	$this->db->select('id');
						$this->db->where('drivername = '.$_COOKIE['detect_user']);
						$query = $this->db->get('web_carall');
						$num = $query->num_rows();
                    ?>
                    <div class="left" style="">
                         <i class="icon-new-uniF10A-9 list-item__icon"></i>
                    </div>
                    <div class="center" >
                        ข้อมูลรถ (<?=$num;?> คัน)
                    </div>
                   
                </ons-list-item>
                <!--<ons-list-item expandable>
                    <div class="left">
                       <i class="icon-new-uniF10A-9 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_car_info');">
                        ข้อมูลรถ
                    </div>
                    <?php 
                    	$this->db->select('id');
						$this->db->where('status = 1 and drivername = '.$_COOKIE['detect_user']);
						$query = $this->db->get('web_carall');
						$num = $query->num_rows();
                    ?>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="myCar();">รถใช้งาน (<?=$num;?> คัน)</div>
                    <div class="expandable-content" style="padding-left: 60px;">เพิ่มรถ</div>
                    <div class="right arr" id="list_car_info">
                         <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>-->

                <ons-list-item expandable>
                    <div class="left">
                        <i class="icon-new-uniF121-10 list-item__icon "></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_acc');">
                        บัญชี
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="income();">รายรับ</div>
                    <div class="expandable-content" style="padding-left: 60px;">รายจ่าย</div>
                    <div class="right arr" id="list_acc">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <ons-list-item onclick="reference();">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <span class="list-item__icon <?=$menu_ion_class;?>"> <i class="fa fa-qrcode" style="margin-top: 1px !important;"></i></span>
                    </div>
                    <div class="center">
                        แนะนำเพื่อน
                    </div>
                </ons-list-item>
                <ons-list-item onclick="fn.pushPage({'id': 'line_noti.html', 'title': 'แจ้งเตือนผ่านไลน์'}, 'lift-ios')">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <ons-icon fixed-width class="list-item__icon " icon="fa-link"></ons-icon>
                    </div>
                    <div class="center">
                        แจ้งเตือนผ่านไลน์
                    </div>
                   
                </ons-list-item>
                <ons-list-item onclick="contrac_us();">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <i class="material-icons list-item__icon <?=$menu_ion_class;?>">contact_phone</i>
                    </div>
                    <div class="center">
                        ติดต่อเรา
                    </div>
                   
                </ons-list-item>
                <ons-list-item onclick="createSignOut();">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <i class="icon-new-uniF186 icon_menu list-item__icon"></i>
                    </div>
                    <div class="center">
                        ออกจากระบบ
                    </div>
                    
                </ons-list-item>
            </ons-list>

            <script>
                $(document).ready(function(){
  $('.list-item--expandable').click(function(){
    // alert('sasasa')
    $('.list-item--expandable').removeClass("expanded",2000);
    $(this).addClass("expanded");
});
});
                ons.getScriptPage().onInit = function() {
        // Set ons-splitter-side animation
        this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
      };
    </script>

            <style>
                .profile-pic {
        width: 200px;
        background-color: #fff;
        margin: 20px auto 10px;
        border: 1px solid #999;
        border-radius: 4px;
      }

      .profile-pic > img {
        display: block;
        max-width: 100%;
        max-height: 170px;
      }

      ons-list-item {
        color: #444;
      }
    </style>
        </ons-page>
    </template>

    <template id="home.html">
        <ons-page>
            <?php 
//            include("application/views/main_body_view.php"); 
            $this->load->view('main_body_view');
            ?>
            
        </ons-page>
    </template>

    <template id="forms.html">
        <ons-page id="forms-page">
            <ons-list>
            	<header>Page 2</header>
            </ons-list>
        </ons-page>
    </template>

    <template id="animations.html">
        <ons-page>
            <ons-list>
            	<header>Page 3</header>
            </ons-list>
        </ons-page>
    </template>

    <template id="pf.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลบัญชี</div>
            </ons-toolbar>
	            <div id="body_profile_view">
	            	<?php //include("application/views/page/profile_view.php"); ?>
	            </div>
	       
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="account_bank.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลรถ</div>
            </ons-toolbar>
	            <div id="body_account_bank">
	            	
	            </div>
	       <script src="<?=base_url();?>assets/script/bank.js?v=<?=time();?>"></script>     
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="car_manage.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลรถ</div>
            </ons-toolbar>
	            <div id="body_car_manage">
	            	
	            </div>
	       <script src="<?=base_url();?>assets/script/car.js?v=<?=time();?>"></script>     
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

    <template id="shopping.html">
        <ons-page>
        
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_shop">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab page="shop_manage.html" label="จัดการ"  >
                         <span class="notification none" id="num_manage" style="    float: right;
    margin-top: 15px;
    right: 25%;"></span>

				    </ons-tab>
				    <ons-tab  page="shop_add.html" label="ส่งแขก" active>
				    </ons-tab>
				    <ons-tab page="shop_history.html" label="ประวัติ" >
                        <span class="notification none" id="num_his" style="float: right;
    margin-top: 15px;
    right: 25%;"></span>
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>
				
				<template id="shop_manage.html">
				  <ons-page id="shop_manage">
				    
				  </ons-page>
				</template>

				<template id="shop_add.html">
				  <ons-page id="shop_add">
				   <div>
				   		<!-- <?php //include("application/views/shop/shop_add.php"); ?> -->
				   </div>
				  </ons-page>
				</template>
				
				<template id="shop_history.html">
				  <ons-page id="shop_history" style="overflow-y: scroll;">
				    
				  </ons-page>
				</template>
			
            </div>
            <script>
                ons.getScriptPage().onInit = function() {
                    console.log($('#number_shop').text())
			    // $('ons-tab[page="shop_manage.html"]').attr('badge', $('#number_shop').text());
			    window.fn.showDialog = function(id) {
			        var elem = document.getElementById(id);
			        if (id === 'popover-dialog') {
			            elem.show(infoButton);
			        } else {
			            elem.show();
			            if (id === 'modal-dialog') {
			                clearTimeout(timeoutID);
			                timeoutID = setTimeout(function() {
			                    fn.hideDialog(id)
			                }, 2000);
			            }
			        }
			    };
			    window.fn.hideDialog = function(id) {
			        document.getElementById(id).hide();
			    };
			    this.querySelector('ons-toolbar div.center').textContent = this.data.title;
			}
    </script>
    	<script src="<?=base_url();?>assets/script/shop.js?v=<?=time();?>"></script>
        </ons-page>
    </template>
    
    <template id="transfer.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button onclick="$('#check_open_worktbooking').val(0);">กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab id="tab-trans_manage" page="transfer_manage.html" label="จัดการ"  >
				    </ons-tab>
				    <ons-tab id="tab-trans_job" page="transfer_job.html" label="ให้บริการรถ" active badge="0" >
				    </ons-tab>
				    <ons-tab id="tab-trans_income" page="transfer_income.html" label="ประวัติ" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>

				<template id="transfer_manage.html">
				  <ons-page id="transfer_manage">
				    
				  </ons-page>
				</template>

				<template id="transfer_job.html">
				  <ons-page id="transfer_job">
				   	
				  </ons-page>
				</template>
				
				<template id="transfer_income.html">
				  <ons-page id="transfer_income">
				    <p style="text-align: center;">
				      This is the second page 3.
				    </p>
				  </ons-page>
				</template>
			
				<script>
					document.addEventListener('prechange', function(event) {
						var page_trans = event.tabItem.getAttribute('page');
						if(page_trans=="transfer_manage.html"){
							var url = "page/transfer_manage";
				            $.post(url,function(html){
				            	$('#transfer_manage').html(html);
				            });
						}else if(page_trans=="transfer_income.html"){
							
						}else if(page_trans=="transfer_job.html"){
							/*var url = "page/transfer";
				            $.post(url,function(html){
				            	$('#transfer_job').html(html);
				            });*/
						}
						
				  document.querySelector('ons-toolbar .center')
				    .innerHTML = event.tabItem.getAttribute('label');
				});
				</script>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="book_tour.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab page="tab1.html" label="ประวัติ"  >
				    </ons-tab>
				    <ons-tab page="tab2.html" label="จองทัวร์" active>
				    </ons-tab>
				    <ons-tab page="tab3.html" label="รายจ่าย" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>

				<template id="tab1.html">
				  <ons-page id="Tab1">
				    <p style="text-align: center;">
				      This is the first page 1.
				    </p>
				  </ons-page>
				</template>

				<template id="tab2.html">
				  <ons-page id="Tab2">
				    <p style="text-align: center;">
				      This is the second page 2.
				    </p>
				  </ons-page>
				</template>
				
				<template id="tab3.html">
				  <ons-page id="Tab3">
				    <p style="text-align: center;">
				      This is the second page 3.
				    </p>
				  </ons-page>
				</template>
			
				<script>
					document.addEventListener('prechange', function(event) {
				  document.querySelector('ons-toolbar .center')
				    .innerHTML = event.tabItem.getAttribute('label');
				});
				</script>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="book_trans.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab page="tab1.html" label="ประวัติ"  >
				    </ons-tab>
				    <ons-tab page="tab2.html" label="จองรถ" active>
				    </ons-tab>
				    <ons-tab page="tab3.html" label="รายจ่าย" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>

				<template id="tab1.html">
				  <ons-page id="Tab1">
				    <p style="text-align: center;">
				      This is the first page 1.
				    </p>
				  </ons-page>
				</template>

				<template id="tab2.html">
				  <ons-page id="Tab2">
				    <div></div>
				  </ons-page>
				</template>
				
				<template id="tab3.html">
				  <ons-page id="Tab3">
				    <p style="text-align: center;">
				      This is the second page 3.
				    </p>
				  </ons-page>
				</template>
			
				<script>
					document.addEventListener('prechange', function(event) {
						console.log(event.page)
				  document.querySelector('ons-toolbar .center')
				    .innerHTML = event.tabItem.getAttribute('label');
				});
				 
				</script>
            </div>
            
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="popup1.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_popup1">
            	
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="popup2.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_popup2">
            	
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

	<template id="qrcode_ref.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_qrcode">
            	<?php 
//            	include("application/views/page/qrcode_ref.php"); 
				$this->load->view('page/qrcode_ref');
				?>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {

        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
        console.log('****')
      }
    </script>
        </ons-page>
    </template>

    <template id="line_noti.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_line">
                <?php 
//                include("application/views/page/line_noti.php"); 
				  $this->load->view('page/line_noti');
                ?>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

  	<template id="contract_us.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_contrac">
               
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

	<template id="income.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button >กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab id="tab-shop_ic" page="shop_ic.html" label="ส่งแขก" active  >
				    </ons-tab>
				    <ons-tab id="tab-trans_ic" page="trans_ic.html" label="ให้บริการรถ">
				    </ons-tab>
				    <!--<ons-tab id="tab-trans_income" page="transfer_income.html" label="ประวัติ" >
				    </ons-tab>-->
				  </ons-tabbar>
				  
				</ons-page>
				
				<template id="shop_ic.html">
				  <ons-page >
				  		<ons-card class="card" style="margin-bottom: 20px">
						  		<ons-list-item class="input-items list-item p-l-0">
						            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
						              <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
						            </div>
						            <div class="center list-item__center" style="background-image: none;">
						                 <input class="ap-date" type="month" id="date_shop_ic" name="date_shop_ic" value="<?=date('Y-m',time());?>" style="font-size: 18px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="filterDateShop($(this).val());" />
						            </div>
						            
						        </ons-list-item>
						</ons-card>	
				    	<div id="shop_ic">
				    		
				    	</div>
				  </ons-page>
				</template>

				<template id="trans_ic.html">
				  <ons-page>
				   		<ons-card class="card" style="margin-bottom: 20px">
						  		<ons-list-item class="input-items list-item p-l-0">
						            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
						              <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
						            </div>
						            <div class="center list-item__center" style="background-image: none;">
						                 <input class="ap-date" type="month" id="date_trans_ic" name="date_trans_ic" value="<?=date('Y-m',time());?>" style="font-size: 18px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="filterDateTrans($(this).val());" />
						            </div>
						            
						        </ons-list-item>
						</ons-card>	
						<div id="trans_ic">
							
						</div>
				  </ons-page>
				</template>
			
				<script>
					var frist_ic = true;
					document.addEventListener('prechange', function(event) {
						var page = event.tabItem.getAttribute('page');
						console.log(page);
						if(page == "trans_ic.html" && frist_ic == true){
							$.post("page/call_page",{ path: "statement/trans_ic" },function(ele){
						    	$('#trans_ic').html(ele);
						    	renderTransferJob();
						    });
							frist_ic = false;
						}
					  	document.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
					});
				</script>
            </div>
            <script src="<?=base_url();?>assets/script/income.js?v=<?=time();?>"></script>     
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
	
    <template id="place_company.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_place_company">
                
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    <style>
        ons-splitter-side[animation=overlay] {
    border-left: 1px solid #bbb;
  }
</style>

    <input type="hidden" id="set_lng_cookies" value="th" />
    <input type="hidden" id="check_open_worktbooking" value="0" />
    <input type="hidden" id="check_open_shop_id" value="0" />
    
    <input type="hidden" id="lat" value="0" />
    <input type="hidden" id="lng" value="0" />
    
    <template id="shop_add-dialog.html">
	  <ons-alert-dialog id="shop_add-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการบันทึกข้อมูลนี้
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="cancelShop()">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="saveShop()">บันทึก</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
	
	<template id="signout-dialog.html">
	  <ons-alert-dialog id="signout-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="signout-submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการออกจากระบบ
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="$('#signout-alert-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="logOut()">ยืนยัน</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
    
    <template id="option.html">
	  <ons-page>
	    <ons-toolbar>
	      <div class="left">
	        <ons-back-button class="option-back">กลับ</ons-back-button>
	      </div>
	      <div class="center"></div>
	    </ons-toolbar>
	    <div id="body_option">
	    	
	    </div>
	    <script>
	      ons.getScriptPage().onInit = function () {
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
	  </ons-page>
</template>
    
    <template id="popup_shop_checkin.html">
	  <ons-page>
	    <ons-toolbar>
	      <div class="left">
	        <ons-back-button class="option-back">กลับ</ons-back-button>
	      </div>
	      <div class="center"></div>
	    </ons-toolbar>
	    <input type="hidden" id="type_checkin" value="xx" />
	    <div id="body_shop_checkin">
	    	
	    </div>
	    <script>
	      ons.getScriptPage().onInit = function () {
	      	
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
	  </ons-page>
    </template>
    
    <ons-dialog id="cancel-shop-dialog" cancelable>
      <!-- Optional page. This could contain a Navigator as well. -->
      <ons-page>
        <ons-toolbar>
          <div class="center">ยกเลิกรายการ</div>
        </ons-toolbar>
        <p style="text-align: center">กรุณาเลือกเหตุผลที่จะยกเลิก</p>
        <form   enctype="multipart/form-data" style="margin-left: 25px;" id="form_type_cancel">
        <input type="hidden" value="" id="order_id_cancel" name="order_id"/>
        <!-- <input type="hiddens" value="" id="order_id_cancel" name="username"/> -->
        <input type="hidden" value="<?=$_COOKIE[detect_username];?>" id="order_id_cancel" name="username"/>

        	<div>
			  <!-- <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test1" value="1"><label for="test1">แขกลงทะเบียนไม่ได้</label></p>
			   <input type="hidden" value="แขกลงทะเบียนไม่ได้" name="typname_1">
			   <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test2" value="2"><label for="test2">แขกไม่ไป</label></p>
			   <input type="hidden" value="แขกไม่ไป" name="typname_2">
			   <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test3" value="3"><label for="test3">เลือกสถานที่ผิด</label></p>-->
			   <input type="hidden" name="typname_1" value="แขกลงทะเบียนไม่ได้" />
			   <input type="hidden" name="typname_2"  value="แขกไม่ไป" />
			   <input type="hidden" name="typname_3" value="เลือกสถานที่ผิด" />
			   <ons-list-item tappable>
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test1" value="1" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test1" class="center">แขกลงทะเบียนไม่ได้</label>
		      </ons-list-item>
		      <ons-list-item tappable>
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test2" value="2" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test2" class="center">แขกไม่ไป</label>
		      </ons-list-item>
		      <ons-list-item tappable modifier="longdivider">
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test3" value="3" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test3" class="center">เลือกสถานที่ผิด</label>
		      </ons-list-item>
			   <!--<input type="hidden" value="เลือกสถานที่ผิด" name="typname_3">-->
		    </div>
		</form>
        <p style="text-align: center">
          <ons-button modifier="light" onclick="fn.hideDialog('cancel-shop-dialog')">ปิด</ons-button>
          <ons-button class="button--outline" onclick="submitCancel();">ยืนยัน</ons-button>
        </p>
      </ons-page>
    </ons-dialog>
    
    
</body>

</html>
<script>
    if ('<?=$_GET[status];?>' != "his") { //เช็คว่าสเตตัสที่ส่งมาเป็น ประวัติ หรือ กำลังจัดการ
        $(window).load(function() {
//            $("#load_material").fadeOut(500);
			modal.hide();
            setTimeout(function() {
//            	alert(class_user);
                sendTagIOS(class_user, username);
            }, 1500);
        });
    }
</script>
<script>
    if (detect_mb == "Android") {
        sendTagOs(class_user, username);
    }

    function sendTagOs(txt, username) {
        if (typeof Android !== 'undefined') {
            Android.sendTag(txt, username);
        }
    }

    function deleteTagOs(txt) {
        if (typeof Android !== 'undefined') {
            Android.deleteTag(txt);
        }
    }
</script>
<script>
    window.fn = {};

    window.fn.toggleMenu = function() {
        document.getElementById('appSplitter').left.toggle();
    };

    window.fn.loadView = function(index) {
        document.getElementById('appTabbar').setActiveTab(index);
        document.getElementById('sidemenu').close();
    };

    window.fn.loadLink = function(url) {
        window.open(url, '_blank');
    };

    window.fn.pushPage = function(page, anim) {
        console.log(page);
        
        if(page.id=="option.html"){
			console.log("option");
			if(page.open=="car_brand"){
				
				$.ajax({
	            url: "main/data_car_brand", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {
	            	var d1 = [],d2 = [];
	            	$.each(res, function( index, value ) {
					  	if(value.popular>0){
							d1.push(value);
						}else{
							d2.push(value);
						}
					});
					var param = { data2 : d2, data1 : d1};
					console.log(param);
	                $.post("component/cpn_car_brand",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
				
			}
			else if(page.open=="car_type"){
				
				$.ajax({
	            url: "main/data_car_type", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_type",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
				
			}
			else if(page.open=="car_color"){
				$.ajax({
	            url: "main/data_car_color", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_color?plate=0",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="plate_color"){
				$.ajax({
	            url: "main/data_car_plate", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_plate",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_province"){
				$.ajax({
	            url: "main/data_car_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=car",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="user_province"){
				$.ajax({
	            url: "main/data_user_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=user",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="bank_list"){
				$.ajax({
	            url: "main/data_bank_list", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_bank_list",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
		}
        if (anim) {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                },
                animation: anim
            });
        } 
		else {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                }
            });
        }
    };

    
    var check_new_user = '<?=$_GET[check_new_user];?>';
    var regis_linenoti = '<?=$_GET[regis];?>';

    console.log(regis_linenoti)
    console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
    //                                                alert(check_new_user);
    if (check_new_user != "") {
        $("#main_load_mod_popup").toggle();
        var url_load = "load_page_mod.php?name=user&file=index&check_new_user=" + check_new_user;
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
    }
    if (regis_linenoti != "") {
        $("#main_load_mod_popup").toggle();
        var url_load = "load_page_mod.php?name=user&file=notiline&regis=linenoti&state=one";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
    }
    
    function arrowChange(id){
    	
    	var check = $('#'+id+' i').hasClass('fa-chevron-down');
    	console.log(id+' : '+check);
		if(check==true){
			$('#'+id+' i').removeClass('fa-chevron-down');
			$('#'+id+' i').addClass('fa-chevron-up');
		}else{
			$('#'+id+' i').addClass('fa-chevron-down');
			$('#'+id+' i').removeClass('fa-chevron-up');
		}
		
		
		$('.arr').each (function() {
//			console.log($(this).attr('id'));
			if($(this).attr('id')==id){
//				console.log(1);
			}else{
				$(this).find('i').removeClass('fa-chevron-up');
				$(this).find('i').addClass('fa-chevron-down');
			}
		  	
		}); 
//		$( ".arr i" ).not( document.getElementById( id ) ).removeClass('fa-chevron-up');
//		$( ".arr i" ).not( document.getElementById( id ) ).addClass('fa-chevron-down');
	}
</script>

<!-- Pricing Tables -->
<div class="hiddendiv common"></div>
<div class="drag-target" data-sidenav="slide-out" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 10px; left: 0px;"></div>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>"></script>

<script src="assets/custom.js?<?=time();?>"></script>