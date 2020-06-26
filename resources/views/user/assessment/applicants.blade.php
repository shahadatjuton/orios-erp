@extends('layouts.backend.master')

@section('title', 'Applicants')

@push('css')

<style>
    .active-cyan-2 input[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #4dd0e1;
        box-shadow: 0 1px 0 0 #4dd0e1;
    }
</style>
@endpush


@section('content')

    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <!-- Top Search Area -->
            <div class="top-search-area">
                <form action="{{route('search.applicant')}}" method="GET">
                    <input type="search" class="form-control-sm  w-75" name="keyword" value="{{ old('keyword') }}" placeholder="Search Applicant">
                    <button type="submit" class="btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Selected Applicants
                        <span class="badge bg-blue">{{ $applicants->count() }}</span>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            @foreach($applicants as $key=> $applicant)
                                @php
                                    $user = \App\User::find($applicant->user_id);
                                    $department = \App\Department::find($applicant->department);
                                @endphp

                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{$applicant->designation}}</td>
                                    <td>{{$department->name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="btn btn-info waves-effect" href="{{route('user.assessment.show', $applicant->id)}}">
                                            <i class="material-icons">Go To Assess </i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->

@endsection

@push('js')


@endpush
