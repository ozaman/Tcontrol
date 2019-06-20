
<div class="sidebar-back"></div>
<div class="sidebar-content">
  <div class="nav-brand">
    <a class="main-brand" href="dashboards/dashboard">
        <!-- <h4 class="text-light text-white"><span><strong>ระบบจัดการงาน ทีแชร์</strong> </span></h3> -->
      <h3><span><img src="<?=base_url();?>assets/img/logo.png?v=1537590462" align="absmiddle" width="190"></span>
        <i><img src="<?=base_url();?>assets/img/logomini.png?v=1537590462" align="absmiddle" width="45" id="img_mini" style=""></i>
      </h3>
  <!-- <h3 class="text-light text-white"><span><strong>T-SHARE PANEL</strong> </span></h3> -->

    </a>
  </div>



  <!-- BEGIN MENU SEARCH -->
  <form class="sidebar-search" role="search">
      <!-- <a href="javascript:void(0);"><i class="fa fa-search fa-fw search-icon"></i><i class="fa fa-angle-left fa-fw close-icon"></i></a> -->
    <div class="form-group">
        <!-- <h4 class="text-light text-white"><span><strong>ระบบจัดการงาน ทีแชร์</strong> </span></h3> -->
      <!-- <div class="input-group">
          <input type="text" class="form-control navbar-input" placeholder="Search...">
          <span class="input-group-btn">
              <button class="btn btn-equal" type="button"><i class="fa fa-search"></i></button>
          </span>
      </div> -->
    </div>
  </form>


  <!-- END MENU SEARCH -->

  <!-- BEGIN MAIN MENU -->
  <ul class="main-menu">
    <!-- Menu Dashboard -->
    <li id="head_home">
      <a href="">
        <i class="fa fa-home fa-fw"></i><span class="title">หน้าแรก</span>
      </a>
    </li><!--end /menu-item -->
    <!-- Menu UI -->
    <li id="head_setting">
      <a href="javascript:void(0);">
        <i class="fa fa-cog fa-fw"></i><span class="title">ตั้งค่าระบบ</span> <span class="expand-sign">+</span>
      </a>
      <!--start submenu -->
      <ul>
        <li><a href="ui/boxes">ตั้งค่าระบบ</a></li>

        <li><a href="ui/buttons">แจ้งเตือน</a></li>



      </ul><!--end /submenu -->
    </li><!--end /menu-item -->
    <!-- Menu Pages -->
    <li id="head_user">
      <a href="javascript:void(0);">
        <i class="fa fa-users fa-fw"></i><span class="title">ผู้ใช้งานระบบ</span> <span class="expand-sign">+</span>
      </a>
      <!--start submenu -->
      <ul>
        <li><a href="<?=base_url();?>users/content?type=admin">ผู้ดูแลระบบ<span class="badge"></span></a></li>

        <li><a href="<?=base_url();?>Users/content?type=supplier">ผู้ให้บริการ</a></li>

        <li><a href="<?=base_url();?>users/content?type=driver">คนขับรถ</a></li>

       <!--  <li><a href="users?type=supplier">เคาน์เตอร์</a></li>


        <li><a href="users?type=supplier">สมาชิก</a></li> -->





      </ul><!--end /submenu -->
    </li><!--end /menu-item -->
    <!-- Menu Tables -->
    <?php
    session_start();
    if ($_SESSION[level] >= 8) {
      ?>
      <li id="head_shop">
        <a href="javascript:void(0);">
          <i class="fa icon-app-uniF11A-1 fa-fw"></i><span class="title">จัดการร้านค้า</span> <span class="expand-sign">+</span>
        </a>
        <!--start submenu -->
        <ul>
          <li><a href="<?=base_url();?>shop/data_shop_categorie" >หมวดหมู่ทั้งหมด</a></li>
          <li><a  href="<?=base_url();?>shop/data_shop_all" >สถานที่ทั้งหมด</a></li>
          <!-- <li><a href="tables/dynamic">ประเภทสินค้าย่อย</a></li> -->
        </ul><!--end /submenu -->
      </li><!--end /menu-item -->
<?php }
else {?>
      <li id="head_shop">
        <a href="">
          <i class="fa icon-app-uniF11A-1 fa-fw"></i><span class="title">จัดการร้านค้า</span>
        </a>
      </li><!--end /menu-item -->
<?php }?>
    <li  id="head_station">
      <a href="javascript:void(0);">
        <i class="fa fa-globe fa-fw"></i><span class="title">จัดการสถานที่</span> <span class="expand-sign">+</span>
      </a>
      <!--start submenu -->
      <ul>
        <li><a href="<?=base_url();?>station/place_car_station" >คิวรถ</a></li>


        <!-- <li><a href="tables/dynamic">ประเภทสินค้าย่อย</a></li> -->



      </ul><!--end /submenu -->
    </li><!--end /menu-item -->
    <!-- Menu Forms -->
    <li id="head_usecontrol">
      <a href="javascript:void(0);">
        <i class="fa icon-app-uniF13C fa-fw"></i><span class="title">ข้อมูลการใช้บริการ</span> <span class="expand-sign">+</span>
      </a>
      
      <!--start submenu -->
      <ul>
        <li><a href="<?=base_url();?>forms/layouts">ข้อมูลการใช้บริการ</a></li>
        <li><a href="<?=base_url();?>job/job_manage_shop">จัดการงานส่งแขก</a></li>
        <li><a href="<?=base_url();?>job/job_nopaid_shop">รายการค้างจ่าย</a></li>
        


      </ul><!--end /submenu -->
    </li><!--end /menu-item -->
    <!-- Menu Charts -->
    <!--end /menu-item -->
    <!-- Menu Levels -->
    <li id="head_account">
      <a href="javascript:void(0);">
        <i class="fa icon-app-uniF15D fa-fw"></i><span class="title">ข้อมูลบัญชี</span> <span class="expand-sign">+</span>
      </a>
      <!--start submenu -->
      <ul>
        <li><a href="#"><span class="title">รายรับบริษัท</span></a></li>
        <li><a href="#"><span class="title">รายจ่ายบริษัท</span></a></li>

      </ul><!--end /submenu -->
    </li>
    <li id="setting_app_menu">
      <a href="javascript:void(0);">
        <i class="fa fa-file-text-o"></i><span class="title">ข้อมูลระบบ</span> <span class="expand-sign">+</span>
      </a>
      <!--start submenu -->
      <ul>
        <li><a href="<?=base_url();?>setting/car_brand"><span class="title">ยี่ห้อรถ</span></a></li>
        <li><a href="<?=base_url();?>setting/car_type"><span class="title">ประเภทรถ</span></a></li>
        <!--<li><a href="#"><span class="title">รายจ่ายบริษัท</span></a></li>-->
      </ul><!--end /submenu -->

    </li>
    <!-- <li>
        <a href="javascript:void(0);">
            <i class="fa fa-user fa-fw"></i><span class="title">แก้ไขข้อมูลส่วนตัว</span> 
        </a>
        
    </li>
    <li>
        <a href="main/logout">
            <i class="fa fa-power-off fa-fw"></i><span class="title">ออกจากระบบ</span>
        </a>
    </li> --><!--end /menu-item -->

  </ul><!--end .main-menu -->
  <!-- END MAIN MENU -->
</div>
<script type="text/javascript">
  var menu = '<?=$menu;?>';
  // console.log(menu)
  // if (menu == 'station') {
  $('#head_' + menu).removeClass('expanded');
  $('#head_' + menu).addClass('expanded');
  // }
</script>
