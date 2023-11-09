<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;


use App\Models\Image;
use App\Models\Doctor;
use Nette\Utils\Random;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\Certification;
use PhpParser\Node\Stmt\Return_;

use App\Mail\DoctorApprovalEmail;
use function Laravel\Prompts\select;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class DoctorController extends Controller
{


    // method to insert doctors by super admin

    public function insertdoctor(Request $request)
    {

        $request->validate([


            'doc_name' => 'required|string|max:255',
            'email' => 'required|Email|unique:doctors',
            'specialty' => 'required|string|max:255',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:Male,Female',
            'age' => 'required|integer|min:1',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'adress' => 'required',

            'doc_description' => 'nullable|string|max:1000'

        ]);

        $file = $request->file('profile_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'public/uploads' . $fileName;

        Storage::disk('public')->put($filePath, file_get_contents($file));
        $departmentId = $request->input('dept_id');

        $pass = rand(8, 12);

        $doctor_data = Doctor::insert([
            'Name' => $request->input('doc_name'),
            'Email' => $request->input('email'),
            'Department' => $request->input('specialty'),
            'Profile_picture' => $fileName,
            'Phone' => $request->input('phone'),
            'Gender' => $request->input('gender'),
            'Age' => $request->input('age'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'Department' => $request->input('specialty'),
            'adress' => $request->input('adress'),
            'Password' => Hash::make($pass),
            'Description' => $request->input('doc_description'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($doctor_data) {
            return back()->with('success', 'Doctor added successfully!');
        } else {
            return back()->with('error', 'enter valid data');
        }
    }

    // method to show all the doctors

    public function ShowDoctors()
    {

        $get_doc = Doctor::all();
        $department = Department::select('Name')->get();


        return view('admin/all_doctors', [
            'doc_data' => $get_doc,
            'dept' => $department
        ]);
    }

    // method to delete doctor from by super admin

    public function delete_doctor(string $id)
    {

        $dlt_doc = Doctor::where('Doctor_id', $id)->delete();
        return back();

        //    return view('delete_doctor',['dlt_doc'=>$dlt_doc]);

    }

    // method to update page of doctor

    public function update_page(string $id)
    {

        $update_page = Doctor::select('Doctor_id', 'Name', 'Email', 'Phone', 'Profile_picture', 'Gender', 'Age', 'city', 'state', 'country', 'adress', 'Description')->where('Doctor_id', $id)->first();



        return view('admin.update_doctor', ['up_page' => $update_page]);
    }

    // method to update_doctor

    public function update_doctor(string $id)
    {
        $updated_data = [
            'Name' => request('doc_name'),
            'Email' => request('email'),
            'Dept_id' => request('specialty'),
            'Profile_picture' => request('profile_picture'),
            'Phone' => request('phone_no'),
            'Gender' => request('gender'),
            'Age' => request('age'),
            'Description' => request('doc_description'),
        ];

        Doctor::where('Doctor_id', $id)->update($updated_data);

        return redirect()->route('alldoctors');
    }

    // method to target recent doctors on super admin dashboard

    public function RecentDoctors()
    {
        $today = Carbon::now()->toDateString();
        $recentDoctors = Doctor::orderBy('created_at', 'desc')
            ->get();


        $alldoctorscount = Doctor::count();

        $newdoctorscount = Doctor::where('created_at', '>=', now()->subDays(4))
            ->count();
        $todaysAppointmentsCount = Appointment::whereDate('Date', $today)->count();
        $totalAppointmentsCount = Appointment::count();


        return view('admin.super_admin_dashboard', [
            'recentDoctors' => $recentDoctors,
            'all_doc_count' => $alldoctorscount,
            'new_doc_count' => $newdoctorscount,
            'todaysappointments' => $todaysAppointmentsCount,
            'totalappointments' => $totalAppointmentsCount
        ]);
    }

    // method to register doctor

    public function reg_doctor(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'phone' => 'required|unique:doctors',
            'email' => 'required|email|unique:doctors',
            'password' => ['required', Password::min(8)],
            'gender' => 'required',
            'age' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adress' => 'required',
            // 'tags' => 'required',
            'doc_description' => 'required'
        ]);

        $file = $req->file('profile');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'public/uploads' . $fileName;

        Storage::disk('public')->put($filePath, file_get_contents($file));
        $departmentId = $req->input('dept_id');

        try {

            Doctor::create([
                // $authUser= session()->get("AuthUser"),
                // $departmentId = $authUser->dept_id,
                'Name' => $req->input('name'),
                'Phone' => $req->input('phone'),
                'Email' => trim($req->input('email')),
                'password' => Hash::make($req->input('password')),
                'Gender' => $req->input('gender'),
                'Age' => $req->input('age'),
                'city' => $req->input('city'),
                'state' => $req->input('state'),
                'country' => $req->input('country'),
                'adress' => $req->input('adress'),
                'Profile_picture' => $fileName,
                'dept_id' => $departmentId,
                'tags' => $req->input('tags'),
                'Description' => $req->input('doc_description')


            ]);

            return redirect()->route('doctor_dashboard_home')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error while registering. Please try again.' . $e->getMessage()])->withInput();
        }
    }
    public function get_dept()
    {
        $getdept = Department::all();
        return view('doctor_dashboard.doctor_signup.register_doctor', ['departments' => $getdept]);
    }
    // method for login by doctor

    public function login(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Authentication
        $email = trim($request->input('email'));
        $password = $request->input('password');

        $user = Doctor::where('Email', "=", $email)->first();
        $super_admin = User::where('email', '=', $email)->first();

        if ($user && Hash::check($password, $user->Password)) {

            session(['AuthUser' => $user]);
            session(['AuthUserType' => "doctor"]);


            return redirect()->route('dashboard');
        } elseif ($super_admin && Hash::check($password,  $super_admin->password)) {

            session(['AuthUser' => $super_admin]);
            session(['AuthUserType' => "admin"]);


            return redirect()->route('recent_doctors');
        } else {
            // If authentication fails, redirect back with an error message
            return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput();
        }
    }


    // method for search on super admin dashboard

    public function search(Request $req)
    {
        $query = $req->input('search');
        $search_type = $req->input('search_type');

        if ($search_type == 'departments') {
            $result = Department::where('Name', 'like', '%' . $query . '%')->get();
            // return dd($result);
            return view('admin.search_result', [
                'results' => $result,
                'search_type' => $search_type
            ]);
        } elseif ($search_type == 'doctors') {
            $result = Doctor::where('Name', 'like', '%' . $query . '%')->get();
            // return dd($result);
            return view('admin.search_result', [
                'results' => $result,
                'search_type' => $search_type
            ]);
        } else {
            return back()->with('error', 'invalid search');
        }
    }

    //    method to show the details of doctor

    public function showDoctorDetails($id)
    {

        $doctor = Doctor::select('Doctor_id', 'Name', 'Phone', 'Age', 'Gender', 'Description','Profile_picture')
            ->where('Doctor_id', $id)
            ->first();

        $certification = Certification::
            where('Doctor_id', $id)
            ->get();

        $dept = Department::select('Name')->where('Dept_id', $id)->first();


        return view('admin/show_doctor_detail', [
            'doctor' => $doctor, 
            'department' => $dept,
            'certification' => $certification
        ]);
    }

    // method to approve doctor

    public function approveDoctor($id)
    {
        $doctor = Doctor::where("Doctor_id", $id)->update(['status' => 'accepted']);

        // Mail::to($doctor->Email)->send(new DoctorApprovalEmail($doctor, 'approved'));

        // Redirect or return a response
        return redirect()->back()->with('success', 'Doctor approved successfully!');
    }

    // method to reject doctor

    public function rejectDoctor($id)
    {
        // Logic for rejecting the doctor (update status to 'rejected')
        $doctor = Doctor::where('Doctor_id', $id)->update(['status' => 'rejected']);;
        // $doctor->status = 'rejected';
        // $doctor->save();

        // Send rejection email
        // Mail::to($doctor->email)->send(new DoctorApprovalEmail($doctor, 'rejected'));

        // Redirect or return a response

        return redirect()->back()->with('success', 'Doctor rejected successfully!');
    }


    public function welcome()
    {
        $doctors = Doctor::where("status", "accepted")->limit(3)->get();
        return view('welcome', compact('doctors'));
    }

    public function loadMore(Request $request)
    {
        $offset = $request->get('offset', 0);
        $limit = 3; // Number of doctors to load at a time

        // Fetch more doctors using query builder
        $doctors = Doctor::with('department')->skip($offset)->take($limit)->get()->paginate(8);

        return view('load-more-doctors', compact('doctors'));
    }

    public function show_details_doc(string $id)
    {

        $show_details = Doctor::where('Doctor_id', $id)->first();
        $show_dept = Department::select('Dept_id', 'Name')->where('Dept_id', $id)->first();
        // Fetch availability data for the specific doctor
        $availabilityData = Availability::where('Doctor_id', $id)->get();




        return view('details', [
            'doctor_detail' => $show_details,
            'show_dept' => $show_dept,
            'availabilityData' => $availabilityData
        ]);
    }


    public function showAllDoctors()
    {
        // Fetch doctors and their corresponding departments from the database
        $doctors = Doctor::where("status", "accepted")->get();

        return view('allappointments', ['doctors' => $doctors]);
    }

    public function searchDoctors(Request $request)
    {
        $searchQuery = $request->input('search');

        $doctors = Doctor::where('Name', 'like', "%{$searchQuery}%")
            ->orWhere('Description', 'like', "%{$searchQuery}%")
            ->orWhereHas('department', function ($query) use ($searchQuery) {
                $query->where('dept_id', 'like', "%{$searchQuery}%");
            })
            ->get();

        return view('search_landing', compact('doctors'));
    }

    public function logoutx()
    {
        unset($_SESSION["AuthUser"]);
        unset($_SESSION["AuthUserType"]);

        session()->remove("AuthUser");
        session()->remove("AuthUserType");
        return redirect()->route('login_page'); // Redirect to the login page after logout
    }


    public function showProfileForm()
    {
        $user = session()->get("AuthUser");
        $doctor = Doctor::where("Doctor_id", $user->Doctor_id)->first();
        $departments = Department::select('Name')->get();

        return view('doctor_dashboard/profile', [
            'doctor' => $doctor,
            'departments' => $departments
        ]);
    }

    public function updateProfile(Request $request)


    {
        $doctor = Doctor::find(auth()->user()->Doctor_id);



        $doctor->Name = $request->input('name');
        $doctor->Email = $request->input('email');
        $doctor->Specialization = $request->input('specialization');
        $doctor->Phone = $request->input('phone');
        $doctor->Dept_id = $request->input('dept_id');

        // Handle profile picture if provided
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $doctor->Profile_picture = $profilePicturePath;
        }

        $doctor->save();

        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully!');
    }



    // code to all doctors langing page

    public function all_doc_page()
    {
        $doc = Doctor::select('Name', 'Description')->with('department')->join('doctors', 'Doctor_id_id', '=', '.Doctor_id')->get();
        return view('allappointments', ['doctors' => $doc]);
    }
}
