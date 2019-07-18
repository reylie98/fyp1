<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/backendcss/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/select2.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss//matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/matrix-media.css')}}" />
<link href="{{ asset('css/backendcss/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/backendcss/jquery.gritter.css')}}" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>



@include('layouts.cslayout.csheader')

@include('layouts.cslayout.cssidebar')

@yield('content')
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
@include('layouts.cslayout.csfooter')

@yield('js')
<script src="{{ asset('js/BackendJS/jquery.min.js') }}"></script> 
<!-- <script src="{{ asset('js/BackendJS/jquery.ui.custom.js') }}"></script>  -->
<script src="{{ asset('js/BackendJS/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/BackendJS/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/BackendJS/select2.min.js') }}"></script> 
<script src="{{ asset('js/BackendJS/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/BackendJS/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/BackendJS/matrix.js')}}"></script> 
<script src="{{ asset('js/BackendJS/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/BackendJS/matrix.tables.js') }}"></script>
<script src="{{ asset('js/BackendJS/matrix.popover.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script>
  $( function() {
    $( "#Expiry" ).datepicker({minDate: 0, dateFormat: 'yy-mm-dd'});
  } );
</script>
@if(auth()->check())
  <script>
    var authuser = @JSON(auth()->user())
  </script>
@endif


</body>
</html>
