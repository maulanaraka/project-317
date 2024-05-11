<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class AuthCommunityController extends Controller
{
    //Form Login

    public function formLogin()
    {
        if (session()->get('login') == true) {
            if (session()->get('role') == 'community') {
                return redirect('/community/dashboard');
            } else if (session()->get('role') == '4dm1n') {
                return redirect('/4dm1n/dashboard');
            }else if (session()->get('role') == 'organizer') {
                return redirect('/organizer/dashboard');
            }
        }

        return view('Community.formLogin');
    }
    //Form Registrasi
    // Masukan View Registrasi
    public function formRegistrasi()
    {
        return view('Community.formRegistrasi');
    }

    #Tambah Data Registrasi Community
    public function registrasi(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
            'phone' => 'required|min:10|max:13',
        ]);
        $checkEmail = Community::where('email', $validation['email'])->first();
        if ($checkEmail) {
            return redirect('/community/registrasi')->with('error', 'Email already exists!');
        }
        $data = new Community();
        $data->email = $validation['email'];
        $data->username = $validation['username'];
        $data->password = bcrypt($validation['password']);
        $data->phone = $validation['phone'];
        $data->save();
        return redirect('/community/registrasi')->with('success', 'Registration was successful!');
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'password' => 'required|min:3|max:255',
        ]);
        $data = Community::where('email', $validation['email'])->first();
        if ($data) {
            if (password_verify($validation['password'], $data->password)) {
                $request->session()->put('login', true);
                $request->session()->put('username', $data->username);
                $request->session()->put('id_user', $data->id);
                $request->session()->put('role', 'community');
                return redirect('/community/dashboard');
            } else {
                return redirect('/community/login')->with('error', 'Wrong password or email!');
            }
        } else {
            return redirect('/community/login')->with('error', 'account not exist');
        }
    }

    // Logout Community
    // Auth
    public function logout()
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        session()->forget('login');
        session()->forget('username');
        session()->forget('role');
        session()->forget('id_user');
        return redirect('/community/login');
    }

   
}
