<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Job;
use App\Present;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = User::latest()->first();
        $vacancy = Job::latest()->where('status',true)->first();
        $current_time = Carbon::now()->toDateString();
        $present = Auth::user()->presents()->latest()->first();
        return view('superadmin.dashboard',compact('current_time','present','user','vacancy'));
    }

    public function present()
    {
        $currant_date= \Illuminate\Support\Carbon::now()->toDateString();
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
