<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>TShare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time()?>"></script>

<ons-modal direction="up" id="modal_load">
    <div style="text-align: center;">
        <p sty>
            <ons-icon icon="md-spinner" size="25px" spin></ons-icon>
            <span size="18px">Loading...</span>
        </p>
    </div>
</ons-modal>
<style>
    .icon-menu-ios{
      margin-left: 7px;
      padding-right: 10px;
      }
      .icon-menu-android{
      margin-left: 7px;
      padding-right: 20px;
      }
      ons-splitter-side[animation=overlay] {
      border-left: 1px solid #bbb;
      }
      .dialog{
      min-height: 460px !important;
      }
      .fa-bell{
      font-size: 20px !important;
      }
   </style>
<body>
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
                    <!--                    <ons-toolbar-button onclick="profileInfo('lift-ios')" id="side_pf">
                     <img src="../data/pic/driver/small/default-avatar.jpg" class="shotcut-profile" />
                     </ons-toolbar-button>-->
                    <ons-toolbar-button onclick="showPopover(this,'popover-noti')" id="side_more" style="display: none;">
                        <ons-toolbar-button id="info-button">เพิ่มเติม</ons-toolbar-button>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <style>
                .fa-tshareiconv5 {
               display: inline-block;
               background: url('assets/images/logo2.png') no-repeat;
               overflow: hidden;
               text-indent: -9999px;
               text-align: left;
               background-repeat: no-repeat;
               background-size: 100% 100%;
               }
               .fa-tshareiconv5 {
               /*background-position: -0px -30px;
               */
               width: 35px;
               height: 35px;
               margin-top: -3px;
               }
            </style>
            <!-- <i class="fa " aria-hidden="true"></i> -->
            <ons-tabbar swipeable id="appTabbar" position="auto">
                <ons-tab label="" icon="tshareiconv5" page="home.html" active></ons-tab>
                <ons-tab id="tab_information" label="ข่าวสาร" icon="fa-inbox" page="information.html" badge=""></ons-tab>
                <ons-tab id="tab_notification" label="แจ้งเตือน" icon="fa-bell" page="notification.html" badge=""></ons-tab>
                <ons-tab id="tab_contact" label="ติดต่อเรา" icon="fa-comments-o" page="contact.html" badge=""></ons-tab>
                <ons-tab id="tab_activity" label="บันทึกิจกรรม" icon="fa-list-ul" page="activity.html" badge=""></ons-tab>
            </ons-tabbar>
            <ons-popover id="popover-noti" cancelable direction="down" cover-target animation="fade-ios" mask-color="rgba(0, 0, 0, 0.2)">
                <ons-list id="popover-list">
                    <ons-list-item class="more-options" tappable onclick="showNotiHidden();hidePopover('popover-noti');">
                        <div class="center" style="padding-left: 14px;">แสดงข้อความที่ซ่อน</div>
                    </ons-list-item>
                    <ons-list-item class="more-options" tappable onclick="hiddenNotiAll();hidePopover('popover-noti');">
                        <div class="center" style="padding-left: 14px;">ทำเครื่องหมายอ่านแล้วทั้งหมด</div>
                    </ons-list-item>
                    <ons-list-item class="more-options" tappable onclick="settingNoti();hidePopover('popover-noti');">
                        <div class="center" style="padding-left: 14px;">ตั้งค่าการแจ้งเตือน</div>
                    </ons-list-item>
                </ons-list>
            </ons-popover>
            <script>
                ons.getScriptPage().addEventListener('prechange', function(event) {
                var title = event.tabItem.getAttribute('label');
                if (event.target.matches('#appTabbar')) {
                   var page_main = event.tabItem.getAttribute('page');
                   if(page_main == "notification.html"){
                       loadNotificationPage();
                       roomOpen = false;
                       $('#side_pf').hide();
                       $('#side_more').show();
                   }
                   else if(page_main == "activity.html"){
                       loadActivityPage();
                       $('#side_pf').show();
                       $('#side_more').hide();
                       roomOpen = false;
                   }
                   else if(page_main == "contact.html"){
                       loadcontactChat();
                       $('#side_pf').hide();
                       $('#side_more').hide();
                       roomOpen = true;
                   }
                   else if(page_main == "information.html"){
               //                            welcom_modal.show({ animation: 'fade' });
               loadInformationPage();
               $('#side_pf').show();
               $('#side_more').hide();
               roomOpen = false;
               }
               else if(page_main == "home.html"){
               $('#side_pf').show();
               $('#side_more').hide();
               title = "หน้าหลัก";
               roomOpen = false;
               }
               else{
               $('#side_pf').show();
               $('#side_more').hide();
               roomOpen = false;
               }
               event.currentTarget.querySelector('ons-toolbar .center').innerHTML = title
               }
               });
               var showPopover = function(target, id) {
                 document
                 .getElementById(id)
                 .show(target);
               };
               var hidePopover = function(id) {
                 document.getElementById(id).hide();
               };
            </script>
        </ons-page>
    </template>
    <template id="sidemenu.html">
        <ons-page>
            <div class="profile-pic" align="center">
                <form id="upload_pf_home" name="upload_pf_home" enctype="multipart/form-data">
                    <input type="file" class="cropit-image-input" id="img_profile_home" accept="image/*" style="opacity: 0;position: absolute;left: 0px;width: 0px;display: none;" onchange="readURLprofileHome(this,'profile');">
                </form>
                <img src="../data/pic/driver/small/default-avatar.jpg" class="profile-pic-big" onclick="chat_gallery_items(this);">
                <span style="background-color: #f4f4f4;
                  padding: 0px 10px;
                  position: absolute;
                  margin-left: -49px;
                  margin-top: -20px;
                  border-top-left-radius: 5px;/* pointer-events: none;*/" onclick="performClick('img_profile_home');"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
            </div>
            <?php 
               if($_COOKIE[detect_userclass]=="lab"){
                   $menu_profile = "";
                   $menu_car = "display:none;";
                   $menu_income = "display:none;";
                   $menu_wallet = "display:none;";
                   $menu_ref = "";
                   $menu_noti_line = "";
                   $menu_contect = "display:none;";
                   $menu_lab = "";
                   $menu_sub_bank = "display:none;";
                   $menu_sub_affiliation = "display:none;";
               }else{
                   $menu_profile = "";
                   $menu_car = "";
                   $menu_income = "";
                   $menu_wallet = "";
                   $menu_ref = "";
                   $menu_noti_line = "";
                   $menu_contect = "";
                   $menu_lab = "display:none;";
                   $menu_sub_bank = "";
                   $menu_sub_affiliation = "";
               }
               ?>
            <ons-list>
                <ons-list-item expandable style="<?=$menu_profile;?>background-image: none;    border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left">
                        <i class="fa fa-user-circle-o list-item__icon" style="    margin-left: 4px;"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_profile');" id="head_list_pf">
                        ข้อมูลส่วนตัว
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="profileInfo('slide-ios');">ข้อมูลส่วนตัว</div>
                    <div class="expandable-content" style="padding-left: 60px;<?=$menu_sub_affiliation;?>" onclick="stationCar();">สังกัดรถ</div>
                    <?php 
                     $this->db->select('id');
                     $this->db->where('driver_id = '.$_COOKIE['detect_user']);
                     $query = $this->db->get('web_bank_driver');
                     $num_bank = $query->num_rows();
                     ?>
                    <div class="expandable-content" style="padding-left: 60px;<?=$menu_sub_bank;?>" onclick="myAccountBank();">บัญชีธนาคาร (<span id="num_bank_home">
                            <?=$num_bank;?></span> บัญชี)
                    </div>
                    <div class="right arr" id="list_profile">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <ons-list-item expandable style="<?=$menu_lab;?>background-image: none;border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left">
                        <i class="icon-new-uniF133-2 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_lab');">
                        Lab
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="taxiList();">รายชื่อสมาชิก</div>
                    <div class="right arr" id="list_lab">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <?php
               $this->db->select('t1.id,t2.topic_th as type_name');
               $this->db->from(TBL_PLACE_CAR_STATION_OTHRET." as t1");
               $this->db->join(TBL_PLACE_CAR_STATION_TYPE." as t2",'t1.type = t2.id');
               $this->db->where('t1.i_leader', $_COOKIE[detect_user]);
               $q_chk_q = $this->db->get();
