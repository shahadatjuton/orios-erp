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
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header text-center" >
                        <img src="{{asset('storage/Profile/'.$applicant->image)}}" alt="{{$applicant->name}}"  class="img-fluid" style="height: 70px; width: 80px;">
                    </div>
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
                                        Designation:
                                    </li>
                                    <li>
                                        Department:
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul>
                                    <li>
                                        {{$applicant->name}}
                                    </li>
                                    <li>
                                        {{$applicant->email}}
                                    </li>
                                    <li>
                                        {{$application->designation}}
                                    </li>
                                    <li>
                                        {{$application->department}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Vertical Layout | With Floating Label -->
    </div>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <form action="{{route('superadmin.sendAppointmentLetter')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group form-float">
                                <label><b>Select Date</b></label>
                                <div class="form-line">
                                    <input type="date"  class="form-control" name="date" placeholder="{{old('date')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden"  class="form-control" name="user_id" value="{{$applicant->id}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden"  class="form-control" name="application_id" value="{{$application->id}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection


@push ('js')

@endpush
