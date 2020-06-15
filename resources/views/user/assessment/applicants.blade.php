@extends('layouts.backend.master')

@section('title', 'Applicants')

@push('css')


@endpush


@section('content')


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
                                </tr>
                                @endforeach
                                </thead>
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
