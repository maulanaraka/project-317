<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class AuthOrganizerController extends Controller
{
    public function formLogin()
    {
        if (session()->get('login') == true) {
            if (session()->get('role') == 'community') {
                return redirect('/organizer/dashboard');
            } else if (session()->get('role') == '4dm1n') {
                return redirect('/4dm1n/dashboard');
            } else if (session()->get('role') == 'organizer') {
                return redirect('/organizer/dashboard');
            }
        }

        return view('Organizer.formLogin');
    }
    //Form Registrasi
    // Masukan View Registrasi
    public function formRegistrasi()
    {
        return view('Organizer.formRegistrasi');
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
        $checkEmail = Organizer::where('email', $validation['email'])->first();
        if ($checkEmail) {
            return redirect('/organizer/registrasi')->with('error', 'Email already exists!');
        }
        $data = new Organizer();
        $data->email = $validation['email'];
        $data->username = $validation['username'];
        $data->password = bcrypt($validation['password']);
        $data->phone = $validation['phone'];
        $data->save();
        return redirect('/organizer/registrasi')->with('success', 'Registration was successful!');
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'password' => 'required|min:3|max:255',
        ]);
        $data = Organizer::where('email', $validation['email'])->first();
        if ($data) {
            if (password_verify($validation['password'], $data->password)) {
                $request->session()->put('login', true);
                $request->session()->put('username', $data->username);
                $request->session()->put('id_user', $data->id);
                $request->session()->put('role', 'organizer');
                return redirect('/organizer/dashboard');
            } else {
                return redirect('/organizer/login')->with('error', 'Wrong password or email!');
            }
        } else {
            return redirect('/organizer/login')->with('error', 'account not exist');
        }
    }

    // Logout Organizer
    // Auth
    public function logout()
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        session()->forget('login');
        session()->forget('username');
        session()->forget('role');
        session()->forget('id_user');
        return redirect('/organizer/login');
    }


}
