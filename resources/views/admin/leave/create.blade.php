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
                        Submit Your Application For Leave
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.leave.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <label for="">Select Leave Type</label>
                            <div class="form-line {{ $errors->has('data') ? 'focused error' : '' }}">
                                <select name="leave_type[]" class="form-control show-tick" data-live-searche="true" multiple>
                                    @foreach($data as $data)
                                        <option value="{{$data->id}}">{{ $data->leave_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group form-float">
                            <label for="">From Date</label>
                            <div class="form-line">
                                <input type="date"  class="form-control" name="str_date" placeholder="{{old('str_date')}}">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="">To Date</label>
                            <div class="form-line">
                                <input type="date"  class="form-control" name="end_date" placeholder="{{old('end_date')}}">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="">Reason For Leave</label>
                            <div class="body">
                                <textarea id="tinymce" name="reason" rows="6" cols="48"></textarea>
                            </div>
                        </div>
                        <a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.leaveType.index')}}"> Back</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
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
