<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

            ul li{
                list-style: none;
            }


            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @if(Auth::user()->role->id ==1)
                        <a href="{{route('superadmin.dashboard')}}">Dashboard</a>
                        @elseif (Auth::user()->role->id == 2)
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                        @elseif (Auth::user()->role->id == 3)
                        <a href="{{route('user.dashboard')}}">Dashboard</a>
                        @elseif (Auth::user()->role->id == 4)
                        <a href="{{route('applicant.dashboard')}}">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="row clearfix">
                    <h1>To apply for job you need to register first.</h1>
                    <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <ul class="list">
                                            <h4>**New Job Circular** </h4>

                                        @forelse($circulars as $circular)
                                            <li>
                                                <span>Post <b>{{$circular->designation}}</b>
                                                    Vacancy = <b>{{$circular->vacancy}}</b>
                                                    Deadline <b>{{$circular->deadline->toDateString()}}</b>
                                                    @guest
                                                    To apply <a href="{{route('register')}}" class="btn btn-primary">Click Here</a>
                                                    @else
                                                    To apply <a href="{{route('applicant.apply')}}" class="btn btn-primary">Click Here</a></span>
                                                    @endguest
                                            </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
