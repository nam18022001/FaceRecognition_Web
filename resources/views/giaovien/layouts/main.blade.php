<!DOCTYPE html>
<html lang="en">

<head>

@yield('title')
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="" />
<meta name="keywords" content="">
<meta name="author" content="" />
<!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn,T Facebook, Google+ -->
<meta property="og:site_name" content="" />
<!-- website name -->
<meta property="og:site" content="" />
<!-- website link -->
<meta property="og:title" content="" />
<!-- title shown in the actual shared post -->
<meta property="og:description" content="" />
<!-- description shown in the actual shared post -->
<meta property="og:image" content="" />
<!-- image link, make sure it's jpg -->
<meta property="og:url" content="" />
<!-- where do you want your post to link to -->
<meta property="og:type" content="article" />
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
<!-- style css -->
<link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
<!-- modernizr css -->
<script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<!-- fontawesome icon -->
<link rel="stylesheet" href="{{asset('admin_assets/assets/fontawesome/css/all.css')}}">
<!-- animation css -->
<link rel="stylesheet" href="{{asset('admin_assets/assets/plugins/animation/css/animate.min.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- vendor css -->
<link rel="stylesheet" href="{{asset('admin_assets/assets/css/style.css')}}">

@yield('css')
<style>
    i{
        color: rgb(1, 126, 1);
    }
    a:hover{
        text-decoration: none;
    }
</style>
</head>

<body class="">
    
    

    
<!-- [ Pre-loader ] start -->
@include('giaovien.layouts.loadpage')
<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
@include('giaovien.layouts.slidebar')

<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
@include('giaovien.layouts.header')

<!-- [ Header ] end -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Vendor js -->
    <script src="{{asset('admin_assets/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/assets/js/pcoded.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    @yield('js')
<!-- modernizr css -->
<script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<script>
        $("#hihihi").click(function(){
    $.ajax(
{
    url: 'http://greendormitory.com/quan-ly/thong-bao/time/real',
    type: 'GET', 
    // dataType: "JSON",
    data: {
        "id": '1' 
    },
    success: function (response)
    {
        $("#thongbao").html(response);
    }
});
});
</script>
@yield('script')
</body>

</html>