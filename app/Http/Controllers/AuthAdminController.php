<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AuthAdminController extends Controller
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

        return view('Admin.formLogin');
    }
    //Form Registrasi
    // Masukan View Registrasi
    public function formRegistrasi()
    {
        return view('Admin.formRegistrasi');
    }

    #Tambah Data Registrasi admin
    public function registrasi(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:255',
        ]);
        $checkEmail = Admin::where('email', $validation['email'])->first();
        if ($checkEmail) {
            return redirect('/4dm1n/registrasi')->with('error', 'Email already exists!');
        }
        $data = new Admin();
        $data->email = $validation['email'];
        $data->username = $validation['username'];
        $data->password = bcrypt($validation['password']);
        $data->save();
        return redirect('/4dm1n/registrasi')->with('success', 'Registration was successful!');
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|min:3|max:255|email:rfc',
            'password' => 'required|min:3|max:255',
        ]);
        $data = Admin::where('email', $validation['email'])->first();
        if ($data) {
            if (password_verify($validation['password'], $data->password)) {
                $request->session()->put('login', true);
                $request->session()->put('username', $data->username);
                $request->session()->put('role', '4dm1n');
                return redirect('/4dm1n/dashboard');
            } else {
                return redirect('/4dm1n/login')->with('error', 'Wrong password or email!');
            }
        } else {
            return redirect('/4dm1n/login')->with('error', 'account not exist');
        }
    }

    // Logout Admin
    // Auth
    public function logout()
    {
        if (session()->get('login') != true) {
            return redirect('/4dm1n/login');
        } else {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
        }

        session()->forget('login');
        session()->forget('username');
        session()->forget('role');
        return redirect('/4dm1n/login');
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
}
