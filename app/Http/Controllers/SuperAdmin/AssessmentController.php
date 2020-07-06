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
use App\Role;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $user_id = Auth::user()->id;
        $data = assessmentInvitation::where('user_id',$user_id)->count();


        if($data == 1){

            $applicants = interviewInvitation::all();
//      return  $user = User::findOrFail($applicants->user_id);
            return view('superadmin.assessment.applicants',compact('applicants'));
        }
        else{
            Toastr::warning('You are not invited for assessment','**Warning**');
            return redirect()->back();
        }
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
        $this->validate($request,[
            'appearance'=>'required',
            'body_language'=>'required',
            'job_knowledge'=>'required',
            'experience'=>'required',
            'literacy'=>'required',
            'communication_skill'=>'required',
            'action'=>'required',
            'remark'=>'required',
            'written_mark'=>'required',
            'salary'=>'required',
            'expected_joining_date'=>'required',
            'proposed_joining_date'=>'required',
        ]);

        $total= $request->appearance + $request->body_language + $request->job_knowledge +
            $request->experience + $request->literacy +$request->communication_skill;
        $user = User::findOrFail($request->user_id);
        $rating = new Rating();

        $rating->name= $user->name;
        $rating->application_id=$request->applicant_id;
        $rating->designation =$request->designation;
        $rating->department =$request->department;
        $rating->appearence =$request->appearance;
        $rating->body_language =$request->body_language;
        $rating->job_knowledge =$request->job_knowledge;
        $rating->experience =$request->experience;
        $rating->literacy =$request->literacy;
        $rating->communication_skill =$request->communication_skill;
        $rating->total =$total;

        $rating->action = $request->action;
        $rating->remark = $request->remark;
        $rating->written_mark = $request->written_mark;
        $rating->salary = $request->salary;
        $rating->expected_joining_date = $request->expected_joining_date;
        $rating->proposed_joining_date = $request->proposed_joining_date;
        $rating->save();
        Toastr::success('The ratings submitted successfully!','success');
        return redirect()->route('superadmin.assessment.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = interviewInvitation::findOrFail($id);
        $user_id = $applicant->user_id;
        $user= User::findOrFail($user_id);
        return view('superadmin.assessment.assessment',compact('user','applicant'));

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
        $employees = User::where('role_id', 1 )->orWhere('role_id',2)->get();
        return view('superadmin.invitation.employees',compact('employees'));
    }

    public function interviwer($id){
        $departments = Department::all();
        $designations = Designation::all();
        $user = User::findOrFail($id);
        return view('superadmin.invitation.assessmentInvite',compact('user','departments','designations'));
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
        $designation = Designation::findOrFail($request->designation);
        $department = Department::findOrFail($request->department);
        $data = new assessmentInvitation();
        $data->user_id = $request->user_id;
        $data->designation = $designation->name;
        $data->department = $department->name;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        Toastr::success('Invitation sent successfully!','success');
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
        $designations = Designation::all();
        return view('superadmin.invitation.interviewInvite',compact('application','user','departments','designations'));
    }

    public function applicantInvitation(Request $request)
    {
        $this->validate($request,[
            'designation'=>'required',
            'department'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);
        $designation = Designation::findOrFail($request->designation);
        $department = Department::findOrFail($request->department);
        $data = new interviewInvitation();
        $data->user_id = $request->user_id;
        $data->designation = $designation->name;
        $data->department = $department->name;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->save();
        Toastr::success('Invitation sent successfully!','success');
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
        $roles = Role::where('name', '!=', 'Applicant')->get();
        return view('superadmin.assessment.createUser',compact('designation','department','roles'));
    }

    public function registerUser(Request $request){
        $this->validate($request,[
            'designations'=>'required',
            'departments'=>'required',
            'roles'=>'required',
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
//            'image'=>'required',
        ]);
//
        $image = $request->file('image');
        $slug = str::slug($request->name);

        if (isset($image)) {

            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //==========Check and set Image Directory==================


            if (!Storage::disk('public')->exists('Profile')) {

                Storage::disk('public')->makeDirectory('Profile');

            }
            //==========Make new image ==================

//            $imageSize=Image::make($image)->resize(1600,1066)->save($image->getClientOriginalExtension());
//            $image_size =  $image->getSize();
//            Storage::disk('public')->put('Profile/'.$image_name, $image_size);
            $destinationPath = 'storage/Profile/';
            $image->move($destinationPath, $image_name);

        }else {

            $image_name= "default.png";
        }


        $user =new User();
        $designation_id = implode(',',$request->designations);
        $department_id = implode(',',$request->departments);

        $role_id = implode(',',$request->roles);
        $user->designation    = $designation_id;
        $user->department     = $department_id;
        $user->name= $request->name;
        $user->email =$request->email;
        $user->password = Hash::make($request->password);
        $user->image = $image_name;
        $user->role_id = $role_id;
        $user->save();
        Toastr::success('New user created successfully', 'success');
        return redirect()->route('superadmin.dashboard');
    }
}
