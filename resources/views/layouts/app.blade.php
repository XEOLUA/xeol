<!-- Price box minimal--><!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>{{ config('app.name', 'XEOL') }} | @yield('title','XEOL')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--    <link rel="icon" href="images/favicon.ico" type="image/x-icon">--}}

    <link rel="icon" href="{{url('images/favicon.ico?v=2')}}" type={{url("image/x-icon")}}>
    <link rel="stylesheet" type="text/css" href={{url("//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900")}}>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" href={{url("css/fonts.css")}}>
    <link rel="stylesheet" href={{url("css/style.css")}}>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>

<main role="main">
    @yield('content')
</main>

<div class="snackbars" id="form-output-global"></div>
<script src="{{url('js/core.min.js')}}"></script>
<script src="{{url('js/script.js')}}"></script>
</body>
</html>
