<?php

namespace App\Http\Controllers\Admin;

use App\assessmentInvitation;
use App\Http\Controllers\Controller;
use App\interviewInvitation;
use App\Rating;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = assessmentInvitation::where('user_id',$user_id)->count();

        if($data == 1){

              $applicants = interviewInvitation::where('is_marked',false)->get();
//      return  $user = User::findOrFail($applicants->user_id);
            return view('admin.assessment.applicants',compact('applicants'));
        }
        else{
            Toastr::warning('You are not invited for assessment','**Warning**');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'appearance'=>'required',
            'body_language'=>'required',
            'job_knowledge'=>'required',
            'experience'=>'required',
            'literacy'=>'required',
            'communication_skill'=>'required',
            'action'=>'required',
            'remark'=>'required',
            'written_mark'=>'required',
            'salary'=>'required',
            'expected_joining_date'=>'required',
            'proposed_joining_date'=>'required',
        ]);

        $interview_invitation = interviewInvitation::findOrFail($request->applicant_id);
        $interview_invitation->is_marked = true;
        $interview_invitation->save();


        $total= $request->appearance + $request->body_language + $request->job_knowledge +
            $request->experience + $request->literacy +$request->communication_skill;
        $user = User::findOrFail($request->user_id);
        $rating = new Rating();

        $rating->user_id= $user->id;
        $rating->application_id=$request->applicant_id;
        $rating->designation =$request->designation;
        $rating->department =$request->department;
        $rating->appearence =$request->appearance;
        $rating->body_language =$request->body_language;
        $rating->job_knowledge =$request->job_knowledge;
        $rating->experience =$request->experience;
        $rating->literacy =$request->literacy;
        $rating->communication_skill =$request->communication_skill;
        $rating->total =$total;

        $rating->action = $request->action;
        $rating->remark = $request->remark;
        $rating->written_mark = $request->written_mark;
        $rating->salary = $request->salary;
        $rating->expected_joining_date = $request->expected_joining_date;
        $rating->proposed_joining_date = $request->proposed_joining_date;
        $rating->save();
        Toastr::success('The ratings submitted successfully!','success');
        return redirect()->route('admin.assessment.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = interviewInvitation::findOrFail($id);
        $user_id = $applicant->user_id;
        $user= User::findOrFail($user_id);
        return view('admin.assessment.assessment',compact('user','applicant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
