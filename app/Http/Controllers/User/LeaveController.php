<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Leave;
use App\LeaveType;
use Brian2694\Toastr\Facades\Toastr;
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
        $leaves = Leave::where('emp_name','User')->latest()->get();
        return view('user.leave.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = LeaveType::all();
        return view('user.leave.create',compact('data'));
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
        if ($user_id = 3){
            $leave->for="admin";
        }
        $leave->save();
        Toastr::success('Application submitted successfully', 'success');
        return redirect()->route('user.leave.index');
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
}
