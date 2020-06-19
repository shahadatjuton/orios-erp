<?php

namespace App\Http\Controllers;

use App\Application;
use App\interviewInvitation;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function applicantSearch(Request $request)
    {
        $query = $request->keyword;

        $applicant = Application::where('name','LIKE',"%$query%")
            ->orWhere('email','LIKE',"%$query%")->get();
        return view('applicantSearch',compact('applicant'));
    }


}
