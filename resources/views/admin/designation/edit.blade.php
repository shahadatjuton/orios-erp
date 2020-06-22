@extends('layouts.backend.master')

@section('title', 'Designation')

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
                        Update The Designation
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.designation.update',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text"  class="form-control" name="name" value="{{$data->name}}">
                            </div>
                        </div>
                        <a class="btn btn-primary m-t-15 waves-effect" href="{{route('admin.designation.index')}}"> Back</a>
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
