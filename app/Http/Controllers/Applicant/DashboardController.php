<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $circulars = Job::where('status',true)->get();
        return view('applicant.dashboard',compact('circulars'));
    }
    public function apply(){
//        return view('applicant.dashboard');
    }
}
