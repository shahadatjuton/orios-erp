@extends('layouts.backend.master')

@section('title','Dashboard')

@push ('css')
    <style>
        ul li{
            list-style: none;
        }
    </style>
@endpush


@section('content')

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
                                <p class="text-center">You are <span class="attendance">Present</span> today!</p>
                            @else($present->attendance == 0)
                                <p class="text-center">You are <span class="attendance">Absent</span> today!</p>
                            @endif
                        @else
                            <p> Give Your Attendance here!
                                <a class="btn btn-success" href="{{route('superadmin.present')}}">Present</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>



        <br><br>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <h2 class="text-center bg-info">**New Job Vacancy**</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="list">
                                    <li>
                                        Designation:
                                    </li>
                                    <li>
                                        Department:
                                    </li>
                                    <li>
                                        No of Vacancy:
                                    </li>
                                    <li>
                                        Deadline:
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul>
                                    <li>
                                        {{$vacancy->designation->name}}
                                    </li>
                                    <li>
                                        {{$vacancy->department->name}}
                                    </li>
                                    <li>
                                        {{$vacancy->vacancy}}
                                    </li>
                                    <li>
                                        {{$vacancy->deadline->diffForHumans()}}
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
                        <img src="{{asset('storage/Profile/'.$user->image)}}" alt="{{$user->name}}"  class="img-fluid" style="height: 70px; width: 80px;">
                    </div>
                    <div class="body" style="margin: 10px;">
                        <ul>
                            <li>
                                Name: {{$user->name}}
                            </li>
                            <li>
                                Designation: {{$vacancy->department->name}}
                            </li>
                            <li>
                                Department: {{$vacancy->vacancy}}
                            </li>
                            <li>
                                Joining Date: {{$vacancy->deadline->diffForHumans()}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push ('js')

@endpush
