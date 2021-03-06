<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name', 'ORIOS') }}</title>

    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/all.min.css')}}">
    <!-- Toaster css -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css')}}">
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
{{--<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>--}}

<script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/backend/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/backend/js/popper.js')}}"></script>
<script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/js/all.min.js')}}"></script>
<script src="{{asset('assets/backend/js/main.js')}}"></script>
<script src="{{ asset('assets/backend/js/toastr.min.js')}}"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
@stack('js')
</body>
</html>
