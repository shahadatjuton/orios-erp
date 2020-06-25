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
                                <th>Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            @foreach($applications as $key=> $application)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{$application->emp_name}}</td>
                                    <td>{{$application->str_date->format('Y-m-d')}}</td>
                                    <td>{{$application->end_date->format('Y-m-d')}}</td>
                                    <td>{{Str::limit($application->reason, 20)}}</td>
                                    <td>
                                      <p class="bg-success">Accepted</p>
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
