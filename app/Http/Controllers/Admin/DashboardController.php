<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Leave;

use App\Present;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $current_time = \Carbon\Carbon::now()->toDateString();
        $present = Auth::user()->presents()->latest()->first();
        return view('admin.dashboard',compact('current_time','present'));
    }

    /**
     * Leave List of all user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $leaves = Leave::where('status','')->latest()->get();
        return view('admin.leave.list',compact('leaves'));
    }

    /**
     * Delete Leave List of a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
//          $leave = Leave::findOrFail($id);
    }

    /**
     * Present of admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function present()
    {
        $currant_date=Carbon::now()->toDateString();
        if ($currant_date > '09:00:00'){
            $attendance = "1";
        }
        else{
            $attendance = "0";
        }

        $user_id = Auth::user()->id;


        $present = new Present();
        $present->user_id = $user_id;
        $present->attendance =$attendance;
        $present->save();
        Toastr::success('Attendance is submitted successfully!','success');
        return redirect()->back();

    }


}
