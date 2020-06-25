@extends('layouts.backend.master')

@section('title','Dashboard')

@push ('css')
    <style>
        ul li {
            list-style: none;
        }
    </style>
@endpush


@section('content')

    <h1 class="text-center">WELCOME TO ORIOS</h1>


    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <ul class="list">
                                <h4>**New Job Circular** </h4>

                                @forelse($circulars as $circular)
                                    <li class="mt-4">
                                     <span>Post <b>{{$circular->designation->name}}</b>
                                     Vacancy = <b>{{$circular->vacancy}}</b>
                                     Deadline <b>{{$circular->deadline->toDateString()}}</b>
                                     To apply <a href="{{route('applicant.application.show',$circular->id)}}" class="btn btn-primary">Click Here</a>
                                    </li>
                                @empty
                                    <div>
                                        <h2>There is no data available!</h2>
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push ('js')

@endpush
