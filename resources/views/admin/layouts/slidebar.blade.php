<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
	<div class="navbar-wrapper ">
		<div class="navbar-brand header-logo">
			<a href="{{url('admin')}}" class="b-brand">
				<img src="{{asset('logo/green3.png')}}" width="29%" alt="" class="logo images">
				<img src="{{asset('logo/logoofme1.png')}}"width="60%" alt="" class="logo-thumb images">
			</a>
			<a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
		</div>
		<div class="navbar-content scroll-div">
			<ul class="nav pcoded-inner-navbar">
				<li class="nav-item pcoded-menu-caption">
					<label>Quản lý</label>
				</li>
				<li class="nav-item">
					<a href="{{url('admin')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Quản lý</span></a>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-calendar-week"></i></span><span class="pcoded-mtext">Lịch học</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('admin/lichhoc')}}" class="">Danh sách các buổi học trong tuần</a></li>
						<li class=""><a href="{{url('admin/lichhoc/them')}}" class="">Thêm</a></li>
					</ul>
				</li>
				
				<li class="nav-item">
					<a href="{{url('admin/lich-hoc')}}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-camera"></i></span><span class="pcoded-mtext">Chi tiết máy quay</span></a>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-tie"></i></span><span class="pcoded-mtext">Giáo Viên</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('admin/giaovien')}}" class="">Danh sách giáo viên</a></li>
						<li class=""><a href="{{url('admin/giaovien/them')}}" class="">Thêm</a></li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-graduate"></i></span><span class="pcoded-mtext">Sinh viên</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('admin/sinhvien')}}" class="">Danh sách sinh viên</a></li>
						<li class=""><a href="{{url('admin/sinhvien/them')}}" class="">Thêm</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="{{url('admin/phonghoc')}}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-th"></i></span><span class="pcoded-mtext">Phòng học</span></a>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-cog"></i></span><span class="pcoded-mtext">Cài đặt tài khoản</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('admin/logout')}}" class="">Đăng xuất</a></li>
					</ul>
				</li>
				
			</ul>
			</div>
		</div>
	</div>
</nav>