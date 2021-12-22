@extends('admin.layouts.main')
@section('title')
    <title>Danh sách sinh viên</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.semanticui.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<style>
    
    table{
        font-family:Verdana;
        
    }
    .ui.table thead th{
        cursor:auto;
        background:#3eff64
        ;text-align:inherit;
        color:rgba(218, 14, 14, 0.87)
    ;}
    .ui.menu{
        background: rgba(255, 255, 255, 0.673);
    font-weight: 400;
    border: 1px solid rgb(0, 0, 0);
    }
    .ui.pagination.menu .active.item {
    border-top: none;
    padding-top: .92857143em;
    background-color: rgb(223, 223, 223);
    color: rgba(255, 255, 255, 0.646);
    -webkit-box-shadow: none;
    box-shadow: none;
}

.image-cropper {
    border: 1PX solid lightblue;
    position: relative;
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
}

.image-cropper img{
    width: 100%;
  height: auto;

}
</style>
@endsection
@section('content')
@if (session('themthanhcong'))
    <div class="alert alert-success">
        {{session('themthanhcong')}}
    </div>
@endif
<table id="example" class="ui celled table" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Họ và Tên</th>
            <th>MSSV</th>
            <th>Ảnh đại diện</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sinhvien as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->HoTen}}</td>
                <td>{{$value->MaGV}}</td>
                <td>
                    <div class="image-cropper">
                        <img src="{{ asset('giaovien_avatars') }}/{{$value->avatar}}" class="rounded" />
                     </div>
                </td>
                <td>
                    <a class="btn btn-outline-warning btn-rounded" href="{{url('admin/giaovien/sua')}}/{{$value->id}}">Sửa</a>
                    <a class="btn btn-outline-danger btn-rounded " href="{{url('admin/giaovien/xoa')}}/{{$value->id}}">Xóa</a>
                </td>
            </tr>

        @endforeach
    </tbody>

</table>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'print', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( $('div.eight.column:eq(0)', table.table().container()) );
} );
    </script>
@endsection