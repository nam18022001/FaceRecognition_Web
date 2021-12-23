<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Điểm danh nhận diện khuôn mặt</title>
    
    <link rel="stylesheet" href="{{ asset('homepage_assets/org/jquery-circle-menu/css/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>

<body>
<div class='selector'>
    <ul>
        <li >
            <input id='1' type='checkbox'>
            <label for='1' class="far fa-cat"> <input type="hidden" id="link1" value="{{ url('admin') }}"></label>
        </li>
        <li>
            <input id='2' type='checkbox'>
            <label for='2' class="far fa-users-class"><input type="hidden" id="link2" value="{{ url('giaovien') }}"></label>
        </li>
        <li>
            <input id='3' type='checkbox'>
            <label for='3'class="far fa-lock-alt"></label>
        </li>
        <li>
            <input id='4' type='checkbox'>
            <label for='4' class="fal fa-tools"></label>
        </li>
        <li>
            <input id='5' type='checkbox'>
            <label for='5' class="fal fa-audio-description"></label>
        </li>
        <li>
            <input id='6' type='checkbox'>
            <label for='6' class="fab fa-apple"></label>
        </li>
        <li>
            <input id='7' type='checkbox'>
            <label for='7' class="fal fa-angel"></label>
        </li>
        <li>
            <input id='8' type='checkbox'>
            <label for='8' class="fab fa-android"></label>
        </li>
    </ul>
    <input type="hidden" id="linkhuaban" value="{{ asset('images/huaban.png') }}">
    <button>Click here</button>
</div>
<script src="{{ asset('homepage_assets/org/jquery-circle-menu/js/jquery.min.js') }}"></script>
<script src="{{ asset('homepage_assets/org/jquery-circle-menu/js/index.js') }}"></script>
<script src="{{ asset('homepage_assets/org/printer-master/javascript/printer.js') }}"></script>
<script src="{{ asset('homepage_assets/org/jquery-hb/js/snowfall.jquery.js') }}"></script>
<script src="{{ asset('homepage_assets/org/js/christmas.js') }}"></script>
<script src="{{ asset('homepage_assets/org/js/romantic.js') }}"></script>
</body>
</html>

