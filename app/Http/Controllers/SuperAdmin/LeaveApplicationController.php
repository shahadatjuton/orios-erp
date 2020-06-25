<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Application;
use App\Http\Controllers\Controller;
use App\Job;
use App\Leave;
use App\LeaveType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Leave::where('for','superadmin')->get();
        return view('superadmin.leaveApplication',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = LeaveType::all();
        return view('superadmin.leave.create',compact('data'));
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
            'leave_type'=>'required',
            'str_date'=>'required',
            'end_date'=>'required',
            'reason'=>'required',
        ]);
        $user_id =Auth::user()->id;
        $leave =new Leave();
        $leave->leave_type_id = implode(',',$request->leave_type);
        $leave->user_id = $user_id;
        $leave->emp_name = Auth::user()->name;
        $leave->str_date = $request->str_date;
        $leave->end_date = $request->end_date;
        $leave->reason = $request->reason;
        $leave->status = 1;
        if ($user_id = 2){
            $leave->for="own";
        }
        $leave->save();
        Toastr::success('Application submitted successfully', 'success');
        return redirect()->route('superadmin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::findOrFail($id);
        return view('superadmin.leaveShow',compact('leave'));
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

        $leave = Leave::findOrFail($id);
        $leave->status = 1;
        $leave->save();
        Toastr::success('Application is accepted successfully!!','Success');
        return redirect()->back();
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

    public function reject(Request $request, $id)
    {
        $application = Leave::find($id);
        $application->status = 2;
        $application->save();
        return redirect()->back();
    }

    public function ownApplication(){

         $applications = Leave::where('for','own')->get();
        return view('superadmin.leave.ownApplication',compact('applications'));
    }

}
