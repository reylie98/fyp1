@extends('layouts.adminlayout.admindesign')
@section('content')
<div id="content">
<div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Live Chat</a> </div>
</div>
<div id='app'>
<main-app></main-app>
</div>
@yield('js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection