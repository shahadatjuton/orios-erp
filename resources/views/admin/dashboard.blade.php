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

    <h1>WELCOME TO ORIOS</h1>
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
                        <p>Give Your Attendance here!  <a class="btn btn-success" href="{{route('admin.present')}}">Present</a></p>

                    </div>
                </div>
            </div>
        </div>





        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push ('js')

@endpush
