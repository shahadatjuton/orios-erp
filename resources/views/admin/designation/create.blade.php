@extends('layouts.backend.master')

@section('title', 'Designation')

@push('css')


@endpush


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center"><h2>  Add Designation</h2></div>

                <div class="card-body">
                    <form action="{{route('admin.designation.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>
                            <div class="col-md-6">
                                <input type="text"  class="form-control" name="name" placeholder="{{old('name')}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-dark m-t-15 waves-effect" href="{{route('admin.designation.index')}}"> Back</a>
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
{{--    <div class="row clearfix">--}}
{{--        <div class="col-lg-2 col-md-2">--}}
{{--        </div>--}}
{{--        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
{{--            <div class="card">--}}
{{--                <div class="header">--}}
{{--                    <h2>--}}
{{--                        Add Designation--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--                <div class="body">--}}
{{--                    <form action="{{route('admin.designation.store')}}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group form-float">--}}
{{--                            <div class="form-line">--}}
{{--                                <input type="text"  class="form-control" name="name" placeholder="{{old('name')}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a class="btn btn-primary m-t-15 waves-effect" href="{{route('admin.designation.index')}}"> Back</a>--}}
{{--                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Submit</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Vertical Layout | With Floating Label -->


@endsection


@push('js')


@endpush