//               echo "<pre>";
//               print_r($q_chk_q->result());
//               echo "</pre>";
               if ($q_chk_q->num_rows() > 0) {
                 $row = $q_chk_q->row();
                 $this->db->select('id');
                 $query = $this->db->get_where(TBL_PLACE_CAR_STATION,array('station' => $row->id,'status'=>1, 'member !='=>$_COOKIE[detect_user]));
                 $num_member = $query->num_rows();
//                 $this->db->select('id');
//                 $query = $this->db->get_where(TBL_PLACE_CAR_STATION_SERVICE,array('i_station' => $row->id,'i_status'=>1));
//                 $num_service = $query->num_rows();
               ?>
                <ons-list-item expandable style="background-image: none;border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left">
                        <i class="icon-new-uniF133-2 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_q');" id="head_list_q">
                        จัดการ
                        <?=$row->type_name;?>
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="stManagePlace('<?=$row->id;?>');">จัดการสถานที่</div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="taxiList();">สมาชิก (
                        <?=$num_member;?>)</div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="manageServiceSt('<?=$row->id;?>');">ค่าบริการ</div>
                    <div class="right arr" id="list_q">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <?php } ?>
                <ons-list-item onclick="myCar();" style="<?=$menu_car;?>border-bottom: 1px solid rgb(204, 204, 204);">
                    <?php 
                     $this->db->select('id');
                     $this->db->where('drivername = '.$_COOKIE['detect_user']);
                     $query = $this->db->get('web_carall');
                     $num = $query->num_rows();
                     ?>
                    <div class="left" style="border-bottom: 0px solid #ccc;">
                        <i class="icon-new-uniF10A-9 list-item__icon"></i>
                    </div>
                    <div class="center" style="background-image: none;">
                        ข้อมูลรถ (<span id="num_car_home">
                            <?=$num;?></span>&nbsp;คัน)
                    </div>
                </ons-list-item>
                <ons-list-item expandable style="<?=$menu_income;?>background-image: none;    border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left">
                        <i class="icon-new-uniF121-10 list-item__icon "></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_acc');" id="head_list_acc">
                        การเงิน
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="income();">รายรับ</div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="expenditure();">รายจ่าย</div>
                    <div class="right arr" id="list_acc">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <ons-list-item onclick="wallet('slide-ios');" style="<?=$menu_wallet;?>border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <span class="list-item__icon <?=$menu_ion_class;?>"> <i class="material-icons" style="    margin-left: -5px;">account_balance_wallet</i></span>
                    </div>
                    <div class="center" style="background-image: none;">
                        กระเป๋าเงิน
                    </div>
                </ons-list-item>
                <ons-list-item onclick="reference();" style="<?=$menu_ref;?>border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <span class="list-item__icon <?=$menu_ion_class;?>"> <i class="fa fa-qrcode" style="margin-top: 1px !important;margin-left: 2px;"></i></span>
                    </div>
                    <div class="center" style="background-image: none;">
                        แนะนำเพื่อน
                    </div>
                </ons-list-item>
                <ons-list-item onclick="
                 fn.pushPage({'id': 'line_noti.html', 'title': 'แจ้งเตือนผ่านไลน์'}, 'lift-ios')" style="<?=$menu_noti_line;?>border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <ons-icon fixed-width class="list-item__icon " icon="fa-link" style="margin-left: 2px;"></ons-icon>
                    </div>
                    <div class="center" style="background-image: none;">
                        แจ้งเตือนผ่านไลน์
                    </div>
                </ons-list-item>
                <ons-list-item onclick="$('#tab_contact').click();$('ons-splitter-mask').click();//contrac_us();" style="<?=$menu_contect;?>border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <ons-icon fixed-width class="list-item__icon " icon="fa-comments-o" style="margin-left: 2px"></ons-icon>
                        <!-- <i class="material-icons list-item__icon ">contact_phone</i> -->
                    </div>
                    <div class="center" style="background-image: none;">
                        ติดต่อเรา
                    </div>
                </ons-list-item>
                <ons-list-item onclick="createSignOut();" style="border-bottom: 1px solid rgb(204, 204, 204);">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <i class="icon-new-uniF186 icon_menu list-item__icon"></i>
                    </div>
                    <div class="center" style="background-image: none;">
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
               /*        border: 1px solid #999;*/
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
    <template id="st_manage_service.html">
        <ons-page>
            <ons-toolbar>
                <div class="left" onclick="$('#check_open_shop_id').val(0);">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_st_manage_service">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
                   this.querySelector('ons-toolbar div.center').textContent = this.data.title;
               }
            </script>
        </ons-page>
    </template>
    <template id="st_manage_place.html">
        <ons-page>
            <ons-toolbar>
                <div class="left" onclick="$('#check_open_shop_id').val(0);">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_st_manage_place">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
                   this.querySelector('ons-toolbar div.center').textContent = this.data.title;
               }
            </script>
        </ons-page>
    </template>
    <template id="add_place_owner.html">
        <ons-page>
            <ons-toolbar>
                <div class="left" onclick="checkBeforeHideToast_selectPlace();">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_add_place_owner">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
                   this.querySelector('ons-toolbar div.center').textContent = this.data.title;
               }
            </script>
        </ons-page>
    </template>
    <template id="information.html">
        <ons-page>
            <div id="body_load_information"></div>
            <?php //$this->load->view('information_view'); ?>
        </ons-page>
    </template>
    <template id="notification.html">
        <ons-page>
            <div id="body_load_notification">
            </div>
        </ons-page>
    </template>
    <template id="contact.html">
        <ons-page>
            <div id="body_contact">
            </div>
        </ons-page>
    </template>
  
    <template id="imageslider.html">
        <ons-page id="imageslider">
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">โบรชัวร์ / รูป</div>
            </ons-toolbar>
            <div id="boby_imageslider">
            </div>
        </ons-page>
    </template>
    <template id="chatroom.html">
        <ons-page id="pagechatroom">
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="" id="user_tochat" style="    position: absolute;
                  margin-left: 75px;width:100%;
                  "></div>
            </ons-toolbar>
            <div id="boby_chatroom">
            </div>
        </ons-page>
    </template>
    <template id="activity.html">
        <ons-page>
            <div id="body_load_activity">
            </div>
        </ons-page>
    </template>
    <template id="change-time.html">
        <ons-alert-dialog id="change-time-dialog" modifier="rowfooter">
            <div class="alert-dialog-title">แก้ไขเวลา</div>
            <div class="alert-dialog-content">
                <input type="hidden" value="0" id="order_id_change_time" />
                <div style="margin: 0px 5px;margin-bottom: 10px;">
                    <select class="select-input font-17" name="time_num_change_time" id="time_num_change_time" value="" onchange="calTime(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
                        <option value="0">-- เลือกเวลา --</option>
                        <?php
                        $time = array("5" => "5 นาที",
                           "10" => "10 นาที",
                           "15" => "15 นาที",
                           "20" => "20 นาที",
                           "25" => "25 นาที",
                           "30" => "30 นาที",
                           "35" => "35 นาที",
                           "40" => "40 นาที",
                           "45" => "45 นาที",
                           "50" => "50 นาที",
                           "55" => "55 นาที",
                           "60" => "1 ชัวโมง.",
                           "90" => "1 ชัวโมง 30 นาที",
                           "120" => "2 ชัวโมง",
                           "150" => "2 ชัวโมง 30 นาที",
                           "180" => "3 ชัวโมง",
                           "210" => "3 ชัวโมง 30 นาที",
                           "240" => "4 ชัวโมง",
                           "270" => "4 ชัวโมง 30 นาที",
                           "300" => "5 ชัวโมง",
                           "330" => "5 ชัวโมง 30 นาที",
                           "360" => "6 ชัวโมง",
                           "390" => "6 ชัวโมง 30 นาที",
                           "420" => "7 ชัวโมง",
                           "450" => "7 ชัวโมง 30 นาที",
                           "490" => "8 ชัวโมง");
                        $mm = 5;
                        ?>
                        <?php foreach ($time as $key => $at) { ?>
                        <option value="<?=$key; ?>">
                            <?=$at; ?>
                        </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <span id="txt_show_to_time" class="font-17" style="display: none;">จะถึงใน <span id="show_to_time" style="color: #ff0000;">17:37</span> น.</span>
            </div>
            <div class="alert-dialog-footer">
                <ons-alert-dialog-button onclick="document.getElementById('change-time-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
                <ons-alert-dialog-button onclick="submitChangeTimeToPlace();">ตกลง</ons-alert-dialog-button>
            </div>
        </ons-alert-dialog>
    </template>
    <template id="pf.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลบัญชี</div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_account_bank">
            </div>
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_car_manage">
            </div>
            
            <script>
                ons.getScriptPage().onInit = function () {
                   this.querySelector('ons-toolbar div.center').textContent = this.data.title;
               }
            </script>
        </ons-page>
    </template>
  <template id="action-sheet-car.html">
                <ons-action-sheet id="sheet" cancelable title="เลือกรถที่จะใช้ประจำแทนคันนี้">
                    <!--<ons-action-sheet-button icon="md-square-o" onclick="app.hideFromTemplate()">Label</ons-action-sheet-button>
                     <ons-action-sheet-button icon="md-square-o" onclick="app.hideFromTemplate()" modifier="destructive">Label</ons-action-sheet-button>-->
                    <!--<ons-action-sheet-button icon="md-close" onclick="app.hideFromTemplate()">Cancel</ons-action-sheet-button>-->
                </ons-action-sheet>
            </template>
    <template id="shopping.html">
        <ons-page>
            <ons-toolbar id="default_toolbar">
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                        <!--<i class="fa fa-home" style="font-size:26px;" aria-hidden="true"></i>-->
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <ons-toolbar id="default_toolbar2" style="display: none">
                <div class="left" onclick="selesecompany()">
                    <div><span class="back-button__icon pull-left" style="    margin-left: 6px;">
                            <!--?xml version="1.0" encoding="UTF-8"?-->
                            <svg width="13px" height="21px" viewBox="0 0 13 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>ios-back-button-icon</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="toolbar-back-button" stroke="none" stroke-width="1" fill-rule="evenodd">
                                    <g id="ios" transform="translate(-34.000000, -30.000000)">
                                        <polygon id="ios-back-button-icon" points="34 40.5 44.5 30 46.5 32 38 40.5 46.5 49 44.5 51"></polygon>
                                    </g>
                                </g>
                            </svg>
                        </span><span style="color: #0076ff;">กลับ</span></div>
                </div>
                <div class="center">
                    <div class="center toolbar__center toolbar__title" style="">ส่งแขก</div>
                </div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                        <!--<i class="fa fa-home" style="font-size:26px;" aria-hidden="true"></i>-->
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <ons-card id="box-shop_filter" class="card" style="display:none;padding: 0px 8px;position: absolute;width: 100%;z-index: 9;margin-top: 48px;margin-left: 0px;border-radius: 0px;display: none;    padding-left: 0; padding-right: 0px;">
                <ons-row style="width: 100%;/*margin-top: 48px; margin-bottom: 20px;*/">
                    <ons-col>
                        <ons-button class="shop-his-btn font-16 his-shop-active " id="btn_shop_his_com" onclick="filterHistoryStatus('COMPLETED','btn_shop_his_com');" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color: #000;">สำเร็จ <span id="num_his_com"></span></ons-button>
                    </ons-col>
                    <ons-col>
                        <ons-button class="shop-his-btn font-16" id="btn_shop_his_cancel" onclick="filterHistoryStatus('CANCEL','btn_shop_his_cancel');" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color:#000;">ยกเลิก <span id="num_his_cancel"></span></ons-button>
                    </ons-col>
                    <ons-col>
                        <ons-button onclick="filterHistoryStatus('','btn_shop_his_all');" id="btn_shop_his_all" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color:#000;" class="shop-his-btn font-16">ทั้งหมด <span id="num_his_all"></span>
                        </ons-button>
                    </ons-col>
                </ons-row>
                <ons-row>
                    <ons-col>
                        <ons-button id="btn_toshow_date" onclick="showFilterdate();" class="button button--outline" style="width:100%;text-align: center;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> ดูตามวันที่</ons-button>
                    </ons-col>
                </ons-row>
                <ons-list-item class="input-items list-item p-l-0" id="box-shop_date" style="display:none;">
                    <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
                        <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                    </div>
                    <div class="center list-item__center" style="background-image: none;padding: 0px 6px 0px 0;">
                        <input class="ap-date" type="date" id="date_shop_his" name="date_shop_his" value="<?=date('Y-m-d',time());?>" style="font-size: 17px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="historyShop();$('#first_run_his').val(0);" max="<?=date('Y-m-d',time());?>" />
                        <input class="ap-date" type="date" id="date_shop_wait" name="date_shop_his" value="<?=date('Y-m-d',time());?>" style="font-size: 17px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;display: none;" onchange="waitTransShop();" max="<?=date('Y-m-d',time());?>" />
                    </div>
                    <div class="right list-item__right" style="padding: 5px;">
                        <ons-button onclick="hideFilterdate();" style="padding: 0px 5px;">ทั้งหมด</ons-button>
                    </div>
                </ons-list-item>
                <input type="hidden" value="0" id="cehck_filter_date" />
            </ons-card>
            <div id="body_shop">
                <ons-page>
                    <ons-tabbar swipeable position="top">
                        <?php 
                        if($_COOKIE[detect_userclass]=="lab"){ 
                            $active_add = "";
                            $active_mn = "active";
                            $display_none_num_shop = "";
                        }else{ 
                            $active_add = "active";
                            $active_mn = "";
                            $display_none_num_shop = "display:none;";
                        }
                        ?>
                        <ons-tab page="shop_add.html" label="ส่งแขก" <?=$active_add;?>></ons-tab>
                        <ons-tab page="shop_manage.html" label="จัดการ" id="tab_shop_mn" <?=$active_mn;?> badge="" >
                            <span class="notification none" id="num_manage" style="    float: right; margin-top: 15px; right: 15px;" <?=$display_none_num_shop;?>></span>
                        </ons-tab>
                        <ons-tab page="shop_wait.html" label="รอโอน" badge="" id="tab_shop_wait"></ons-tab>
                        <ons-tab page="shop_history.html" label="ประวัติ"></ons-tab>
                    </ons-tabbar>
                </ons-page>
                <template id="shop_add.html">
                    <ons-page>
                        <div id="shop_add">
                            <!-- <?php //include("application/views/shop/shop_add.php"); ?> -->
                        </div>
                        <div id="shop_filter" style="display:none;"> </div>
                    </ons-page>
                </template>
                <template id="shop_manage.html">
                    <ons-page id="shop_manage">
                    </ons-page>
                </template>
                <template id="shop_wait.html">
                    <ons-page style="overflow-y: scroll;">
                        <div id="shop_wait" style="margin-top: 0px;">
                        </div>
                    </ons-page>
                </template>
                <template id="shop_history.html">
                    <ons-page style="overflow-y: scroll;">
                        <?php 
                        $margin_his = "margin-top: 100px;";
                        ?>
                        <input type="hidden" id="check_filter_his" value="COMPLETED" />
                        <input type="hidden" id="first_run_his" value="0" />
                        <div id="shop_history" style="<?=$margin_his;?>">
                        </div>
                    </ons-page>
                </template>
            </div>
            <style>
                .img-type-map{
               position: absolute;
               left: 20px;
               margin-top: 10px;
               }
            </style>
            <template id="select_type_map-action-sheet.html">
                <ons-action-sheet id="sheet" cancelable>
                    <ons-action-sheet-button icon="md-square-o" onclick="openMapPlace();app_shop.hideSelectTypeMapShop();"><img src="assets/images/map/map.png" style=" width: 30px;" class="img-type-map">ดูตำแหน่งถึงสถานที่ส่ง</ons-action-sheet-button>
                    <ons-action-sheet-button icon="md-square-o" onclick="openMapNav();app_shop.hideSelectTypeMapShop();"><img src="assets/images/map/navigator.png" style=" width: 25px;" class="img-type-map">นำทางไปสถานที่ส่ง</ons-action-sheet-button>
                    <!--<ons-action-sheet-button icon="md-square-o" onclick="" modifier="destructive"><img src="assets/images/map/car.png" class="img-type-map">แจ้งแก้ไขตำแหน่ง</ons-action-sheet-button>-->
                    <ons-action-sheet-button icon="md-close" onclick="app_shop.hideSelectTypeMapShop();">ยกเลิก</ons-action-sheet-button>
                </ons-action-sheet>
            </template>
            <script>
                var app_shop = {};
               ons.ready(function () {
                 ons.createElement('select_type_map-action-sheet.html', { append: true })
                 .then(function (sheet) {
                     app_shop.showSelectTypeMapShop = sheet.show.bind(sheet);
                     app_shop.hideSelectTypeMapShop = sheet.hide.bind(sheet);
                 });
               });
               ons.getScriptPage().onInit = function() {
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
               document.addEventListener('prechange', function (event) {
               console.log(event);
               var page = event.tabItem.getAttribute('page');
               console.log(page)
               if (page == "shop_manage.html") {
               shopManage();
               $('#open_shop_manage').val(1);
               $('#open_shop_wait_trans').val(0);
               $('#box-shop_filter').fadeOut(300);
               } 
               else if (page == "shop_history.html") {
               $('#open_shop_manage').val(0);
               $('#open_shop_wait_trans').val(0);
               $('#box-shop_filter').fadeIn(300);
               $('#date_shop_his').show();
               $('#date_shop_wait').hide();
               $('#date_shop_his').val(today);
               historyShop();
               } 
               else if (page == "shop_wait.html") {
               $('#open_shop_manage').val(0);
               $('#open_shop_wait_trans').val(1);
               $('#date_shop_wait').val(today);
               $('#date_shop_wait').show();
               $('#date_shop_his').hide();
               $('#box-shop_filter').fadeOut(300);
               waitTransShop();
               } 
               else {
               $('#open_shop_manage').val(0);
               $('#open_shop_wait_trans').val(0);
               $('#box-shop_filter').fadeOut(300);
               }
               /*document.querySelector('ons-toolbar .center')
               .innerHTML = event.tabItem.getAttribute('label');*/
               });
            </script>
        </ons-page>
    </template>
    <template id="transfer.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button onclick="$('#check_open_worktbooking').val(0);">กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="show_balance_trans" style="z-index: 1;
               background-color: #ececec;
               position: fixed;
               padding: 5px;
               width: 100%;
               font-size: 18px;
               text-align: center;">
                <i class="icon-new-uniF121-10" style="color: #009688;"></i> <span id="balance_txt_trans"></span>
                <input type="hidden" value="" id="balance_val_trans" name="balance_val" />
                <ons-button onclick="wallet('lift-ios');" class="font-16" style=" padding: 0px 15px; position: absolute;  left: 0px;  top: 0px; border-radius: 0;">เติมเงิน</ons-button>
            </div>
            <ons-card id="box-trans_filter" class="card" style="display:none;padding: 0px 8px;position: absolute;width: 100%;z-index: 9;margin-top: 48px;margin-left: 0px;border-radius: 0px;display: none;    padding-left: 0; padding-right: 0px;">
                <ons-row style="width: 100%;">
                    <!--                  <ons-col>
                     <ons-button class="trans-his-btn font-16 his-trans-active " id="btn_trans_his_com" onclick="filterHistoryStatusTrans('COMPLETED','btn_trans_his_com');" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color: #000;">สำเร็จ <span id="num_his_com"></span></ons-button>
                  </ons-col>
                  <ons-col>
                     <ons-button class="trans-his-btn font-16" id="btn_trans_his_cancel" onclick="filterHistoryStatusTrans('CANCEL','btn_trans_his_cancel');" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color:#000;">ยกเลิก <span id="num_his_cancel"></span></ons-button>
                  </ons-col>-->
                    <!--                  <ons-col>
                     <ons-button  class="trans-his-btn font-16 his-trans-active" onclick="filterHistoryStatusTrans('ALL','btn_trans_his_all');" id="btn_trans_his_all" style="border-radius: 0; width: 100%;text-align: center; background-color: #e6e6e6;padding: 2px 10px;color:#000;" >ทั้งหมด <span id="num_his_all"></span>
                     </ons-button>
                  </ons-col>-->
                </ons-row>
                <ons-row>
                    <ons-col>
                        <ons-button id="btn_toshow_date_trans" onclick="showFilterdateTrans();" class="button button--outline" style="width:100%;text-align: center;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> ดูตามวันที่</ons-button>
                    </ons-col>
                </ons-row>
                <ons-list-item class="input-items list-item p-l-0" id="box-trans_date" style="display:none;">
                    <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
                        <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                    </div>
                    <div class="center list-item__center" style="background-image: none;padding: 0px 6px 0px 0;">
                        <input class="ap-date" type="date" id="date_trans_his" name="date_trans_his" value="<?=date('Y-m-d',time());?>" style="font-size: 17px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="callApiHistory();$('#first_run_his').val(0);" max="<?=date('Y-m-d',time());?>" />
                    </div>
                    <div class="right list-item__right" style="padding: 5px;">
                        <ons-button onclick="hideFilterdateTrans();" style="padding: 0px 5px;">ทั้งหมด</ons-button>
                    </div>
                </ons-list-item>
                <input type="hidden" value="0" id="cehck_filter_date_trans" />
                <input type="hidden" id="check_filter_his_trans" value="COMPLETED" />
                <input type="hidden" id="date_report" value="<?=date('Y-m-d');?>" />
            </ons-card>
            <div id="body_transfer">
                <ons-page style="margin-top: 30px;" id="ons-page_body_trans">
                    <ons-tabbar swipeable position="top">
                        <ons-tab id="tab-trans_manage" page="transfer_manage.html" label="จัดการ">
                        </ons-tab>
                        <ons-tab id="tab-trans_job" page="transfer_job.html" label="ให้บริการรถ" active badge="0">
                        </ons-tab>
                        <ons-tab id="tab-trans_his" page="transfer_his.html" label="ประวัติ">
                        </ons-tab>
                    </ons-tabbar>
                </ons-page>
                <template id="transfer_manage.html">
                    <ons-page id="transfer_manage">
                        <div id="load_manage_data" style="margin-top: 25px;" align="center">
                        </div>
                    </ons-page>
                </template>
                <template id="transfer_job.html">
                    <ons-page>
                        <div style="margin-top: 35px;" id="transfer_job">
                            <?php $this->load->view('transfer/transfer_view'); ?>
                        </div>
                    </ons-page>
                </template>
                <template id="transfer_his.html">
                    <ons-page>
                        <div id="load_his_data" style="margin-top:70px;"></div>
                    </ons-page>
                </template>
                <script>
                    document.addEventListener('prechange', function(event) {
                      var page_trans = event.tabItem.getAttribute('page');
                      console.log(page_trans);
                      if(page_trans=="transfer_manage.html"){
                          callApiManage();
                          $('#box-trans_filter').hide();
                      }else if(page_trans=="transfer_his.html"){
                          $('#box-trans_filter').fadeIn(500);
                          $('#show_balance_trans').hide();
                          $('#ons-page_body_trans').css('margin-top',0);
                           callApiHistory();
                      }else if(page_trans=="transfer_job.html"){
                          $('#box-trans_filter').hide();
                          $('#show_balance_trans').show();
                          $('#ons-page_body_trans').css('margin-top','30px');
                      }
                       /* document.querySelector('ons-toolbar .center')
                       .innerHTML = event.tabItem.getAttribute('label');*/
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
    <template id="transfer_detail.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_transfer_detail">
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_transfer">
                <ons-page>
                    <ons-tabbar swipeable position="top">
                        <ons-tab page="tab1.html" label="ประวัติ">
                        </ons-tab>
                        <ons-tab page="tab2.html" label="จองทัวร์" active>
                        </ons-tab>
                        <ons-tab page="tab3.html" label="รายจ่าย">
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
                <template id="bookingss.html">
                    <ons-page id="body_bookingss">
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
                        /*document.querySelector('ons-toolbar .center')
                        .innerHTML = event.tabItem.getAttribute('label');*/
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_transfer">
                <ons-page>
                    <ons-tabbar swipeable position="top">
                        <ons-tab page="booking.html" label="จองรถ" active>
                        </ons-tab>
                        <ons-tab page="tab1.html" label="ประวัติ">
                        </ons-tab>
                        <ons-tab page="tab3.html" label="รายจ่าย">
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
                <template id="booking.html">
                    <ons-page id="body_booking">
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
                        /*document.querySelector('ons-toolbar .center')
                        .innerHTML = event.tabItem.getAttribute('label');*/
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
                <div class="left" onclick="$('#check_open_shop_id').val(0);">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
    <template id="popup3.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_popup3">
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_qrcode">
                <?php 
                  //              include("application/views/page/qrcode_ref.php"); 
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_contract">
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
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_transfer">
                <ons-page>
                    <ons-tabbar swipeable position="top">
                        <ons-tab id="tab-shop_ic" page="shop_ic.html" label="ส่งแขก" active>
                        </ons-tab>
                        <ons-tab id="tab-trans_ic" page="trans_ic.html" label="ให้บริการรถ">
                        </ons-tab>
                        <!--<ons-tab id="tab-trans_income" page="transfer_income.html" label="ประวัติ" >
                        </ons-tab>-->
                    </ons-tabbar>
                </ons-page>
                <template id="shop_ic.html">
                    <ons-page>
                        <ons-card class="card" style="margin-bottom: 20px">
                            <ons-list-header>รายรับส่งแขก</ons-list-header>
                            <ons-list-item class="input-items list-item p-l-0">
                                <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
                                    <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                                </div>
                                <div class="center list-item__center" style="background-image: none;">
                                    <input class="ap-date" type="month" id="date_shop_ic" name="date_shop_ic" value="<?=date('Y-m',time());?>" style="font-size: 18px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="filterDateShop($(this).val());" max="<?=date('Y-m',time());?>" />
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
                            <ons-list-header>รายรับบริการรถ</ons-list-header>
                            <ons-list-item class="input-items list-item p-l-0">
                                <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
                                    <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                                </div>
                                <div class="center list-item__center" style="background-image: none;">
                                    <input class="ap-date" type="month" id="date_trans_ic" name="date_trans_ic" value="<?=date('Y-m',time());?>" style="font-size: 18px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="filterDateTrans($(this).val());" max="<?=date('Y-m',time());?>" />
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
                      /*document.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');*/
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
    <template id="expenditure.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_transfer">
                <ons-page>
                    <ons-tabbar swipeable position="top">
                        <ons-tab id="tab-booktran" page="booktran.html" label="จองรถ" active>
                        </ons-tab>
                        <ons-tab id="tab-booktour" page="booktour.html" label="จองทัวร์">
                        </ons-tab>
                    </ons-tabbar>
                </ons-page>
                <template id="booktran.html">
                    <ons-page>
                        <ons-card class="card" style="margin-bottom: 20px">
                            <ons-list-header>รายการจองรถของคุณ</ons-list-header>
                        </ons-card>
                        <div id="booktran_body">
                        </div>
                    </ons-page>
                </template>
                <template id="booktour.html">
                    <ons-page>
                        <ons-card class="card" style="margin-bottom: 20px">
                            <ons-list-header>รายการจองทัวร์ของคุณ</ons-list-header>
                        </ons-card>
                        <div id="booktran_body">
                        </div>
                    </ons-page>
                </template>
                <script>
                    document.addEventListener('prechange', function(event) {
                      var page = event.tabItem.getAttribute('page');
                      console.log(page);
                          /*if(page == "trans_ic.html" && frist_ic == true){
                              $.post("page/call_page",{ path: "statement/trans_ic" },function(ele){
                                  $('#trans_ic').html(ele);
                                  renderTransferJob();
                              });
                              frist_ic = false;
                          }*/
                          /*document.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');*/
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
    <template id="wallet.html">
        <ons-page>
            <ons-toolbar>
                <div class="left" onclick="$('#check_open_wallet').val(0);">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <div id="body_transfer">
                <?php 
//                  $select = "SELECT * FROM deposit where driver = ".$_COOKIE['detect_user'];
//                  $query = $this->db->query($select);
//                  $data_deposit = $query->row();
                  ?>
                <div id="show_balance" style="z-index: 1;
                  background-color: #ececec;
                  position: fixed;
                  padding: 5px;
                  width: 100%;
                  font-size: 18px;
                  text-align: center;">
                    <i class="icon-new-uniF121-10" style="color: #009688;"></i> <span id="balance_txt"></span>
                    <input type="hidden" value="" id="balance_val" name="balance_val" />
                </div>
                <ons-page style="margin-top: 30px;">
                    <ons-tabbar swipeable position="top">
                        <ons-tab id="tab-add-wallet" page="add.html" label="เติมเงิน" active>
                        </ons-tab>
                        <ons-tab id="tab-withdraw-wallet" page="withdraw.html" label="ถอนเงิน">
                        </ons-tab>
                        <ons-tab id="tab-history-wallet" page="history.html" label="ประวัติ">
                        </ons-tab>
                    </ons-tabbar>
                </ons-page>
                <template id="add.html">
                    <ons-page>
                        <div id="add">
                            <div align="center" style="padding: 15px;">
                                <div class="segment" style="width: 280px; margin: 0 auto;">
                                    <div class="segment__item">
                                        <input type="radio" class="segment__input" id="auto_trans" name="segment-a" checked onclick="auto_money();">
                                        <div class="segment__button">ผ่านบัญชีธนาคาร</div>
                                    </div>
                                    <div class="segment__item">
                                        <input type="radio" class="segment__input" id="auto_manual" name="segment-a" onclick="inform_money();">
                                        <div class="segment__button">แจ้งโอน</div>
                                    </div>
                                </div>
                            </div>
                            <div id="body_add_content">
                            </div>
                        </div>
                    </ons-page>
                </template>
                <template id="withdraw.html">
                    <ons-page>
                        <div id="withdraw">
                        </div>
                    </ons-page>
                </template>
                <template id="history.html">
                    <ons-page>
                        <ons-card class="card" style="margin-bottom: 20px">
                            <ons-list-header>ประวัติการเติมเงิน/ถอนเงิน</ons-list-header>
                            <ons-list-item class="input-items list-item p-l-0">
                                <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
                                    <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
                                </div>
                                <div class="center list-item__center" style="background-image: none;">
                                    <input class="ap-date" type="month" id="date_his_wallet" name="date_his_wallet" value="<?=date('Y-m',time());?>" style="font-size: 18px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="history_wallet();" max="<?=date('Y-m',time());?>" />
                                </div>
                            </ons-list-item>
                        </ons-card>
                        <div id="history">
                        </div>
                    </ons-page>
                </template>
                <template id="inform-confirm.html">
                    <ons-alert-dialog id="inform-confirm-dialog" modifier="rowfooter">
                        <div class="alert-dialog-title">ยืนยัน</div>
                        <div class="alert-dialog-content" id="txt_content-wallet">
                            <!-- -->
                        </div>
                        <div class="alert-dialog-footer">
                            <ons-alert-dialog-button onclick="document.getElementById('inform-confirm-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
                            <ons-alert-dialog-button id="btn_wallet_ok" onclick="">ยืนยัน</ons-alert-dialog-button>
                        </div>
                    </ons-alert-dialog>
                </template>
                <script>
                    var frist_ic = true;
                  document.addEventListener('prechange', function(event) {
                      var page = event.tabItem.getAttribute('page');
                      console.log(page);
                      if(page=='add.html'){
                          console.log('add');
                          performClick('auto_trans')
                      }else if(page=='history.html'){
                          history_wallet();
                      }else if(page=='withdraw.html'){
                          withdraw();
                      }
                  //                      document.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
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
    <template id="place_company.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
    <template id="shop_add_action_pay.html">
        <ons-alert-dialog id="shop_add_action_pay" modifier="rowfooter">
            <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
            <div class="alert-dialog-content">
                ว่าต้องการบันทึกข้อมูลนี้
            </div>
            <div class="alert-dialog-footer">
                <ons-alert-dialog-button onclick="cancelShop_action_pay();">ยกเลิก</ons-alert-dialog-button>
                <ons-alert-dialog-button onclick="saveShop_action_pay();cancelShop_action_pay();">บันทึก</ons-alert-dialog-button>
            </div>
        </ons-alert-dialog>
    </template>
    <template id="confirm_checkin-dialog.html">
        <ons-alert-dialog id="confirm_checkin-alert-dialog" modifier="rowfooter">
            <div class="alert-dialog-title" id="checkin_txt_title">ยืนยันถึงสถานที่</div>
            <div class="alert-dialog-content" id="checkin_txt_content">
                แน่ใจหรือไม่ ว่าต้องการยืนยันถึงสถานที่ส่งแขก
            </div>
            <div class="alert-dialog-footer">
                <ons-alert-dialog-button onclick="document.getElementById('confirm_checkin-alert-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
                <ons-alert-dialog-button id="btn_ok_topoint" onclick="saveShop_action_pay();document.getElementById('confirm_checkin-alert-dialog').hide();">ยืนยัน</ons-alert-dialog-button>
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
                <div class="right">
                    <ons-toolbar-button onclick="reloadApp();">
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
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
    <template id="shopcategory.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button class="option-back">กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <!--  <div class="right">
                  <ons-toolbar-button onclick="reloadApp();">
                    <ons-icon icon="ion-home, material:md-home"></ons-icon>
                  </ons-toolbar-button>
                  </div> -->
            </ons-toolbar>
            <div id="body_category">
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
                   this.querySelector('ons-toolbar div.center').textContent = this.data.title;
               }
            </script>
        </ons-page>
    </template>
    <ons-dialog id="cancel-shop-dialog" cancelable style="min-height: 430px;">
        <!-- Optional page. This could contain a Navigator as well. -->
        <ons-page>
            <ons-toolbar>
                <div class="center">ยกเลิกส่งแขก</div>
            </ons-toolbar>
            <p style="text-align: center">เลือกสาเหตุยกเลิก</p>
            <input type="hidden" value="" id="invoice_cancel_select" />
            <input type="hidden" value="" id="driver_id_cancel" />
            <input type="hidden" value="" id="product_id" />
            <form enctype="multipart/form-data" style="margin-left: 25px;" id="form_type_cancel">
                <input type="hidden" value="" id="order_id_cancel" name="order_id" />
                <!--<input type="hidden" value="<?=$_COOKIE[detect_username];?>" id="username_order_cancel" name="username" />-->
                <div>
                    <input type="hidden" name="typname_1" value="แขกลงทะเบียนไม่ได้" />
                    <input type="hidden" name="typname_2" value="แขกไม่ไป" />
                    <input type="hidden" name="typname_3" value="เลือกสถานที่ผิด" />
                    <?php 
                     $query = $this->db->query("select * from shop_type_cancel where i_status = 1 and class = '".$_COOKIE[detect_userclass]."' ");
                     foreach ($query->result() as $row){ ?>
                    <ons-list-item tappable>
                        <label class="left">
                            <ons-radio class="radio-fruit" input-id="cancel_<?=$row->id;?>" value="<?=$row->id;?>" name="type_cancel"></ons-radio>
                        </label>
                        <label for="cancel_<?=$row->id;?>" class="center">
                            <?=$row->s_topic;?></label>
                    </ons-list-item>
                    <input type="hidden" name="typname_<?=$row->id;?>" value="<?=$row->s_topic;?>" />
                    <?php  }
                     ?>
                </div>
            </form>
            <p style="text-align: center">
                <ons-button modifier="light" onclick="fn.hideDialog('cancel-shop-dialog');resetFormCancel();">ปิด</ons-button>
                <ons-button class="button--outline" onclick="submitCancel();">ยืนยัน</ons-button>
            </p>
        </ons-page>
    </ons-dialog>
    <template id="custom-dialog.html">
        <ons-dialog id="custom-my-dialog">
            <div class="dialog-mask" style="background-color: rgba(0, 0, 0, 0.70);"></div>
            <div class="dialog" style="top: 35%; min-height: auto;width: 95%;">
                <div class="dialog-container" id="body_custom_dialog_content">
                    <p style="text-align:center;margin-top:40px;opacity:0.4;">Content</p>
                </div>
            </div>
            <ons-button class="fab" onclick="hideCustomDialog('custom-my-dialog');" style="z-index: 99990;left: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); margin: auto auto;  bottom: 0px;  position: fixed;width: 66px;height: 66px;">
                <i class="material-icons" style="margin: 14px;    margin-left: 15px; font-size: 36px;">close</i>
            </ons-button>
        </ons-dialog>
    </template>
    <template id="test_swp.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
                <div class="right">
                    <ons-toolbar-button>
                        <ons-icon icon="ion-home, material:md-home"></ons-icon>
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <script>
                ons.getScriptPage().onInit = function () {
                   this.querySelector('ons-toolbar div.center').textContent = this.data.title;
               }
            </script>
        </ons-page>
    </template>
    <input type="hidden" id="set_lng_cookies" value="th" />
    <input type="hidden" id="check_open_worktbooking" value="0" />
    <input type="hidden" id="check_open_shop_id" value="0" />
    <input type="hidden" id="check_open_wallet" value="0" />
    <input type="hidden" id="lat" value="0" />
    <input type="hidden" id="lng" value="0" />
    <input type="hidden" id="place_lat" value="" />
    <input type="hidden" id="place_lng" value="" />
    <input type="hidden" id="place_area" value="" />
    <input type="hidden" id="place_province" value="" />
    <input type="hidden" id="place_name" value="" />
    <input type="hidden" name="" id="province_text_input">
    <ons-modal direction="up" id="modal_photo">
        <div style="text-align: center">
            <a style=" position: absolute;top: 5px; right: 5px;" onclick="modal_photo.hide({ animation: 'fade' });"><i class="material-icons" style="font-size: 50px;">close</i></a>
            <div id="body_load_photo">
                <div>
                    <img src="../data/pic/driver/small/default-avatar.jpg" style="width: 65%;" id="photo_to_show_inmodal" />
                    <div style="color: #fff;">
                        <b style="font-size: 34px;" id="text_name_approved"></b>
                    </div>
                </div>
            </div>
        </div>
    </ons-modal>
    <audio controls="" id="alert_sd" style="display:none;">
        <source src="<?=base_url();?>assets/media/sound/zapsplat.mp3?v=<?=time();?>" type="audio/mpeg">
    </audio>
    <ons-modal direction="up" id="welcome_modal">
        <div style="text-align: center">
            <ons-card style="padding: 5px;color: #000; position: relative;box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);">
                <a style="position: absolute; margin-top: -20px;
                  padding: 2px; right: -5px; background-color: #0076ff;  border-radius: 50%; color: #fff;
                  z-index: 1;" onclick="welcom_modal.hide({ animation: 'fade' });"><i class="material-icons" style="font-size: 35px;">close</i></a>
                <div id="body_modal_info">
                    <p class="intro font-24" style="padding-top: 0px;">ยินดีต้อนรับสมาชิกใหม่</p>
                    <div style="padding-left: 15px; padding-right: 15px; padding-bottom: 15px;">
                        <div class="font-18" style="margin-bottom: 10px;">ขอแจ้งข่าวสาร</div>
                        <div class="font-17">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เนื่องด้วยเรื่อง แอฟ Tshare ที่ผมโพสต์ไว้ตอนนี้ได้ดำเนินการปรับปรุงเป็นที่เรียบร้อยแล้ว ทางกระผมจึงต้องการทำความเข้าใจ และชี้แจ้ง ในการใช้ แอฟ Tshare เราจะให้บริการ
                            เกี่ยวกับ เรื่องงาน เรื่องรถ และเรื่องผลประโยชน์ต่างๆที่พี่แท็กซี่ทั้งหลายจะได้รับ จึงขอเรียนเชิญ
                            ผู้นำคิว ผู้นำกลุ่ม หรือ ตัวแทน ที่สามารถมาร่วมทำความเข้าใจ และพร้อมจะร่วมงานกัน เพื่อผลประโยชน์ของพี่ๆแท็กซี่เอง
                            ในวันที่ 10/11/61 ณ ศูนย์กิฟวิ่งฟอร์เวิร์ด หน้า โรงแรมคาทิน่า
                            นัดหมายเวลา 10.00 น.เป็นต้นไป
                            ติดต่อ (061-1813772 ) สมัครได้ด้วยการเข้าโหลด เพลสโตร์ พิมพ์ Tshare แล้วกดโหลด เมื่อโหลดเสร็จ เข้าไปที่ตัวแอฟ แล้วกรอกรายละเอียด ส่วนตัวได้เลยคับ
                        </div>
                        <div style="padding: 5px;  text-align: right;">
                            <span class="font-17"><b>โชค</b> <a href="tel:093-524-8406">093-524-8406</a><br /><a href="tel:061-181-3772">061-181-3772</a></span>
                        </div>
                        <div>
                            <a href="https://maps.google.com/?q=7.871505,98.379508" target="_blank">
                                <ons-button style="margin-top: 0px; padding: 2px 10px;"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 20px;color: #ffffff;"></i> ตำแหน่งที่ประชุม</ons-button>
                            </a>
                        </div>
                    </div>
                </div>
            </ons-card>
        </div>
    </ons-modal>
    <ons-toast id="toast_confirm_select_place" animation="ascend">
        <span class="font-16">เลือก <b id="num_select">0</b> สถานที่</span>
        <!--          <button onclick="saveSelectPlaceOwner();" class="font-14">บันทึก</button>-->
        <button class="font-14">บันทึกแล้ว</button>
    </ons-toast>
</body>
</html>
<script>
    window.fn = {};
   var welcom_modal = document.querySelector('#welcome_modal');
   var hideCustomDialog = function(id) {
       document
       .getElementById(id)
       .hide();
   };
   window.fn = {};
   window.fn.toggleMenu = function() {
//     console.log('************************')
     document.getElementById('appSplitter').left.toggle();
   };
   window.fn.loadView = function(index) {
     document.getElementById('appTabbar').setActiveTab(index);
     document.getElementById('sidemenu').close();
   };
   window.fn.loadLink = function(url) {
     window.open(url, '_blank');
   };
   var chkpage = false;
   window.fn.popPage = function() {
   var content = document.getElementById('appNavigator');
//   console.log(content)
   // content.popPage();
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
//                     console.log(param);
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
//                     console.log(param);
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
//                     console.log(param);
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
//                     console.log(param);
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
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
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
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
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
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_bank_list",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_ins"){
             $.ajax({
                 url: "main/data_car_ins_list", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_ins",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_gen"){
             $.ajax({
                 url: "main/data_car_gen?i_brand="+$('#car_brand').val(), // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_gen",param,function(el){
                         $('#body_option').html(el);
                         $('#car_brand_in_gen').text($('#txt_car_brand').text());
                     });
                 }
             });
         }
     }
     if(page.id=="shopcategory.html"){
      if(page.open=="shopcategory"){
         if (id_province == undefined) {
             ons.notification.alert({
               message: 'จังหวัด',
               title: "กรุณาเลือก",
               buttonLabel: "ตกลง"
           })
             return false;
         }
//             console.log('-----------------------------------')
//             console.log($('#place_province').val())
         var param = { data : 'res' };
//         console.log(param);
         $.post("shop/shopcategory?pv="+$('#place_province').val(),param,function(el){
             $('#body_category').html(el);
                         // $('#car_brand_in_gen').text($('#text_shopcategory').text());
                     });
     }
     else if(page.open=="shoptype"){
         if (id_category == undefined) {
             ons.notification.alert({
               message: 'หมวดหมู่',
               title: "กรุณาเลือก",
               buttonLabel: "ตกลง"
           })
             return false;
         }
         var param = { data : 'res' };
//         console.log(param);
//         console.log(id_category)
         $.post("shop/shoptype?pv="+$('#place_province').val()+"&main="+id_category,function(el){
             $('#body_category').html(el);
                         // $('#car_brand_in_gen').text($('#txt_shoptype').text());
                     });
     }
     else if(page.open=="province"){
         var param = { data : 'res' };
//         console.log(param);
//         console.log(id_category)
         $.post("shop/shopprovince",function(el){
             $('#body_category').html(el);
                         // $('#car_brand_in_gen').text($('#txt_shoptype').text());
                     });
     }
   }
   else if (page.id == 'book_trans.html') {
//     console.log('aaaa')
   //   fn.pushPage({
   //   'id': 'book_trans.html',
   //   'title': 'จองรถ',
   //   'key': 'book_trans'
   // })
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
   function arrowChange(id){
     var check = $('#'+id+' i').hasClass('fa-chevron-down');
//     console.log(id+' : '+check);
     if(check==true){
         $('#'+id+' i').removeClass('fa-chevron-down');
         $('#'+id+' i').addClass('fa-chevron-up');
     }else{
         $('#'+id+' i').addClass('fa-chevron-down');
         $('#'+id+' i').removeClass('fa-chevron-up');
     }
     $('.arr').each (function() {
   //          console.log($(this).attr('id'));
   if($(this).attr('id')==id){
     //              console.log(1);
   }else{
   $(this).find('i').removeClass('fa-chevron-up');
   $(this).find('i').addClass('fa-chevron-down');
   }
   }); 
   //      $( ".arr i" ).not( document.getElementById( id ) ).removeClass('fa-chevron-up');
   //      $( ".arr i" ).not( document.getElementById( id ) ).addClass('fa-chevron-down');
   }
</script>
<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <!-- <button class="pswp__button pswp__button--share" title="Share"></button> -->
                <!-- <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> -->
                <!-- <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip">
                    <!-- <a href="#" class="pswp__share--facebook"></a>
                  <a href="#" class="pswp__share--twitter"></a>
                  <a href="#" class="pswp__share--pinterest"></a>
                  <a href="#" download class="pswp__share--download"></a> -->
                </div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var array_rooms;
      var res_socket;
      var socket = io.connect('https://www.welovetaxi.com:3443');
      var check_run_shop = 0;
   //on message received we print all the data inside the #container div
   socket.on('notification', function(data) {
      //          console.log("Start Socket");
//          			alert(data);
      if (typeof data.transfer !== 'undefined' && data.transfer.length > 0) {
          res_socket = data.transfer[0];
          if (data.transfer[0].length > 0) {
              $('#number_tbooking').show();
          } else {
              $('#number_tbooking').hide();
          }
          $('#number_tbooking').text(data.transfer[0].length);
//          alert($('#check_open_worktbooking').val());
          if ($('#check_open_worktbooking').val() == 1) {
//            alert($('#check_open_worktbooking').val());
//              console.log(data.transfer);
              $('#tab-trans_job').attr('badge', data.transfer[0].length);
              //        console.log('now open popup');
//              setTimeout(function(){
                readDataBooking();
//              },500);
          }
      }
   });
   var frist_socket = true;
   socket.on('getbookinglab', function(data) {
      // console.log(data)
      array_data = [];
      var done = [];
      var none = [];
      $.each(data, function(index, value) {
          var current = formatDate(new Date());
          var db = formatDate(value.transfer_date);
          if (value.driver_complete == 0) {
              if (class_user == "lab") {
                  if (db == current) {
                      done.push(value);
                  }
              } else {
                  if (db == current && value.drivername == detect_user) {
                      done.push(value);
                  }
              }
          }
      });
      array_data = {
          manage: done,
          history: none
      };
             console.log(array_data);
      if (check_run_shop != done.length) {
        if ($('#open_shop_manage').val() >0) {
          shopManage();
//          console.log(check_run_shop+" |||| " +done.length);
          check_run_shop = done.length;
        }
          
      }
      if (done.length > 0) {
          $('#number_shop').show();
      } else {
          $('#number_shop').hide();
      }
      $('#number_shop').text(done.length);
      if ($('#number_shop').text() > 0) {
          $('#tab_shop_mn').attr('badge', done.length);
      } else {
          $('#tab_shop_mn').removeAttr("badge");
      }
      /* check open order id auto */
      if (frist_socket == true) {
          var url_string = window.location.href; //window.location.href
          var url = new URL(url_string);
   //        console.log(get_order_id);
   if (get_order_id != "") {
      if (status == "his") {
          openOrderFromAndroidHistory(get_order_id, status, open_ic);
      } else {
          $.each(array_data.manage, function(index, value) {
              if (value.id == get_order_id) {
                          //                    	 alert(123);
                          console.log(value.id + " : " + index);
                          $('#check_open_num_detail').val(index)
                          $('#check_open_shop_id').val(value.id);
                          if (detect_mb == "Android") {
                              var type_m = "android";
                          } else {
                              var type_m = "ios";
                          }
                          openDetailShop(index, type_m);
                      }
                  });
      }
   }
   frist_socket = false;
   }
   });
   var id = detect_user;
   var dataorder = {
      order: parseInt(id),
   };
   socket.on('connect', function(){
     // call the server-side function 'adduser' and send one parameter (value of prompt)
     // socket.emit('addroom', prompt("What's your name?"));
   //	  socket.emit('addroom', name);
   //	  socket.emit('sendchat', '');
   socket.emit('adduser', dataorder);
   });
   function addUser() {
      var id = detect_user;
      var dataorder = {
          order: parseInt(id),
      };
   }
   // if (class_user == 'monitor') {
    socket.on('monitor', function(rooms, data) {
      console.log('in case monitor')
   // console.log(data)
   // console.log(rooms)
   });  
   // }
   socket.on('updaterooms', function(rooms, current_room) {
      $('#rooms').empty();
      console.log(rooms)
      array_rooms = rooms;
      console.log(current_room)
   });
   socket.on('datalab', function(socket_class, data) {
      console.log('***********************datalab***************************')
      console.log(class_user.toUpperCase()+" || "+socket_class.toUpperCase())
      console.log(data)
      if(class_user.toUpperCase()!= socket_class.toUpperCase()){
        console.log("No lab");
        return;
    }
    var check_open = $('#check_open_shop_id').val();
    if (check_open != 0) {
      $.each(data, function(index, value) {
          console.log(data)
          if (value.id == check_open) {
              console.log(value);
              if (value.check_driver_topoint == 1) {
                  console.log("driver_topoint");
                  changeHtml("driver_topoint", value.id, timestampToDate(value.driver_topoint_date, "time"));
              }
              if (value.check_guest_receive == 1) {
                  console.log("guest_receive");
                  changeHtml("guest_receive", value.id, timestampToDate(value.guest_receive_date, "time"));
                  $('.page').animate({
                      scrollTop: $(document).height()+700
                  }, 500);
              }
              if (value.check_guest_register == 1) {
                  console.log("guest_register");
                  changeHtml("guest_register", value.id, timestampToDate(value.guest_register_date, "time"));
                      //					alert(value.pax_regis);
                      $('#num_edit_persion2').val(value.pax_regis);
                      $('.page').animate({
                          scrollTop: $(document).height()+700
                      }, 500);
                  }
                  if (value.check_driver_pay == 1 && value.check_lab_pay == 1) {
                      loadBoxConfirmPay(value.id);
   //                    return;
   }
   if (value.check_driver_pay == 1) {
      loadBoxConfirmPay(value.id);
   }
   if (value.check_lab_pay == 1) {
      loadBoxConfirmPay(value.id);
   }
   if(data.transfer_money==1){
    load_status_trans(data.id);
    loadNewPlan(data.id)
   }
   }
   });
   }
   if ($('#open_shop_manage').val() == 1) {
      $.each(data, function(index, value) {
          if (value.lab_approve_job == 1) {
              if (value.check_driver_topoint == 1) {
                  $('#btn_manage_topoint_' + value.id).hide();
                  $('#btn_manage_' + value.id).show();
              } 
              else {
                  $('#btn_manage_topoint_' + value.id).show();
                  $('#btn_manage_' + value.id).hide();
              }
              $('#date_approved_job_' + value.id).show();
              $('#txt_date_approved_job_' + value.id).text(timestampToDate(value.lab_approve_job_date, 'time'));
              $('#txt_wait_' + value.id).hide();
              $('#td_cancel_book_' + value.id).hide();
              $('#status_book_' + value.id).html('<strong><font color="#ff0000">รอตอบรับ</font></strong>');
              $('#view_lab_approve_' + value.id).show();
              $.ajax({
                  url: "main/get_data_user?id=" + value.lab_approve_job_post,
                      //					           data: pass,
                      type: 'post',
                      dataType: 'json',
                      success: function(res) {
                          console.log(res);
                          var url_photo_lab = "../data/pic/driver/small/" + res.username + ".jpg?v=" + $.now();
                          $('#view_lab_approve_' + value.id).attr('onclick', 'modalShowImg(\'' + url_photo_lab + '\',\'' + res.nickname + '\');');
                          $('#text_name_approved').text(res.nickname);
                      }
                  });
          } 
          else {
              $('#btn_manage_topoint_' + value.id).hide();
              $('#txt_wait_' + value.id).show();
              $('#td_cancel_book_' + value.id).show();
              $('#status_book_' + value.id).html('<strong><font color="#54c23d">ยืนยันแล้ว</font></strong>');
              $('#view_lab_approve_' + value.id).hide();
          }
      });
          //        shopManage();
      }
      if($('#open_shop_wait_trans').val() == 1){
          if(data.transfer_money==1){
              var pass = {
                  data: data
              };
              console.log(pass);
              var url = "component/list_shop_manage?wait_trans=1";
              $.ajax({
                  url: url,
                  data: pass,
                  type: 'post',
                  success: function(ele) {
                      $('#list_shop_manage_' + data.id).html(ele);
                  }
              });
          }
      }
      setCountNotification();
   });
   socket.on('updatedriver', function(socket_class, data) {
      //	alert(data.pax_regis);
      console.log("++++++++++++++++++++++datadriver++++++++++++++++++++++++++++++++")
      console.log(class_user+" || "+socket_class)
      console.log(data)
   //    if(class_user.toUpperCase() != class_name){
   //      return;
   //    }
      //console.log(array_rooms)
      var check_open = $('#check_open_shop_id').val();
      if (check_open != 0) {
          if (data.id == check_open) {
              console.log(data)
              console.log(data.id);
              if (data.check_driver_topoint == 1) {
                  console.log("driver_topoint");
                  changeHtml("driver_topoint", data.id, timestampToDate(data.driver_topoint_date, "time"));
                  $('.page').animate({
                      scrollTop: $(document).height()+700
                  }, 500);
              }
              if (data.check_guest_receive == 1) {
                  console.log("guest_receive");
                  changeHtml("guest_receive", data.id, timestampToDate(data.guest_receive_date, "time"));
                  $('#step_guest_register').show();
                  $('.page').animate({
                      scrollTop: $(document).height()+700
                  }, 500);
              }
              if (data.check_guest_register == 1) {
                  console.log("guest_register");
                  changeHtml("guest_register", data.id, timestampToDate(data.guest_register_date, "time"));
                  $('#num_edit_persion2').val(data.pax_regis);
                  //            $('#step_driver_pay_report').show();
              }
              if (data.check_driver_pay == 1 && data.check_lab_pay == 1) {
                  loadBoxConfirmPay(data.id);
   //                    return;
   }
   if (data.check_driver_pay == 1) {
      loadBoxConfirmPay(data.id);
   }
   if (data.check_lab_pay == 1) {
      loadBoxConfirmPay(data.id);
   }
   if(data.transfer_money==1){
     load_status_trans(data.id);
     loadNewPlan(data.id)
   }
              /*if (data.check_driver_pay_report == 1) {
                  console.log("driver_pay_report");
                  changeHtml("driver_pay_report", data.id,timestampToDate(data.driver_pay_report_date, "time"));
              }*/
          }
      }
//      console.log($('#open_shop_manage').val());
      if ($('#open_shop_manage').val() == 1) {
          console.log("*************************************");
          if (data.lab_approve_job == 1) {
              if (data.check_driver_topoint == 1) {
                  $('#btn_manage_topoint_' + data.id).hide();
                  $('#btn_manage_' + data.id).show();
              } 
              else {
                  $('#btn_manage_topoint_' + data.id).show();
                  $('#btn_manage_' + data.id).hide();
              }
              $('#date_approved_job_' + data.id).show();
              $('#txt_date_approved_job_' + data.id).text(timestampToDate(data.lab_approve_job_date, 'time'));
              $('#txt_wait_' + data.id).hide();
              $('#td_cancel_book_' + data.id).hide();
              $('#status_book_' + data.id).html('<strong><font color="#ff0000">รอตอบรับ</font></strong>');
              $.ajax({
                  url: "main/get_data_user?id=" + data.lab_approve_job_post,
                      //data: pass,
                      type: 'post',
                      dataType: 'json',
                      success: function(res) {
                          console.log(res);
                          $('#view_lab_approve_'+data.id).show();
                          var url_photo_lab = "../data/pic/driver/small/"+res.username+".jpg";
                          $('#view_lab_approve_'+data.id).attr('onclick','modalShowImg(\'' + url_photo_lab + '\');');
                          $('#text_name_approved').text(res.nickname);
                      }
               });
          } 
          else {
              $('#btn_manage_' + data.id).hide();
              $('#txt_wait_' + data.id).show();
              $('#td_cancel_book_' + data.id).show();
              $('#status_book_' + data.id).html('<strong><font color="#54c23d">ยืนยันแล้ว</font></strong>');
          }
      }
      if($('#open_shop_wait_trans').val() == 1){
          if(data.transfer_money==1){
              var pass = {
                  data: data
              };
              console.log(pass);
              var url = "component/list_shop_manage?wait_trans=1";
              $.ajax({
                  url: url,
                  data: pass,
                  type: 'post',
                  success: function(ele) {
                      $('#list_shop_manage_' + data.id).html(ele);
                  }
              });
          }
      }
      setCountNotification();
      if ($('#check_open_noti_menu').val() == 1) {
          loadNotificationPage();
      }
   });
   socket.on('checkDeposit', function (data) {
   console.log(data);
   console.log(CurrencyFormatted(data[0].balance));
   if($('#check_open_wallet').val()>0){
     history_wallet();
     getDeposit(detect_user);
   }
  });
</script>
<div class="hiddendiv common"></div>
<div class="drag-target" data-sidenav="slide-out" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 10px; left: 0px;"></div>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=th"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?=$lng_map;?>"  type="text/javascript" async defer> </script> -->
<!-- <script src="https://cdn.rawgit.com/googlemaps/js-rich-marker/gh-pages/src/richmarker.js?v=<?=time();?>"></script> -->
<input type="hidden" value="0" id="check_custome_js" />
<script src="<?=base_url();?>assets/custom.js?<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/notification.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/script/activity.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/script/profile.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/bank.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/car.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/shop.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/income.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/wallet.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/taxilist.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/information.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/transfer.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/station.js?v=<?=time();?>"></script>
<!-- <script src="<?=base_url();?>assets/script/booking.js?v=<?=time();?>"></script> -->
<!-- ==================================================================================================-->
<!--============================================= CALL CHAT ========================================== -->
<script src="https://www.welovetaxi.com:8080/socket.io/socket.io.js?v=<?=time()?>"></script>
<script>
    var socket2 = io.connect('https://www.welovetaxi.com:8080');
    var from_to, reverse, img, utc;
    socket2.on('connect', function() {
        // call the server-side function 'adduser' and send one parameter (value of prompt)
        // socket.emit('addroom', prompt("What's your name?"));
        setTimeout(function() {
            //            console.log(9999999999)
            socket2.emit('addroom', '<?=$_COOKIE[detect_user];?>');
        }, 1500);
    });
    socket2.on('checkmsg', function(count, room) {
        // $('#rooms').empty();
        // console.log(rooms)
        // roomOpen
        console.log('*************************************************************')
        console.log(count)
        console.log(room)
        console.log(roomOpen)
        if (count != 0) {
            if (roomOpen == false) {
                $('#tab_contact').attr('badge', count);
            }
        } else {
            $("#tab_contact").removeAttr("badge");
        }
        // array_rooms = rooms;
        // console.log(current_room)
    });
</script>
<script src="<?=base_url();?>assets/script/chat.js?v=<?=time();?>"></script>
<!-- ======================================= END =========================================================== -->
<script>
    if ('<?=$_GET[status];?>' != "his") { //เช็คว่าสเตตัสที่ส่งมาเป็น ประวัติ หรือ กำลังจัดการ
        $(window).on('load', function() {
            $("#load_material").fadeOut(500);
            modal.hide();
            countReadInformation();
            setCountNotification();
            setTimeout(function() {
                sendTagIOS(class_user, username);
                var check_new_user = '<?=$_GET[check_new_user];?>';
                var regis_linenoti = '<?=$_GET[regis];?>';
            }, 1500);
        });
    }
    if (detect_mb == "Android") {
        sendTagOs(class_user, username);
    }
    var modal_photo = document.querySelector('#modal_photo');
    $('ons-splitter-mask').click(function() {
        var check_pf = $('#list_profile i').hasClass('fa-chevron-down');
        if (check_pf == false) {
            performClick('head_list_pf');
        }
        var check_pf = $('#list_acc i').hasClass('fa-chevron-down');
        if (check_pf == false) {
            performClick('head_list_acc');
        }
        var check_pf = $('#list_q i').hasClass('fa-chevron-down');
        if (check_pf == false) {
            performClick('head_list_q');
        }
    });
</script>