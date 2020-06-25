@extends('layouts.backend.master')

@section('title', 'Job-Application')

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
                            Apply for the job
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('applicant.application.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group form-float">
                                <label for="">Designation</label>
                                <div class="form-line">
                                    <input type="text"  class="form-control" name="designation" value="{{$job->designation->name}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="">Department</label>
                                <div class="form-line">
                                    <input type="text"  class="form-control" name="department" value="{{$job->department->name}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="">Year of Experiance</label>
                                <div class="form-line">
                                    <input type="number"  class="form-control" name="experience" placeholder="{{old('experiance')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="">Describe Yourself</label>
                                <div class="body">
                                    <textarea id="tinymce" name="description" rows="6" cols="47"></textarea>
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
