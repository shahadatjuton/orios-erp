@extends('layouts.backend.master')

@section('title', 'Job-Requisition')

@push('css')


@endpush


@section('content')

        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Create a job vacancy
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.job.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group form-float">
                                    <label for="">Designation</label>
                                    <div class="form-line">
                                        <input type="text"  class="form-control" name="designation" placeholder="{{old('designation')}}">
                                    </div>
                                </div>
                            <div class="form-group form-float">
                                <label for="">Select Department</label>
                                <div class="form-line {{ $errors->has('data') ? 'focused error' : '' }}">
                                    <select name="departments[]" class="form-control show-tick" data-live-searche="true" multiple>
                                        @foreach($data as $data)
                                            <option value="{{$data->id}}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="">Year of Experiance</label>
                                <div class="form-line">
                                    <input type="number"  class="form-control" name="experience" placeholder="{{old('experiance')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="">Vacancy Number</label>
                                <div class="form-line">
                                    <input type="number"  class="form-control" name="vacancy" placeholder="{{old('vacancy')}}">
                                </div>
                            </div>
                                <div class="form-group form-float">
                                    <label for="">Circulation Date</label>
                                    <div class="form-line">
                                        <input type="date"  class="form-control" name="circular" placeholder="{{old('circular')}}">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label for="">Deadline</label>
                                    <div class="form-line">
                                        <input type="date"  class="form-control" name="deadline" placeholder="{{old('deadline')}}">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label for="">Job Description / Responsibilities</label>
                                    <div class="body">
                                        <textarea id="tinymce" name="description" rows="6" cols="95"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success m-t-15 waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->

@endsection


@push('js')


@endpush
