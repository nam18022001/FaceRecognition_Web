<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed">
	<div class="m-header">
		<a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
		<a href="index.html" class="b-brand">
		</a>
	</div>
	<a class="mobile-menu" id="mobile-header" href="#!">
		<i class="feather icon-more-horizontal"></i>
	</a>
	<div class="collapse navbar-collapse">
		<a href="#" class="mob-toggler"></a>
		
		<ul class="navbar-nav ml-auto">
			
			<li>
				<div class="dropdown drp-user">
					<a href="#" class="a" data-toggle="dropdown">
					
							<img src="{{asset('giaovien_avatars/'.Auth::guard('giaovien')->user()->avatar)}}" width="40" class="img-radius" alt="User-Profile-Image">
		
						&nbsp;
						<i class="fas fa-chevron-down" style="color: rgba(0, 0, 0, 0.544); font-size: 12px;"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-notification">
						<div class="pro-head">
							<img src="{{asset('giaovien_avatars/'.Auth::guard('giaovien')->user()->avatar)}}" width="40" class="img-radius" alt="User-Profile-Image">
							<span>{{Auth::guard('giaovien')->user()->name}}</span>
							<a href="{{url('giaovien/logout')}}" class="dud-logout" title="Logout">
								<i class="feather icon-log-out"></i>
							</a>
						</div>
						<ul class="pro-body">
							<li><a href="{{url('/')}}" class="dropdown-item"><i class="feather icon-home"></i> Trang chủ</a></li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
</header>