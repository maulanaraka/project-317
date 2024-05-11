<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function __construct(){
       $this->DBadmin = DB::table('admin');
    }

    // Dashboard Admin
    // Auth
    public function dashboard()
    {
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        return view('Admin.dashboard');
    }
 // Profile Admin
    // Auth
    public function profile()
    {
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        $dataProfile = Admin::where('id', session()->get('id_user'))->first();
        return view('Admin.Profile.profile', compact('dataProfile'));
    }
 // Form Update Profile Admin
    // Auth
    public function formUpdateProfile($id)
    {
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        if (session()->get('id_user') == $id) {
            $dataProfile = Admin::where('id', session()->get('id_user'))->first();
            return view('Admin.Profile.formUpdateProfile', compact('dataProfile'));
        } else {
            return redirect('/4dm1n/dashboard');
        }
    }
 // Action Update Profile Admin
    // Auth
    public function updateProfile(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
            'passwordVerify' => 'required|min:3|max:255',
        ]);
        $checkEmail = Admin::where('username', session()->get('username'))->first();
        // Pengecekan Email
        if ($checkEmail->email == $validation['email']) {
            $emailVerify = $checkEmail->email;
        } else {
            // Mengecek email yang dirubah
            $checkEmail = Admin::where('email', $validation['email'])->first();
            if ($checkEmail) {
                return redirect('/4dm1n/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Email already exists!');
            } else {
                $emailVerify = $validation['email'];
            }
        }
        // end

        // Pengecekan Password
        if ($validation['password'] == $validation['passwordVerify']) {
            // Update Data
           Admin::where('id', session()->get('id_user'))->update([
                'email' => $emailVerify,
                'username' => $validation['username'],
                'password' => bcrypt($validation['password']),
            ]);
            // Ubah session username
            session()->put('username', $validation['username']);
            return redirect('/4dm1n/profile' );
        } else {
            return redirect('/4dm1n/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Password does not match!');
        }
    }

// ========================================================================================================
// Event
// Event Menampilkan semua data
    public function getAllEvent(){

        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        $allEvent = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')
        ->select('event.*', 'category.category_name')
        ->get();

        if($allEvent){
            return view('Admin.Event.event', [
                'allEvent' => $allEvent
            ]);
        }

    }
    
// Hapus Event Admin 
    public function deleteEvent(Request $request){
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        Storage::delete('public/event/'.$request->mediaHidden);
        $eventDeleted = Event::where('id', $request->id)->delete();
        if ($eventDeleted) {
            return redirect('/4dm1n/event')->with('success', 'Event was deleted successfully!');
        }else{
            return redirect('/4dm1n/event')->with('error', 'Event was not deleted!');
        }
    }

// Approval Event Admin

    public function approvalEvent(Request $request){
        
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        
        $eventUpdated = Event::where('id', $request->id)->update([
            'event_is_approve' => 1,
            'event_approved_date' => now()->format('Y-m-d'),
            'admin_id' => session()->get('id_user')
        ]);
        if ($eventUpdated) {
            return redirect('/4dm1n/event')->with('success', 'Event was updated successfully!');
        } else {
            return redirect('/4dm1n/event')->with('error', 'Event was not updated!');
        }
    }

}