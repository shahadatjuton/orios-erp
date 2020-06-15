<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Application;
use App\assessmentInvitation;
use App\Department;
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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Employee list for interview invitation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function employees()
    {
        $employees = User::where('role_id',3)->get();
        return view('superadmin.invitation.employees',compact('employees'));

    }

    public function interviwer($id){
        $departments = Department::all();
        $user = User::findOrFail($id);
        return view('superadmin.invitation.assessmentInvite',compact('user','departments'));
    }


    /**
     * Store invitation for interview.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invitation(Request $request)
    {
        $this->validate($request,[
            'designation'=>'required',
            'department'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);

        $data = new assessmentInvitation();
        $data->user_id = $request->user_id;
        $data->designation = $request->designation;
        $data->department = $request->department;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        Toastr::success('Invitation send successfully!','success');
        return redirect()->route('superadmin.assessment.employees');

    }
    /**
     * Show all of the applications.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function applications(){
        $applications = Application::where('status',1)->get();
        return view('superadmin.invitation.applications',compact('applications'));
    }

    public function applicant($id){
        $application = Application::findOrFail($id);
        $user = User::findOrFail($application->user_id);
        $departments = Department::all();
        return view('superadmin.invitation.interviewInvite',compact('application','user','departments'));
    }

    public function applicantInvitation(Request $request)
    {
        $this->validate($request,[
            'designation'=>'required',
            'department'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);

        $data = new interviewInvitation();
        $data->user_id = $request->user_id;
        $data->designation = $request->designation;
        $data->department = $request->department;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        Toastr::success('Invitation send successfully!','success');
        return redirect()->route('superadmin.assessment.applications');

    }
    public function result(){
        $result = Rating::all();
        return view('superadmin.assessment.result',compact('result'));
    }
}
