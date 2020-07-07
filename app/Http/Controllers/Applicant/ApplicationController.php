<?php

namespace App\Http\Controllers\Applicant;

use App\Application;
use App\Http\Controllers\Controller;
use App\Job;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApplicationController extends Controller
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
            'designation'=>'required',
            'description'=>'required',
            "cv" => "required|mimes:pdf|max:10000",
        ]);
//        $file = $request->file('cv');
//        $slug = str::slug(Auth::user()->name);
//        $destinationPath = 'uploads';
//        $file->move($destinationPath,$file->getClientOriginalName());

//        if (isset($file)) {
//
//            $currant_date=Carbon::now()->toDateString();
//            $file_name=$slug.'-'.$currant_date.'-'.uniqid().'.'.$file->getClientOriginalExtension();
//
//            //==========Check and set Image Directory==================
//            if (!Storage::disk('public')->exists('cv')) {
//
//                Storage::disk('public')->makeDirectory('cv');
//            }
//            Storage::putFile('public/cv/', $request->file('avatar'));
////            Storage::disk('public')->putFile('cv/'.$file_name);
//
//        }else {
//
//            $file_name="No File found";
//        }

        $file = $request->file('cv');
        $slug = str::slug(Auth::user()->name);
        $currant_date=Carbon::now()->toDateString();
        $file_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$file->getClientOriginalExtension();
        if (!Storage::disk('public')->exists('cv')) {

                Storage::disk('public')->makeDirectory('cv');
            }
        $destinationPath = 'storage/cv/';
        $file->move($destinationPath,$file_name);

        $application = new Application();
        $application->user_id = Auth::user()->id;
        $application->designation =$request->designation;
        $application->department= $request->department;
        $application->name = Auth::user()->name;
        $application->email=Auth::user()->email;
        $application->experience=$request->experience;
        $application->description=$request->description;
        $application->cv = $file_name;
        $application->save();

        Toastr::success('Application submitted successfully!','success');
        return redirect()->route('applicant.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        $user_id = Auth::user()->id;
        return view('applicant.application',compact('job'));
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
