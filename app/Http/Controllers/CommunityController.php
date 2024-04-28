<?php

namespace App\Http\Controllers;
use App\Models\Community;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
     // Dashboard Community
    // Auth
    public function dashboard()
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }
        return view('Community.dashboard');
    }
 // Profile Community
    // Auth
    public function profile()
    {
         if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        $dataProfile = Community::where('id', session()->get('id_user'))->first();
        return view('Community.Profile.profile', compact('dataProfile'));
    }
 // Form Update Profile Community
    // Auth
    public function formUpdateProfile($id)
    {
         if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        if (session()->get('id_user') == $id) {
            $dataProfile = Community::where('id', session()->get('id_user'))->first();
            return view('Community.Profile.formUpdateProfile', compact('dataProfile'));
        } else {
            return redirect('/community/dashboard');
        }
    }
 // Action Update Profile Community
    // Auth
    public function updateProfile(Request $request)
    {
         if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'username' => 'required|min:3|max:255',
            'phone' => 'required|min:10|max:13',
            'password' => 'required|min:3|max:255',
            'passwordVerify' => 'required|min:3|max:255',
        ]);
        $checkEmail = Community::where('username', session()->get('username'))->first();
        // Pengecekan Email
        if ($checkEmail->email == $validation['email']) {
            $emailVerify = $checkEmail->email;
        } else {
            // Mengecek email yang dirubah
            $checkEmail = Community::where('email', $validation['email'])->first();
            if ($checkEmail) {
                return redirect('/community/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Email already exists!');
            } else {
                $emailVerify = $validation['email'];
            }
        }
        // end

        // Pengecekan Password
        if ($validation['password'] == $validation['passwordVerify']) {
            // Update Data
           Community::where('id', session()->get('id_user'))->update([
                'email' => $emailVerify,
                'username' => $validation['username'],
                'password' => bcrypt($validation['password']),
            ]);
            // Ubah session username
            session()->put('username', $validation['username']);
            return redirect('/community/profile' );
        } else {
            return redirect('/community/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Password does not match!');
        }
    }
}
