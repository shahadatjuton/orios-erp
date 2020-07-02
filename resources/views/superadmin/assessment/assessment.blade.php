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
                                        {{$applicant->department}}
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
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>
                                    Poor <br> 1
                                </th>
                                <th>
                                    Fair <br> 2
                                </th>
                                <th>
                                    Average <br> 3
                                </th>
                                <th>
                                    Good <br> 4
                                </th>
                                <th>
                                    Excellent <br> 5
                                </th>
                            </tr>
                            </thead>
                        </table>
                        <form action="{{route('superadmin.assessment.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                            <input type="hidden" name="designation" value="{{$applicant->designation}}">
                            <input type="hidden" name="department" value="{{$applicant->department}}">
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
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Written Marks (Out Of 50)</b></label>
                                <div >
                                    <input type="text"  class="form-control" name="written_mark" placeholder="{{old('written_mark')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Action</b></label>
                                <div class="body">
                                    <input type="radio" name="action" value="1">
                                    <label for="1">Select</label><br>
                                    <input type="radio" name="action" value="2">
                                    <label for="2">Reject</label><br>
                                    <input type="radio" name="action" value="3">
                                    <label for="3">Hold</label><br>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Remark</b></label>
                                <div >
                                    <textarea id="" name="remark" rows="6" cols="60"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Salary</b></label>
                                <div >
                                    <input type="text"  class="form-control" name="salary" placeholder="{{old('salary')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Expected Joining Date</b></label>
                                <div >
                                    <input type="date"  class="form-control" name="expected_joining_date" placeholder="{{old('expected_joining_date')}}">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for=""style="font-size: 25px"><b>Proposed Joining Date</b></label>
                                <div >
                                    <input type="date"  class="form-control" name="proposed_joining_date" placeholder="{{old('proposed_joining_date')}}">
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
