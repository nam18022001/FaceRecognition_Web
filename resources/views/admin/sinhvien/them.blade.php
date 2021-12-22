@extends('admin.layouts.main')
@section('title')
    <title>Thêm sinh viên</title>
@endsection
@section('css')
<style>
    .select {
        border: none;
        border-bottom: 2px solid rgb(14, 218, 38);
        letter-spacing: 0.15em;
        border-radius: 10;
    }
    
    .themnhanvien {
        margin: auto;
    }
    
    
    input[type="email"],
    input[type="text"],
    input[type="tel"],
    input[type="file"],
    input[type="password"],
    input[type="number"] {
        border: none;
        border-bottom: 2px solid rgb(14, 218, 38);
    }
    
</style>
</head>

@endsection
@section('content')

<div class="col-lg-8 themnhanvien">
    @if (session('thongbaoimg'))
    <div class="alert alert-danger">
        {{session('thongbaoimg')}}
    </div>
    @endif  
    <div class="mt-5">
        <h2 class=" col-md-12 text-center font-bold"><strong>Thêm Sinh Viên</strong></h2>

    <!-- First Step -->
    <form class="form-horizontal mt-3" action="{{url('admin/sinhvien/them')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class=" setup-content-2 mt-5" id="step-1">
            <div class="col-md-12">
                <h3 class="font-weight-bold text-center pl-0 my-4"><strong>Vui lòng nhập tất cả các trường</strong></h3>
                
                <div class="form-group row">
                    <label for="name" class="col-md-3 control-label">Họ</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="name" name='name'required placeholder="Nhập Họ Tên">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-md-3 control-label">Tên</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="lastname" name='lastname'required placeholder="Nhập Họ Tên">
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="MSSV" class="col-md-3 control-label">Mã Sinh Viên</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="MSSV" name='MSSV' required placeholder="Nhập Mã Sinh Viên">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="password" name='password' required placeholder="Nhập Mật khẩu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avatar" class="col-md-3 control-label">Ảnh đại diện</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" id="avatar" name="avatar" required>
                        </div>
                    </div>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded nextBtn-2 float-right" type="submit">Thêm</button>
            </div>
        </div>
    </form>
@endsection
