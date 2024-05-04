<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\UpcomingProgramAttendance;
use App\Models\UpcomingPrograms;
use App\Models\Services;
use App\Models\Blog;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Works;
use App\Helpers\helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    public function adminIndex()
    {


        $all_blogs = Blog::count();
        $total_admin = Admin::count();
        $total_testimonial = Testimonial::count();
        $total_team_member = TeamMember::count();
        $total_services = Services::count();
        $total_works = Works::count();
        $total_upcoming_programs = UpcomingPrograms::count();
        $total_upcoming_program_attendance = UpcomingProgramAttendance::where('status','complete')->count();
        $program_attendance_recent_registration = UpcomingProgramAttendance::orderBy('id','desc')->take(5)->get();


        return view('backend.admin-home')->with([
            'blog_count' => $all_blogs,
            'total_admin' => $total_admin,
            'total_works' => $total_works,
            'total_services' => $total_services,
            'total_upcoming_program_attendance' => $total_upcoming_program_attendance,
            'program_attendance_recent_registration' => $program_attendance_recent_registration,
            'total_upcoming_programs' => $total_upcoming_programs,
        ]);
    }

    public function admin_settings()
    {
        return view('auth.admin.settings');
    }

    public function admin_profile_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'username' => 'required|string|max:191',
            'image' => 'nullable|string|max:191'
        ]);
        Admin::find(Auth::user()->id)->update(['name' => $request->name, 'email' => $request->email, 'username' => str_replace(' ', '_', $request->username), 'image' => $request->image]);

        return redirect()->back()->with(['msg' => __('Profile Update Success'), 'type' => 'success']);
    }

    public function admin_password_chagne(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = Admin::findOrFail(Auth::id());

        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('admin.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }

        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with(['msg' => __('You Logged Out !!'), 'type' => 'danger']);
    }

    public function admin_profile()
    {
        return view('auth.admin.edit-profile');
    }

    public function admin_password()
    {
        return view('auth.admin.change-password');
    }


    // public function admin_set_static_option(Request $request)
    // {
    //     $this->validate($request,[
    //        'static_option' => 'required|string',
    //        'static_option_value' => 'required|string',
    //     ]);
    //     set_static_option($request->static_option,$request->static_option_value);
    //     return 'ok';
    // }

    // public function admin_get_static_option(Request $request)
    // {
    //     $this->validate($request,[
    //         'static_option' => 'required|string'
    //     ]);
    //     $data = get_static_option($request->static_option);
    //     return response()->json($data);
    // }

    // public function admin_update_static_option(Request $request)
    // {
    //     $this->validate($request,[
    //         'static_option' => 'required|string',
    //         'static_option_value' => 'required|string',
    //     ]);
    //     update_static_option($request->static_option,$request->static_option_value);
    //     return 'ok';
    // }

}


