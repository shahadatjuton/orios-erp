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
    /**/
        .radio {
            display: flex;
        }

        .radio-inline {
            flex: 1 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }



    </style>
@endpush


@section('content')
    <div class="container-fluid">
        <h2 class="text-center">Applicant's Information</h2>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
{{--===================**Form left - - Ratings**==============================================--}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body">
                                        <form action="{{route('superadmin.assessment.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                                            <input type="hidden" name="designation" value="{{$applicant->designation}}">
                                            <input type="hidden" name="department" value="{{$applicant->department}}">
                                            <input type="hidden" name="user_id" value="{{$user->id}}">

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
                                            <div class="form-group form-float ">
                                                <label for=""><b>Appearance</b></label>
                                                <div class="body radio">
                                                    <label for="1" class="radio-inline">
                                                        <input type="radio" name="appearance" value="1">Poor
                                                    </label><br>
                                                    <label for="2" class="radio-inline">
                                                        <input type="radio" name="appearance" value="2">Fair
                                                    </label><br>
                                                    <label for="3" class="radio-inline">
                                                        <input type="radio" name="appearance" value="3">Average
                                                    </label><br>
                                                    <label for="4" class="radio-inline">
                                                        <input type="radio" name="appearance" value="4">Good
                                                    </label><br>
                                                    <label for="5" class="radio-inline">
                                                        <input type="radio" name="appearance" value="5">Excellent
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for=""><b>Eye contact & Body Language</b></label>
                                                <div class="body radio">
                                                    <label for="1" class="radio-inline">
                                                        <input type="radio" name="body_language" value="1">Poor
                                                    </label><br>
                                                    <label for="2" class="radio-inline">
                                                        <input type="radio" name="body_language" value="2">Fair
                                                    </label><br>
                                                    <label for="3" class="radio-inline">
                                                        <input type="radio" name="body_language" value="3">Average
                                                    </label><br>
                                                    <label for="4" class="radio-inline">
                                                        <input type="radio" name="body_language" value="4">Good
                                                    </label><br>
                                                    <label for="5" class="radio-inline">
                                                        <input type="radio" name="body_language" value="5">Excellent
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for=""><b>Job Knowledge</b></label>
                                                <div class="body radio">
                                                    <label for="1" class="radio-inline">
                                                        <input type="radio" name="job_knowledge" value="1">Poor
                                                    </label><br>
                                                    <label for="2" class="radio-inline">
                                                        <input type="radio" name="job_knowledge" value="2">Fair
                                                    </label><br>
                                                    <label for="3" class="radio-inline">
                                                        <input type="radio" name="job_knowledge" value="3">Average
                                                    </label><br>
                                                    <label for="4" class="radio-inline">
                                                        <input type="radio" name="job_knowledge" value="4">Good
                                                    </label><br>
                                                    <label for="5" class="radio-inline">
                                                        <input type="radio" name="job_knowledge" value="5">Excellent
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for=""><b>Related Experience</b></label>
                                                <div class="body radio">
                                                    <label for="1" class="radio-inline">
                                                        <input type="radio" name="experience" value="1">Poor
                                                    </label><br>
                                                    <label for="2" class="radio-inline">
                                                        <input type="radio" name="experience" value="2">Fair
                                                    </label><br>
                                                    <label for="3" class="radio-inline">
                                                        <input type="radio" name="experience" value="3">Average
                                                    </label><br>
                                                    <label for="4" class="radio-inline">
                                                        <input type="radio" name="experience" value="4">Good
                                                    </label><br>
                                                    <label for="5" class="radio-inline">
                                                        <input type="radio" name="experience" value="5">Excellent
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for=""><b>IT Literacy</b></label>
                                                <div class="body radio">
                                                    <label for="1" class="radio-inline">
                                                        <input type="radio" name="literacy" value="1">Poor
                                                    </label><br>
                                                    <label for="2" class="radio-inline">
                                                        <input type="radio" name="literacy" value="2">Fair
                                                    </label><br>
                                                    <label for="3" class="radio-inline">
                                                        <input type="radio" name="literacy" value="3">Average
                                                    </label><br>
                                                    <label for="4" class="radio-inline">
                                                        <input type="radio" name="literacy" value="4">Good
                                                    </label><br>
                                                    <label for="5" class="radio-inline">
                                                        <input type="radio" name="literacy" value="5">Excellent
                                                    </label><br>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <label for=""><b>Oral Communication Skill</b></label>
                                                <div class="body radio">
                                                    <label for="1" class="radio-inline">
                                                        <input type="radio" name="communication_skill" value="1">Poor
                                                    </label><br>
                                                    <label for="2" class="radio-inline">
                                                        <input type="radio" name="communication_skill" value="2">Fair
                                                    </label><br>
                                                    <label for="3" class="radio-inline">
                                                        <input type="radio" name="communication_skill" value="3">Average
                                                    </label><br>
                                                    <label for="4" class="radio-inline">
                                                        <input type="radio" name="communication_skill" value="4">Good
                                                    </label><br>
                                                    <label for="5" class="radio-inline">
                                                        <input type="radio" name="communication_skill" value="5">Excellent
                                                    </label><br>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="body" style="margin: 20px;">
                                        <div class="form-group">
                                            <label for=""><b>Written Marks (Out Of 50)</b></label>
                                            <div >
                                                <input type="text"  class="form-control" name="written_mark" placeholder="{{old('written_mark')}}">
                                            </div>
                                        </div>

                                        <div class=" form-float">
                                            <label for=""><b>Remark</b></label>
                                            <div >
                                                <textarea id="" name="remark" rows="6" cols="58"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label for=""><b>Salary</b></label>
                                            <div >
                                                <input type="text"  class="form-control" name="salary" placeholder="{{old('salary')}}">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label for=""><b>Expected Joining Date</b></label>
                                            <div >
                                                <input type="date"  class="form-control" name="expected_joining_date" placeholder="{{old('expected_joining_date')}}">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label for=""><b>Proposed Joining Date</b></label>
                                            <div >
                                                <input type="date"  class="form-control" name="proposed_joining_date" placeholder="{{old('proposed_joining_date')}}">
                                            </div>
                                        </div>

                                        <div class=" form-float">
                                            <label for=""><b>Action</b></label>
                                            <div class="body radio">
                                                <label for="1" class="radio-inline">
                                                    <input type="radio" name="experience" value="1">Select
                                                </label>
                                                <label for="2" class="radio-inline">
                                                    <input type="radio" name="experience" value="2">Reject
                                                </label>
                                                <label for="3" class="radio-inline">
                                                    <input type="radio" name="experience" value="3">Hold
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success m-t-15 waves-effect">
                                            Submit</button>
                                        </form>
                                    </div>
                                </div>
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
