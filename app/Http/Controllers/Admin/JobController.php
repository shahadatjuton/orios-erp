<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\Job;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('admin.staffing.cv',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Department::all();
        $designation = Designation::all();
        return view('admin.staffing.job',compact('data','designation'));
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
            'designations'=>'required',
            'departments'=>'required',
            'circular'=>'required',
            'deadline'=>'required',
            'experience'=>'required',
            'vacancy'=>'required',
            'description'=>'required',
        ]);

        $job =new Job();
        $designation_id = implode(',',$request->designations);
        $department_id = implode(',',$request->departments);
        $job->designation_id    = $designation_id;
        $job->department_id     = $department_id;
        $job->experience =$request->experience;
        $job->vacancy =$request->vacancy;
        $job->circular =$request->circular;
        $job->deadline =$request->deadline;
        $job->description =$request->description;
        $job->save();
        Toastr::success('Job Requisition created successfully', 'success');
        return redirect()->route('admin.dashboard');
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
