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
                        <span class="badge bg-blue">{{ $applicant->count() }}</span>
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

                            @foreach($applicant as $key=> $applicant)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{$applicant->designation}}</td>
                                    <td>{{$applicant->department}}</td>
                                    <td>{{$applicant->name}}</td>
                                    <td>{{$applicant->email}}</td>
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
