<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Application;
use App\assessmentInvitation;
use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\interviewInvitation;
use App\Notifications\SendAppointmentLetter;
use App\Rating;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
//use Intervention\Image\Facades\Image;

class AssessmentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Employee list for interview invitation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function employees()
    {
        $employees = User::where('role_id',3)->get();
        return view('superadmin.invitation.employees',compact('employees'));

    }

    public function interviwer($id){
        $departments = Department::all();
        $user = User::findOrFail($id);
        return view('superadmin.invitation.assessmentInvite',compact('user','departments'));
    }


    /**
     * Store invitation for interview.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function invitation(Request $request)
    {
        $this->validate($request,[
            'designation'=>'required',
            'department'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);

        $data = new assessmentInvitation();
        $data->user_id = $request->user_id;
        $data->designation = $request->designation;
        $data->department = $request->department;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        Toastr::success('Invitation send successfully!','success');
        return redirect()->route('superadmin.assessment.employees');

    }
    /**
     * Show all of the applications.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function applications(){
        $applications = Application::where('status',1)->get();
        return view('superadmin.invitation.applications',compact('applications'));
    }

    public function applicant($id){
        $application = Application::findOrFail($id);
        $user = User::findOrFail($application->user_id);
        $departments = Department::all();
        return view('superadmin.invitation.interviewInvite',compact('application','user','departments'));
    }

    public function applicantInvitation(Request $request)
    {
        $this->validate($request,[
            'designation'=>'required',
            'department'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);

        $data = new interviewInvitation();
        $data->user_id = $request->user_id;
        $data->designation = $request->designation;
        $data->department = $request->department;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        Toastr::success('Invitation send successfully!','success');
        return redirect()->route('superadmin.assessment.applications');

    }
    public function result(){
        $result = Rating::all();
        return view('superadmin.assessment.result',compact('result'));
    }

    public function appointmentLetter($id){
        $rating = Rating::findOrFail($id);
        $application = Application::findOrFail($rating->application_id);
        $applicant  = User::findOrFail($application->user_id);
        return view('superadmin.assessment.appointmentLetter',compact('applicant','application'));
    }

    public function sendAppointmentLetter(Request $request){
        $application_id = $request->application_id;
        $user_id = $request->user_id;
        $application = Application::findOrFail($application_id);
        $applicant = User::findOrFail($user_id);
        $date = $request->date;

        $application->user->notify(new SendAppointmentLetter($application,$date));
        Toastr::success('Appointment Letter has been sent successfully!');
        return redirect()->route('superadmin.assessment.result');
    }

    public function createUser(){
        $department = Department::all();
        $designation = Designation::all();
        return view('superadmin.assessment.createUser',compact('designation','department'));
    }

    public function registerUser(Request $request){
        $this->validate($request,[
            'designations'=>'required',
            'departments'=>'required',
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
//            'image'=>'required',
        ]);
//
//        $image = $request->file('image');
//        $slug = str::slug($request->name);
//
//        if (isset($image)) {
//
//            $currant_date = Carbon::now()->toDateString();
//            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//
//            //==========Check and set Image Directory==================
//
//            if (!Storage::disk('public')->exists('Profile')) {
//
//                Storage::disk('public')->makeDirectory('Profile');
//
//            }
//            //==========Make new image ==================
//
//            $imageSize=Image::make($image)->resize(1600,1066)->save($image->getClientOriginalExtension());
//
//            Storage::disk('public')->put('Profile/'.$image_name,$imageSize);
//
//        }else {
//
//            $image_name= "default.png";
//        }


        $user =new User();
        $designation_id = implode(',',$request->designations);
        $department_id = implode(',',$request->departments);
        $user->designation    = $designation_id;
        $user->department     = $department_id;
        $user->name= $request->name;
        $user->email =$request->email;
        $user->password = Hash::make($request->password);
        $user->image = "default.png";
        $user->role_id = 3;
        $user->save();
        Toastr::success('New user created successfully', 'success');
        return redirect()->route('superadmin.dashboard');
    }
}
