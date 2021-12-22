@extends('admin.layouts.main')
@section('title')
    <title>Thêm lịch học</title>
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
    input[type="number"],
    input[type="datetime-local"]{
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
        <h2 class=" col-md-12 text-center font-bold"><strong>Thêm Lịch Học</strong></h2>

    <!-- First Step -->
    <form class="form-horizontal mt-3" action="{{url('admin/lichhoc/them')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class=" setup-content-2 mt-5" id="step-1">
            <div class="col-md-12">
                <h3 class="font-weight-bold text-center pl-0 my-4"><strong>Vui lòng nhập tất cả các trường</strong></h3>
                
                <div class="form-group row">
                    <label for="lop" class="col-md-3 control-label">Lớp Dạy</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="lop" id="lop">
                            <option value="0">-- Chọn Lớp Dạy --</option>
                            @foreach ($lop as $values)
                            <option value="{{$values->id}}">{{$values->Tên}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mon" class="col-md-3 control-label">Môn Dạy</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="monhoc" id="mon">
                            <option value="0">-- Chọn Môn Dạy --</option>
                            @foreach ($monhoc as $values)
                            <option value="{{$values->id}}">{{$values->Tên}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="giaovien" class="col-md-3 control-label">Giáo Viên</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="giaovien" id="giaovien">
                            <option value="0">-- Chọn Giáo Viên --</option>
                        </select>
                    </div>
                </div>
                    
                <div class="form-group row">
                    <label for="sinhvien" class="col-md-3 control-label">Sinh Viên</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="sinhvien[]" id="sinhvien" size="1" multiple>
                            {{-- <option value="0">-- Chọn Sinh Viên --</option> --}}
                            @foreach ($sv as $item)
                            <option  value="{{$item->id}}">{{$item->MaSV}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="timebegin" class="col-md-3 control-label">Thời gian bắt đầu</label>
                    <div class="col-md-9">
                        <input type="datetime-local" name="timebegin" id="timebegin" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="timefinish" class="col-md-3 control-label">Thời gian kết thúc</label>
                    <div class="col-md-9">
                        <input type="datetime-local" name="timefinish" id="timefinish" class="form-control">
                    </div>
                </div>
                    
                <button class="btn btn btn-primary btn-mdb-color btn-rounded nextBtn-2 float-right" type="submit">Thêm</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
    $basic_url = "http://localhost:8000/admin/lichhoc/load/giaovien/";
    $(document).ready(function(){
        $("#mon").change(function(){
            var idMonHoc = $(this).val();
            $.get($basic_url +idMonHoc, function(data){
                $("#giaovien").html(data);
            });
        });
    });
</script>
@endsection