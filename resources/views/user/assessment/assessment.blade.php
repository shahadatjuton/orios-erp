@extends('layouts.backend.master')

@section('title','Assessment')

@push ('css')
    <style>
        ul li{
            list-style: none;
        }
        form{
            margin: 20px;
        }

    </style>
@endpush


@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Applicant Information</h2>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="list">
                                    <li>
                                        Name:
                                    </li>
                                    <li>
                                        E-mail:
                                    </li>
                                    <li>
                                        Designation:
                                    </li>
                                    <li>
                                        Department:
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                @php
                                    $department = \App\Department::find($applicant->department);
                                @endphp
                                <ul>
                                    <li>
                                        {{$user->name}}
                                    </li>
                                    <li>
                                        {{$user->email}}
                                    </li>
                                    <li>
                                        {{$applicant->designation}}
                                    </li>
                                    <li>
                                        {{$department->name}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- ================== Assess the candidate based on Criteria =====================       --}}
       <h2 class="text-center" style="margin: 20px;">Assess the candidate based on Criteria</h2>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <form action="{{route('user.assessment.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                            <input type="hidden" name="designation" value="{{$applicant->designation}}">
                            <input type="hidden" name="department" value="{{$department->name}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">

                            <div class="form-group form-float">

                                <label for="" style="font-size: 25px"><b>Appearance</b></label>
                                <div class="body">
                                    <input type="radio" name="appearance" value="1">
                                    <label for="1">Poor</label><br>
                                    <input type="radio" name="appearance" value="2">
                                    <label for="2">Fair</label><br>
                                    <input type="radio" name="appearance" value="3">
                                    <label for="3">Average</label><br>
                                    <input type="radio" name="appearance" value="4">
                                    <label for="4">Good</label><br>
                                    <input type="radio" name="appearance" value="5">
                                    <label for="5">Excellent</label><br>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Eye contact & Body Language</b></label>
                                <div class="body">
                                    <input type="radio" id="1" name="body_language" value="1">
                                    <label for="1">Poor</label><br>
                                    <input type="radio" name="body_language" value="2">
                                    <label for="2">Fair</label><br>
                                    <input type="radio" name="body_language" value="3">
                                    <label for="3">Average</label><br>
                                    <input type="radio" name="body_language" value="4">
                                    <label for="4">Good</label><br>
                                    <input type="radio" name="body_language" value="5">
                                    <label for="5">Excellent</label><br>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Job Knowledge</b></label>
                                <div class="body">
                                    <input type="radio" name="job_knowledge" value="1">
                                    <label for="1">Poor</label><br>
                                    <input type="radio" name="job_knowledge" value="2">
                                    <label for="2">Fair</label><br>
                                    <input type="radio" name="job_knowledge" value="3">
                                    <label for="3">Average</label><br>
                                    <input type="radio" name="job_knowledge" value="4">
                                    <label for="4">Good</label><br>
                                    <input type="radio" name="job_knowledge" value="5">
                                    <label for="5">Excellent</label><br>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Related Experience</b></label>
                                <div class="body">
                                    <input type="radio" name="experience" value="1">
                                    <label for="1">Poor</label><br>
                                    <input type="radio" name="experience" value="2">
                                    <label for="2">Fair</label><br>
                                    <input type="radio" name="experience" value="3">
                                    <label for="3">Average</label><br>
                                    <input type="radio" name="experience" value="4">
                                    <label for="4">Good</label><br>
                                    <input type="radio" name="experience" value="5">
                                    <label for="5">Excellent</label><br>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>IT Literacy</b></label>
                                <div class="body">
                                    <input type="radio" name="literacy" value="1">
                                    <label for="1">Poor</label><br>
                                    <input type="radio" name="literacy" value="2">
                                    <label for="2">Fair</label><br>
                                    <input type="radio" name="literacy" value="3">
                                    <label for="3">Average</label><br>
                                    <input type="radio" name="literacy" value="4">
                                    <label for="4">Good</label><br>
                                    <input type="radio" name="literacy" value="5">
                                    <label for="5">Excellent</label><br>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Oral Communication Skill</b></label>
                                <div class="body">
                                    <input type="radio" name="communication_skill" value="1">
                                    <label for="1">Poor</label><br>
                                    <input type="radio" name="communication_skill" value="2">
                                    <label for="2">Fair</label><br>
                                    <input type="radio" name="communication_skill" value="3">
                                    <label for="3">Average</label><br>
                                    <input type="radio" name="communication_skill" value="4">
                                    <label for="4">Good</label><br>
                                    <input type="radio" name="communication_skill" value="5">
                                    <label for="5">Excellent</label><br>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success m-t-15 waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{--    @elseif($leave->status==false)--}}


        <!-- Vertical Layout | With Floating Label -->

    </div>

@endsection


@push ('js')

@endpush
