<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Leave;
use App\LeaveType;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
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
        $data = LeaveType::all();
        return view('admin.leave.create',compact('data'));
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
        $leave->leave_type_id =implode(',',$request->leave_type);
        $leave->emp_name= Auth::user()->name;
        $leave->str_date= $request->str_date;
        $leave->end_date=$request->end_date;
        $leave->reason=$request->reason;
        if ($user_id = 2){
            $leave->for="superadmin";
        }
        $leave->save();
        Toastr::success('Application submitted successfully', 'success');
        return redirect()->route('admin.leave.index');
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
        return view('admin.leave.show',compact('leave'));
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
     *  approve the  pending Applycation
     */
    public function approve($id)
    {
        return "okay";
       return $pendingleave=Leave::find($id);
        if($pendingleave->status == "")
        {
            $pendingleave->status=true;
            $pendingleave->save();

            toastr::success('The application is approved successfully','success');
        }else{
            Toastr::Info('The application is already approved','info');
        }
        return redirect()->back();
    }
    public function reject($id)
    {
        $pendingleave=Leave::find($id);

        if($pendingleave->status == "")
        {
            $pendingleave->status=false;
            $pendingleave->save();

            toastr::success('The application is rejected successfully','success');
        }else{
            Toastr::Info('The application is already approved','info');
        }
        return redirect()->back();
    }
}
