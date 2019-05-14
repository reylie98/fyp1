<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/backendcss/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/select2.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss//matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/matrix-media.css')}}" />
<link href="{{asset('Fonts/Backendfonts/css/font-awesome.css" rel="stylesheet')}}" />
<link rel="stylesheet" href="{{asset('css/backendcss/jquery.gritter.css')}}" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layouts.adminlayout.adminheader')

@include('layouts.adminlayout.adminsidebar')

@yield('content')

@include('layouts.adminlayout.adminfooter')


<script src="{{ asset('js/BackendJS/jquery.min.js') }}"></script> 
<script src="{{ asset('js/BackendJS/jquery.ui.custom.js') }}"></script> 
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
</body>
</html>