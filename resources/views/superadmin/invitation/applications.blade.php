@extends('layouts.backend.master')

@section('title', 'Employees')

@push('css')


@endpush


@section('content')


    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Total Applications
                        <span class="badge bg-blue">{{ $applications->count() }}</span>
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
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            @foreach($applications as $key=> $application)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{$application->designation}}</td>
                                    <td>{{$application->department}}</td>
                                    <td>{{$application->name}}</td>
                                    <td>{{$application->email}}</td>
                                    <td>
                                        @if($application->status == 1)
                                            Accepted
                                        @elseif($application->status == 2)
                                            Rejected
                                        @else
                                            Pending
                                        @endif
                                    </td>
                                    <td>
{{--                                        <a class="btn btn-info waves-effect" href="{{route('superadmin.application.show', $application->id)}}">--}}
{{--                                            <i class="material-icons">visibility </i>--}}
{{--                                        </a>--}}
                                        <a class="btn btn-info waves-effect" href="{{route('superadmin.assessment.applicant', $application->id)}}">
                                            <i class="material-icons">Invite Applicant </i>
                                        </a>
                                        <a class="btn btn-info waves-effect" href="mailto:{{$application->email}}">
                                            <i class="fas fa-mail-bulk"></i>
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
