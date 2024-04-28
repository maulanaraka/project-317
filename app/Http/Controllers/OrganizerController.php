<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
        // Dashboard Organizer
    // Auth
    public function dashboard()
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }
        return view('Organizer.dashboard');
    }
     // Profile Organizer
    // Auth
    public function profile()
    {
         if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $dataProfile = Organizer::where('id', session()->get('id_user'))->first();
        return view('Organizer.Profile.profile', compact('dataProfile'));
    }
     // Form Update Profile Organizer
    // Auth
    public function formUpdateProfile($id)
    {
         if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        if (session()->get('id_user') == $id) {
            $dataProfile = Organizer::where('id', session()->get('id_user'))->first();
            return view('Organizer.Profile.formUpdateProfile', compact('dataProfile'));
        } else {
            return redirect('/organizer/dashboard');
        }
    }
     // Action Update Profile Organizer
    // Auth
    public function updateProfile(Request $request)
    {
         if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'username' => 'required|min:3|max:255',
            'phone' => 'required|min:10|max:13',
            'password' => 'required|min:3|max:255',
            'passwordVerify' => 'required|min:3|max:255',
        ]);
        $checkEmail = Organizer::where('username', session()->get('username'))->first();
        // Pengecekan Email
        if ($checkEmail->email == $validation['email']) {
            $emailVerify = $checkEmail->email;
        } else {
            // Mengecek email yang dirubah
            $checkEmail = Organizer::where('email', $validation['email'])->first();
            if ($checkEmail) {
                return redirect('/organizer/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Email already exists!');
            } else {
                $emailVerify = $validation['email'];
            }
        }
        // end

        // Pengecekan Password
        if ($validation['password'] == $validation['passwordVerify']) {
            // Update Data
           Organizer::where('id', session()->get('id_user'))->update([
                'email' => $emailVerify,
                'username' => $validation['username'],
                'password' => bcrypt($validation['password']),
            ]);
            // Ubah session username
            session()->put('username', $validation['username']);
            return redirect('/organizer/profile' );
        } else {
            return redirect('/organizer/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Password does not match!');
        }
    }
}
