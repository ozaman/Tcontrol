
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
	<li >
		<a href="">
			<i class="fa fa-home fa-fw"></i><span class="title">หน้าแรก</span>
		</a>
	</li><!--end /menu-item -->
	<!-- Menu UI -->
	<li>
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
	<li >
		<a href="javascript:void(0);">
			<i class="fa fa-users fa-fw"></i><span class="title">ผู้ใช้งานระบบ</span> <span class="expand-sign">+</span>
		</a>
		<!--start submenu -->
		<ul>
			<li><a href="pages/profile">ผู้ดูแลระบบ<span class="badge">42</span></a></li>

			<li><a href="pages/invoice">ผู้ให้บริการ</a></li>

			<li><a href="pages/calendar">คนขับรถ</a></li>

			<li><a href="pages/pricing">เคาน์เตอร์</a></li>

			
			<li><a href="pages/locked">สมาชิก</a></li>

			

			

		</ul><!--end /submenu -->
	</li><!--end /menu-item -->
	<!-- Menu Tables -->
	<li class="expanded">
		<a href="javascript:void(0);">
			<i class="fa icon-app-uniF11A-1 fa-fw"></i><span class="title">จัดการร้านค้า</span> <span class="expand-sign">+</span>
		</a>
		<!--start submenu -->
		<ul>
			<li><a href="<?=base_url();?>shop/data_shop_categorie" >หมวดหมู่ทั้งหมด</a></li>
			<li><a  href="<?=base_url();?>shop/data_shop_all" >ร้านค้าทั้งหมด</a></li>

			<!-- <li><a href="tables/dynamic">ประเภทสินค้าย่อย</a></li> -->

			

		</ul><!--end /submenu -->
	</li><!--end /menu-item -->
	<!-- Menu Forms -->
	<li>
		<a href="javascript:void(0);">
			<i class="fa icon-app-uniF13C fa-fw"></i><span class="title">ข้อมูลการใช้บริการ</span> <span class="expand-sign">+</span>
		</a>
		<!--start submenu -->
		<ul>
			<li><a href="forms/layouts">ข้อมูลการใช้บริการ</a></li>

			

					</ul><!--end /submenu -->
	</li><!--end /menu-item -->
	<!-- Menu Charts -->
	<!--end /menu-item -->
	<!-- Menu Levels -->
	<li>
		<a href="javascript:void(0);">
			<i class="fa icon-app-uniF15D fa-fw"></i><span class="title">ข้อมูลบัญชี</span> <span class="expand-sign">+</span>
		</a>
		<!--start submenu -->
		<ul>
			<li><a href="#"><span class="title">รายรับบริษัท</span></a></li>
			<li><a href="#"><span class="title">รายจ่ายบริษัท</span></a></li>
			
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
	