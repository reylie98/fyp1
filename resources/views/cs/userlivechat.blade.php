@extends('layouts.frontlayout.frontdesign')
@section('content')

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <div id='app'>
        <main-app></main-app>
    </div>
    <br/>
@yield('script')
<script src="{{ asset('js/app.js') }}" defer></script>



@endsection