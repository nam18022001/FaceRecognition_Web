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
					<label>Giáo Viên</label>
				</li>
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-calendar-week"></i></span><span class="pcoded-mtext">Lịch dạy</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('giaovien/lichhoc')}}" class="">Danh sách các buổi học trong tuần</a></li>
					</ul>
				</li>
				
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-cog"></i></span><span class="pcoded-mtext">Cài đặt tài khoản</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('giaovien/logout')}}" class="">Đăng xuất</a></li>
					</ul>
				</li>
				
			</ul>
			</div>
		</div>
	</div>
</nav>