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
                    <div class="header">
                        <h2>Create a new user account</h2>
                    </div>
                    <div class="body">
                        <form action="{{route('superadmin.registerUser')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group form-float">
                                <label><b>Enter Name</b></label>
                                <div class="form-line">
                                    <input type="text"  class="form-control" name="name" placeholder="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label><b>Enter E-mail</b></label>
                                <div class="form-line">
                                    <input type="text"  class="form-control" name="email" placeholder="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label><b>Enter Password</b></label>
                                <div class="form-line">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label><b>Enter Confirm Password</b></label>
                                <div class="form-line">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label><b>Select Designation</b></label>
                                <div class="form-line {{ $errors->has('designation') ? 'focused error' : '' }}">
                                    <select name="designations[]" class="form-control show-tick" data-live-searche="true" >
                                        @foreach($designation as $designation)
                                            <option value="{{$designation->id}}">{{ $designation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label><b>Select Department</b></label>
                                <div class="form-line {{ $errors->has('department') ? 'focused error' : '' }}">
                                    <select name="departments[]" class="form-control show-tick" data-live-searche="true" >
                                        @foreach($department as $department)
                                            <option value="{{$department->id}}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label><b>Select Role</b></label>
                                <div class="form-line {{ $errors->has('role') ? 'focused error' : '' }}">
                                    <select name="roles[]" class="form-control show-tick" data-live-searche="true" >
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
{{--                            <div class="form-group form-float">--}}
{{--                                <label><b>Upload Image</b></label>--}}
{{--                                <div class="form-line">--}}
{{--                                    <input type="file"  class="form-control" name="image" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-success m-t-15 waves-effect">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection


@push ('js')

@endpush
