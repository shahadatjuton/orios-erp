@extends('layouts.backend.master')

@section('title','Dashboard')

@push ('css')
    <style>
        ul li{
            list-style: none;
        }
        .attendance{
            font-size: 20px;
        }
        .new-users{
            margin-top: 100px;
        }
    </style>
@endpush


@section('content')


    <h1 class="text-center">WELCOME TO ORIOS</h1>
    <div class="container-fluid">
        <br><br>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="list">
                                    <li>
                                        Name:
                                    </li>
                                    <li>
                                        E-mail:
                                    </li>
                                    <li>
                                        Joining Date:
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul>
                                    <li>
                                        {{Auth::user()->name}}
                                    </li>
                                    <li>
                                        {{Auth::user()->email}}
                                    </li>
                                    <li>
                                        {{Auth::user()->created_at->diffForhumans()}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--            Right Card --}}
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header text-center" >
                        Hello!! <b>{{Auth::user()->name}}</b>
                    </div>
                    <div class="body" style="margin: 10px;">
                        @if($current_time == $present->created_at->toDateString())
                                @if($present->attendance == 1)
                                <p>You are <span class="attendance">Present</span> today!</p>
                                @else($present->attendance == 0)
                                <p>You are <span class="attendance">Absent</span> today!</p>
                                @endif
                        @else
                            <p> Give Your Attendance here!
                            <a class="btn btn-success" href="{{route('user.present')}}">Present</a>
                            </p>
                        @endif

                    </div>

                </div>
            </div>
        </div>


{{--  ===========New  users && Vacancy===============      --}}

        <br><br>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <h2 class="text-center bg-info">**New Job Vacancy**</h2>
                        <div class="row">
                            @foreach($vacancy as $vacancy)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                                    <a href="{{route('superadmin.jobCircular.show', $vacancy->id)}}"><p><b>{{$vacancy->designation->name}}</b></p></a>
                                    <p>{{$vacancy->department->name}}</p>
                                </div>
                            @endforeach
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--            Right Card --}}
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h2 class="text-center bg-info">New Faces</h2>
                <div class="row clearfix">
                    @foreach($user as $user)
                        @php
                            $designation = \App\Designation::findOrFail($user->designation);
                           $department = \App\Department::findOrFail($user->department);

                        @endphp
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header text-center" >
                                    <img src="{{asset('storage/Profile/'.$user->image)}}" alt="{{$user->name}}"  class="img-fluid" style="height: 70px; width: 80px;">
                                </div>
                                <div class="body text-center" style="margin: 10px;">
                                    <h4>{{$user->name}}</h4>
                                    <p>{{$designation->name}}</p>
                                    <p>{{$department->name}}</p>
                                    {{--                                <ul>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        {{$user->name}}--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        {{$designation->name}}--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        {{$department->name}}--}}
                                    {{--                                    </li>--}}
                                    {{--                                </ul>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    </div>
                </div>
            </div>




            <!-- Vertical Layout | With Floating Label -->

        </div>

{{--    @elseif($leave->status==false)--}}


        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push ('js')

@endpush
