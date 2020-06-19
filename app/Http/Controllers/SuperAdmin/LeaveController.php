<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function attendanceReport(){
        $user = Auth::user();
//        $last_week_attendance = Present::whereDate('created_at',Carbon::now()->subWeek())->count();
        $total_attendance = Auth::user()->presents()
            ->where('attendance','1')->count();

        return view('user.leave.attendanceSheet',compact('total_attendance','user'));

    }
    public function attendanceSheet(){
       return "Not done yet!";
    }
}
