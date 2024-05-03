<?php

namespace App\Http\Controllers;
use App\Models\Community;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
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
            return redirect('/community/profile');
        } else {
            return redirect('/community/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Password does not match!');
        }
    }

    // Menambahkan Event Community
    // Auth Community
    public function formAddEvent()
    {
        $category_list = Category::all();

        return view('Community.Event.formAddEvent', [
            'category_list' => $category_list,
        ]);
    }

    public function addEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        // dd($request->all());
        $validation = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'event_date' => 'required',
            'media' => 'required|image|mimes:jpg,jpeg,png',
            'event_category' => 'required',
        ]);

        // random nama dan simpan file
        $image = $request->file('media');
        $imageHash = $image->hashName();
        $image->storeAs('public/event', $imageHash);

        $eventCreated = Event::create([
            'title' => $validation['title'],
            'description' => $validation['description'],
            'event_date' => $validation['event_date'],
            'media' => $imageHash,
            'event_category' => $validation['event_category'],
            'type' => 'Request',
            'event_status' => 0,
            'event_is_approve' => 0,
            'event_approved_date' => '2024-05-08',
            'event_request_date' => now()->format('Y-m-d'),
            'community_id' => session()->get('id_user'),
        ]);

        if ($eventCreated) {
            return redirect('/community/formAddEvent')->with('success', 'Event was created successfully!');
        } else {
            return redirect('/community/formAddEvent')->with('error', 'Event was not created!');
        }
    }

    // Menampilkan data pada Event sesuai community yang login
    public function listMyEvent(){
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        // $myEvents = Event::where('community_id', session()->get('id_user'))->get();
        // Melakukan join 
        $myEvents = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.community_id', session()->get('id_user'))->get();
        if($myEvents){
            return view('Community.Event.listMyEvent', [
                'myEvents' => $myEvents
            ]);
        }

    }
}
