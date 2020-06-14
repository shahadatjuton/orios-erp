@extends('layouts.backend.master')

@section('title','Dashboard')

@push ('css')

@endpush


@section('content')

    <div class="row clearfix">
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
                                                     To apply <a href="{{route('applicant.application.show',$circular->id)}}" class="btn btn-primary">Click Here</a>

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

@endsection


@push ('js')

@endpush
