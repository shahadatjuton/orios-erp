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


{{--  ===========New two users ===============      --}}
        <div class="new-users">
            <div class="row clearfix">
                @forelse($user as $user)
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header text-center" >
                            {{$user->name}}
                        </div>
                        <div class="body" style="margin: 10px;">
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                    @empty
                        <div class="bg-info">
                            <h2>There is no user registered yet!</h2>
                        </div>
                </div>
                @endforelse
{{--                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="header text-center" >--}}
{{--                            Hello!! <b>{{Auth::user()->name}}</b>--}}
{{--                        </div>--}}
{{--                        <div class="body" style="margin: 10px;">--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>

{{--    @elseif($leave->status==false)--}}


        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push ('js')

@endpush
