@extends('giaovien.layouts.main')
@section('title')
    <title>Điểm danh {{$tenhocphan}}</title>
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
            <th>Mã Sinh Viên</th>
            <th>Thời Gian Điểm Danh</th>
            <th>Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dssv as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->MaSV}} </td>  
                <td>
                    @if ($value->thoigiandiemdanh != null)
                        {{$value->thoigiandiemdanh}}
                    @else
                        {{"Không có"}}
                    @endif
                </td>
                <td>
                    @if ($value->diemdanh == 1)
                        <span style="color: #1ec63f; font-weight: bold">Có Mặt</span>
                    @elseif($value->diemdanh == 0)
                        <span style="color: #b51818; font-weight: bold">Vắng</span>
                    @else
                        <span style="color: #b5b018; font-weight: bold">Chưa có</span>
                    @endif
                </td> 
            </tr>

        @endforeach
    </tbody>
</table>


@endsection

@section('script')
<script>
    $basic_url = "http://localhost:8000/admin/lichhoc/load/dssv/";
    $(document).ready(function(){
        $("#dssv").click(function(){
            var idLH = $(this).val();
            $.get($basic_url +idLH, function(data){
                $("#tensv").html(data);
            });
        });
    });
</script>
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