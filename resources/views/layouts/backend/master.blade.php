<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name', 'ORIOS') }}</title>

{{--    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">--}}

{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/all.min.css')}}">
    <!-- Toaster css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <link  href="{{ asset('assets/backend/css/toastr.min.css')}}" rel="stylesheet" />
    @stack('css')

</head>
<body>
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.backend.partial.sidebar')

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

@include('layouts.backend.partial.navbar')

        @yield('content')
    </div>
</div>
<!-- sweetalert2 Js -->
<script src="{{ asset('assets/backend/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/js/popper.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/js/all.min.js')}}"></script>
<script src="{{asset('assets/backend/js/main.js')}}"></script>
<script src="{{ asset('assets/backend/js/toastr.min.js')}}"></script>
{!! Toastr::message() !!}
@stack('js')
</body>
</html>
