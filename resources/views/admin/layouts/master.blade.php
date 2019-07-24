<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>



    <link href="{{asset('backend/dashboard/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link href="{{asset('backend/dashboard/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('backend/dashboard/demo/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/dashboard/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/dashboard/css/admin_style.css')}}">
    <link rel="text/css" href="{{asset('backend/dashboard/css/datatables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>






    @stack('css')
</head>
<body>
<div id="app">
    <div class="wrapper ">
        @if(Request::is('admin*'))
            @include('admin.partials.sidebar')
        @endif
        <div class="main-panel">

            @yield('content')

        </div>
    </div>

</div>
<!--   Core JS Files   -->
<script src="{{asset('backend/dashboard/js/core/jquery.min.js')}}"></script>
<script src="{{asset('backend/dashboard/js/core/popper.min.js')}}"></script>
<script src="{{asset('backend/dashboard/js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('backend/dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{ asset('backend/dashboard/js/jquery-3.2.1.slim.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/js/popper.min.js') }}" ></script>
<script src="{{ asset('backend/dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>




<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('backend/dashboard/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
@stack('scripts')
</body>
</html>
