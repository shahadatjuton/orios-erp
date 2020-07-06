<!doctype html>
<html lang="en">
<head>
    <title>ORIOS-ERP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

{{--    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700" rel="stylesheet">--}}

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/fontawesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

</head>
<body class="bg-light">

<body data-spy="scroll" data-target="#ftco-navbar-spy" data-offset="0">

<div class="site-wrap">

    <nav class="site-menu" id="ftco-navbar-spy">
        <div class="site-menu-inner" id="ftco-navbar">
            <ul class="list-unstyled">
                @if (Route::has('login'))
{{--                    <div class="top-right links">--}}
                        @auth
                            @if(Auth::user()->role->id ==1)
                                <li><a href="{{route('superadmin.dashboard')}}">Dashboard</a></li>
                            @elseif (Auth::user()->role->id == 2)
                                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            @elseif (Auth::user()->role->id == 3)
                                <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                            @elseif (Auth::user()->role->id == 4)
                                <li><a href="{{route('applicant.dashboard')}}">Dashboard</a></li>
                            @endif
                             <li>
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                             </li>

                        @else
                            <li><a href="{{route('login')}}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
{{--                    </div>--}}
                @endif
{{--                                                <li><a href="{{route('register')}}">Registration</a></li>--}}

            </ul>
        </div>
    </nav>

    <header class="site-header">
        <div class="row align-items-center">
            <div class="col-5 col-md-3">

            </div>
            <div class="col-2 col-md-6 text-center site-logo-wrap">
                <a href="index.html" class="site-logo">M</a>
            </div>
            <div class="col-5 col-md-3 text-right menu-burger-wrap">
                <a href="#" class="site-nav-toggle js-site-nav-toggle"><i></i></a>

            </div>
        </div>

    </header> <!-- site-header -->

    <div class="main-wrap " id="section-home">

        <div class="cover_1 overlay bg-light">
            <div class="img_bg" style="background-image: url({{asset('assets/frontend/images/slider.jpg')}});" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10" data-aos="fade-up">
                            <h2 class="heading mb-5">Welcome To <b>ORIOS</b></h2>
                            <p><a href="#find-job" class="smoothscroll btn btn-outline-white px-5 py-3">Find A Job</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .cover_1 -->


        <div class="section bg-light" id="find-job" data-aos="fade-up">
            <div class="container">
                <div class="row section-heading justify-content-center mb-5">
                    <div class="col-md-8 text-center">
                        <h2 class="heading mb-3">Find your suitable job</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @forelse($circulars as $circular)
                    <div class="col-md-8">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab">
                                <div class="d-block d-md-flex menu-food-item">
                                    <div class="text order-1 mb-3">
                                        <h3><a href="{{route('login')}}">{{$circular->designation->name}}</a></h3>
                                        <h3><a href="{{route('login')}}">{{$circular->department->name}}</a></h3>
                                    </div>
                                    <div class="price order-2">
                                        Deadline-<strong>{{$circular->deadline->format('y-m-d')}}</strong>
                                    </div>
                                </div> <!-- .menu-food-item -->
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-danger">
                        <h2>No data is available here!</h2>
                    </div>
                    @endforelse

                </div>
            </div>
        </div> <!-- .section -->


        <div class="section bg-white" data-aos="fade-up">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="heading mb-5">Meet The New Faces</h2>
                    </div>
                </div>
                <div class="row">
                    @forelse($user as $user)
                        @php
                            $designation = \App\Designation::findOrFail($user->designation);
                            $department = \App\Department::findOrFail($user->department);
                        @endphp
                    <div class="col-md-6 pr-md-5 text-center mb-5">
                        <div class="ftco-38">
                            <div class="ftco-38-img">
                                <div class="ftco-38-header">
                                    <img src="{{asset('storage/Profile/'.$user->image)}}" alt="Image">
                                    <h2 class="ftco-38-heading">{{$user->name}}</h2>
                                </div>
                                <div class="ftco-38-body">
                                    <p class="ftco-38-subheading">{{$designation->name}}</p>
                                    <p class="ftco-38-subheading">{{$department->name}}</p>
                                    <p>
                                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div>
                            <h2 class="bg-danger">There is no data available!</h2>
                        </div>
                    @endforelse
{{--                    <div class="col-md-6 pl-md-5 text-center mb-5">--}}
{{--                        <div class="ftco-38">--}}
{{--                            <div class="ftco-38-img">--}}
{{--                                <div class="ftco-38-header">--}}
{{--                                    <img src="{{asset('assets/frontend/images/chef_2.jpg')}}" alt="Image">--}}
{{--                                    <h3 class="ftco-38-heading">Nick Browning</h3>--}}
{{--                                    <p class="ftco-38-subheading">Master Chef</p>--}}
{{--                                </div>--}}
{{--                                <div class="ftco-38-body">--}}
{{--                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>--}}
{{--                                    <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. It is a paradisematic country.</p>--}}
{{--                                    <p>--}}
{{--                                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>--}}
{{--                                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>--}}
{{--                                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- <div class="col-md-4"></div> -->
                </div>
            </div>
        </div> <!-- .section -->


        <footer class="ftco-footer">
            <div class="container">

                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="footer-widget">
                            <h3 class="mb-4">About ORIOS</h3>
                            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. </p>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="footer-widget">
                            <h3 class="mb-4">Find A Job</h3>
                            <p>You can find a suitable job from here.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="mb-4">Follow Along</h3>
                            <ul class="list-unstyled social">
                                <li><a href="#"><span class="fa fa-tripadvisor"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="row pt-5">
                    <div class="col-md-12 text-center">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made by <b>Shammee</b>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff7a5c"/></svg></div>

    <script src="{{asset('assets/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.waypoints.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.stellar.min.js')}}"></script>

    <script src="{{asset('assets/frontend/js/jquery.easing.1.3.js')}}"></script>

    <script src="{{asset('assets/frontend/js/aos.js')}}"></script>


{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>--}}

    <script src="{{asset('assets/frontend/js/main.js')}}"></script>
</body>
</html>
