@extends('layouts.backend.master')

@section('title', 'Job-Requisition')

@push('css')


@endpush


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h2>Create a job requisition</h2></div>
                <div class="card-body">
                    <form action="{{route('admin.job.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Designation') }}</label>
                            <div class="col-md-6">
                                <select name="designations[]" class="form-control show-tick" data-live-searche="true" >
                                    @foreach($designation as $designation)
                                        <option value="{{$designation->id}}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Department') }}</label>
                            <div class="col-md-6">
                                <select name="departments[]" class="form-control show-tick" data-live-searche="true" >
                                    @foreach($data as $data)
                                        <option value="{{$data->id}}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Year of experience') }}</label>
                            <div class="col-md-6">
                                <input type="number"  class="form-control" name="experience" placeholder="{{old('experiance')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Vacancy Number') }}</label>
                            <div class="col-md-6">
                                <input type="number"  class="form-control" name="vacancy" placeholder="{{old('vacancy')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Circulation Date') }}</label>
                            <div class="col-md-6">
                                <input type="date"  class="form-control" name="circular" placeholder="{{old('circular')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>
                            <div class="col-md-6">
                                <input type="date"  class="form-control" name="deadline" placeholder="{{old('deadline')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Job Description / Responsibilities') }}</label>
                            <div class="col-md-6">
                                <div class="body">
                                    <textarea id="tinymce" name="description" rows="6" cols="52"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Vertical Layout | With Floating Label -->
{{--        <div class="row clearfix">--}}
{{--            <div class="col-lg-2 col-md-2">--}}
{{--            </div>--}}
{{--            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="header">--}}
{{--                        <h2>--}}
{{--                            Create a job requisition--}}
{{--                        </h2>--}}
{{--                    </div>--}}
{{--                    <div class="body">--}}
{{--                        <form action="{{route('admin.job.store')}}" method="post" enctype="multipart/form-data">--}}
{{--                            @csrf--}}


{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Select Designation</label>--}}
{{--                                <div class="form-line {{ $errors->has('designation') ? 'focused error' : '' }}">--}}
{{--                                    <select name="designations[]" class="form-control show-tick" data-live-searche="true" >--}}
{{--                                        @foreach($designation as $designation)--}}
{{--                                            <option value="{{$designation->id}}">{{ $designation->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Select Department</label>--}}
{{--                                <div class="form-line {{ $errors->has('data') ? 'focused error' : '' }}">--}}
{{--                                    <select name="departments[]" class="form-control show-tick" data-live-searche="true" >--}}
{{--                                        @foreach($data as $data)--}}
{{--                                            <option value="{{$data->id}}">{{ $data->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Year of Experiance</label>--}}
{{--                                <div class="form-line">--}}
{{--                                    <input type="number"  class="form-control" name="experience" placeholder="{{old('experiance')}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Vacancy Number</label>--}}
{{--                                <div class="form-line">--}}
{{--                                    <input type="number"  class="form-control" name="vacancy" placeholder="{{old('vacancy')}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Circulation Date</label>--}}
{{--                                <div class="form-line">--}}
{{--                                    <input type="date"  class="form-control" name="circular" placeholder="{{old('circular')}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Deadline</label>--}}
{{--                                <div class="form-line">--}}
{{--                                    <input type="date"  class="form-control" name="deadline" placeholder="{{old('deadline')}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group form-float">--}}
{{--                                <label for="">Job Description / Responsibilities</label>--}}
{{--                                <div class="body">--}}
{{--                                    <textarea id="tinymce" name="description" rows="6" cols="47"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-success m-t-15 waves-effect">Submit</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Vertical Layout | With Floating Label -->

@endsection


@push('js')


@endpush
