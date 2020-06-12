<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Present;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $present = Present::where('user_id',3)->get();
        return view('user.dashboard',compact('present'));
    }

    /**
     * Present of admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function present()
    {
        $currant_date= \Illuminate\Support\Carbon::now()->toDateString();
        if ($currant_date <  '09:00:00'){
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
