<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('css/frontendcss/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontendcss/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontendcss/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontendcss/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontendcss/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontendcss/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontendcss/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/Frontendimages/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/Frontendimages/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/Frontendimages/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/Frontendimages/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/Frontendimages/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
    @include('layouts.frontlayout.frontheader')
	
    @yield('content')
	
    @include('layouts.frontlayout.frontfooter')
	

  
    <script src="{{asset('js/FrontendJS/jquery.js')}}"></script>
	<script src="{{asset('js/FrontendJS/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/FrontendJS/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/FrontendJS/price-range.js')}}"></script>
    <script src="{{asset('js/FrontendJS/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/FrontendJS/main.js')}}"></script>
</body>
</html>