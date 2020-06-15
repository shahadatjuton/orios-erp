<?php

namespace App\Http\Controllers\User;

use App\Application;
use App\Http\Controllers\Controller;
use App\interviewInvitation;
use App\Rating;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = interviewInvitation::all();
//      return  $user = User::findOrFail($applicants->user_id);
        return view('user.assessment.applicants',compact('applicants'));
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
        ]);

        $total= $request->appearance + $request->body_language + $request->job_knowledge +
                $request->experience + $request->literacy +$request->communication_skill;
        $user = User::findOrFail($request->user_id);
        $rating = new Rating();

        $rating->name= $user->name;
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
        $rating->save();
        Toastr::success('The ratings submitted successfully!','success');
        return redirect()->route('user.assessment.index');

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
        return view('user.assessment.assessment',compact('user','applicant'));

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
