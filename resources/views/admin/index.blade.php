@extends('admin.layouts.main')

@section('title')
    <title>Admin</title>
@endsection
@section('content')

@if (Auth::user())
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5>Quản lý</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><i class="feather icon-home"></i></li>
					<li class="breadcrumb-item"><a href="#">Báo cáo</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">

	<!-- product profit start -->
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-red">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Camera hoạt động</h6>
						<h3 class="m-b-0 text-white"></h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-user-graduate text-c-red f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-blue">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Lịch học hôm nay</h6>
						<h3 class="m-b-0 text-white"></h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-cogs text-c-blue f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-green">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Tổng Số Tài Khoản</h6>
						<h3 class="m-b-0 text-white"></h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-users text-c-green f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-yellow">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Lớp học được dùng</h6>
						<h3 class="m-b-0 text-white"></h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-envelope-open text-c-yellow f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- sessions-section start -->
	<div class="col-xl-8 col-md-6">
		<div class="card table-card">
			<div class="card-header">
				<h5>Lịch học</h5>
			</div>
			<div class="card-body px-0 py-0">
				<div class="table-responsive">
					<div class="session-scroll" style="height:478px;position:relative;">
						<table id="dataTable2" class="text-center">
							<thead class="text-capitalize">
							<tr>
							<th>Lớp học</th>
							<th>Lớp</th>
							<th>Mã sinh viên</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Khu/Tầng: </th>
							</tr>
							</thead>
							<tbody>
								{{-- @foreach ($truong_tang as $item)
									<tr>
										<td>
											{{$item->Ten}}
										</td>
										<td>
											{{$item->Lop}}
										</td>
										<td>
											{{$item->MSSV}}
										</td>
										<td>
											{{$item->email}}
										</td>
										<td>
											0{{$item->SDT}}
										</td>
										<td>
											{{$item->giuong->phong->tang->khu->khu}} / {{$item->giuong->phong->tang->tang}} / {{$item->giuong->phong->phong}}
										</td>
									</tr>
								@endforeach --}}
							</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- sessions-section end -->
	<div class="col-md-6 col-xl-4">
		<div class="card user-card">
			<div class="card-header">
				<h5>Hồ Sơ</h5>
			</div>
			<div class="card-body  text-center">
				<div class="usre-image">
					<img src="{{asset('logoofme.png')}}" class="img-radius wid-100 m-auto" alt="User-Profile-Image">
				</div>
				<h6 class="f-w-600 m-t-25 m-b-10">{{Auth::user()->name}}</h6>
			
				<hr>
				<p class="m-t-15">Activity Level: 87%</p>
				<hr>
				<div class="row justify-content-center user-social-link">
					<div class="col-auto"><a href="#!"><i class="fab fa-facebook-f text-primary f-22"></i></a></div>
					<div class="col-auto"><a href="#!"><i class="fab fa-twitter text-c-info f-22"></i></a></div>
					<div class="col-auto"><a href="#!"><i class="fab fa-dribbble text-c-red f-22"></i></a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- [ Main Content ] end -->
@else
	<div class="alert alert-danger">
		Bạn không có quyền vào trang này
	</div>
@endif





@endsection