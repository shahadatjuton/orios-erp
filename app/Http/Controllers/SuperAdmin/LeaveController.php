<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Present;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function attendanceReport(){

        $date = \Carbon\Carbon::now();
        $last_week = $date->subWeek();
        $lastMonth =  $date->subMonth();
// return Carbon::now()->year()->format('Y-m-d H:i:s.u');
        $user = Auth::user();
        $user_id = Auth::user()->id;

//        return $last_month_attendance = Present::whereDate('created_at',Carbon::now()->subWeek())->count();;
//            ->where('status','1')->get();

//        $last_week_attendance = Present::whereDate('created_at',Carbon::now()->subWeek())->count();
        $last_month_attendance = Auth::user()->presents()
            ->where('attendance','1')
          ->where('created_at',$lastMonth)->get();

        $total_attendance = Auth::user()->presents()
            ->where('attendance','1')->count();

        return view('user.leave.attendanceSheet',compact('total_attendance','user'));

    }
    public function attendanceSheet(){
       return "Not done yet!";
    }
}
