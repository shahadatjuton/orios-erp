@extends('layouts.backend.master')

@section('title', 'Leave-Application')

@push('css')


@endpush


@section('content')

<div>

    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Invite {{$user->name}} for interview
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('superadmin.assessment.applicantInvitation')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="hidden"  class="form-control" name="user_id" value="{{$user->id}}">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="">Select Designation</label>
                            <div class="form-line {{ $errors->has('data') ? 'focused error' : '' }}">
                                <select name="designation" class="form-control show-tick" data-live-searche="true" >
                                    @foreach($designations as $designation)
                                        <option value="{{$designation->id}}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="">Select Department</label>
                            <div class="form-line {{ $errors->has('data') ? 'focused error' : '' }}">
                                <select name="department" class="form-control show-tick" data-live-searche="true" >
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="hidden"  class="form-control" name="application_id">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="">Select Date</label>
                            <div class="form-line">
                                <input type="date"  class="form-control" name="date" placeholder="{{old('date')}}">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="">Select Time</label>
                            <div class="form-line">
                                <input type="time"  class="form-control" name="time" placeholder="{{old('time')}}">
                            </div>
                        </div>
                        <a class="btn btn-dark m-t-15 waves-effect" href="{{route('superadmin.assessment.employees')}}"> Back</a>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->
</div>

@endsection


@push('js')


@endpush
