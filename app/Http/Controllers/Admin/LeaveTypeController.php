<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LeaveType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LeaveType::all();
        return view('admin.leaveType.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.leaveType.create');
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
            'leave_type'=>'required'
        ]);

        $data = new LeaveType();
        $data->leave_type = $request->leave_type;
        $data->save();
        Toastr::success('Leave Type created successfully!','success');
        return redirect()->route('home');
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
        $data = LeaveType::findOrFail($id);
        return view('admin.leaveType.edit',compact('data'));

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
        $data= LeaveType::find($id);
        $data->leave_type = $request->leave_type ;
        $data->save();

        Toastr::success('Leave Type updated successfully', 'success');
        return redirect()->route('admin.leaveType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "ok";
        return $id;
       return $data= LeaveType::find($id);
        $data->delete();
        Toastr::success('Data deleted successfully!', 'success');
        return redirect()->route('admin.leaveType.index');
    }
}
