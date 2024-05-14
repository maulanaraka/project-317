<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use App\Models\Category;
use App\Models\Event;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
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
            return redirect('/organizer/profile');
        } else {
            return redirect('/organizer/' . session()->get('id_user') . '/formUpdateProfile')->with('error', 'Password does not match!');
        }
    }

    // =====================================================================================================================
    // EVENT
    // Menambahkan Event Oragnizer
    // Auth Oragnizer
    public function formAddEvent()
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $category_list = Category::all();

        return view('Organizer.Event.formAddEvent', [
            'category_list' => $category_list,
        ]);
    }

    public function addEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
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
            'event_status' => 0,
            'event_is_approve' => 0,
            'event_approved_date' => '2024-05-08',
            'event_request_date' => now()->format('Y-m-d'),
            'organizer_id' => session()->get('id_user'),
        ]);

        if ($eventCreated) {
            return redirect('/organizer/formAddEvent')->with('success', 'Event was created successfully!');
        } else {
            return redirect('/organizer/formAddEvent')->with('error', 'Event was not created!');
        }
    }

    // Menampilkan data pada Event sesuai Oragnizer yang login
    // Auth
    public function listMyEvent()
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        // $myEvents = Event::where('organizer_id', session()->get('id_user'))->get();
        // Melakukan join
        $myEvents = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.organizer_id', session()->get('id_user'))->select('event.*', 'category.category_name')->get();

        // dd($myEvents);
        if ($myEvents) {
            return view('Organizer.Event.listMyEvent', [
                'myEvents' => $myEvents,
            ]);
        }
    }
    // Menampilkan Form Update event
    // Auth
    public function formUpdateEvent($id)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $myEvents = Event::where('id', $id)->first();
        // dd($myEvents);
        $category = Category::all();
        return view('Organizer.Event.formUpdateEvent', [
            'myEvent' => $myEvents,
            'category' => $category,
        ]);
    }
    // Aksi Update event Oragnizer
    // Auth
    public function updateEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $validation = $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'event_date' => 'required',
            'media' => 'image|mimes:jpg,jpeg,png',
            'event_category' => 'required',
        ]);

        $image = $request->file('media');
        if (!$image) {
            $imageHash = $request->mediaHidden;
        } else {
            $image = $request->file('media');
            $imageHash = $image->hashName();
            Storage::delete('public/event/' . $request->mediaHidden);
            $image->storeAs('public/event', $imageHash);
        }

        $eventUpdated = Event::where('id', $request->id)->update([
            'title' => $validation['title'],
            'description' => $validation['description'],
            'event_date' => $validation['event_date'],
            'media' => $imageHash,
            'event_category' => $validation['event_category'],
        ]);

        if ($eventUpdated) {
            return redirect('/organizer/listMyEvent')->with('success', 'Event was updated successfully!');
        } else {
            return redirect('/organizer/listMyEvent')->with('error', 'Event was not updated!');
        }
    }

    // Hapus Event yang di update
    // Auth

    public function deleteEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        Storage::delete('public/event/' . $request->mediaHidden);
        $eventDeleted = Event::where('id', $request->id)->delete();
        if ($eventDeleted) {
            return redirect('/organizer/listMyEvent')->with('success', 'Event was deleted successfully!');
        } else {
            return redirect('/organizer/listMyEvent')->with('error', 'Event was not deleted!');
        }
    }

    // Detail my Event
    // Auth

    public function detailEvent($id)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $event = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.id', $id)->leftJoin('organizer', 'event.organizer_id', '=', 'organizer.id')->select('event.*', 'category.category_name', 'organizer.username', 'organizer.phone')->first();

        return view('Organizer.Event.detailEvent', compact('event'));
    }

    // Update Event status jika sudah dilobby oleh community dan sudah di approve oleh admin

    public function updateEventStatus(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $id = $request->id;

        $event = Event::where('id', $id)->update([
            'event_status' => 1,
        ]);

        if ($event) {
            return redirect('/organizer/listMyEvent')->with('success', 'Event was updated status successfully!');
        } else {
            return redirect('/organizer/listMyEvent')->with('error', 'Event was not updated status!');
        }
    }

    // ===============================================================================================
    // Reporting/Forum

    public function forum()
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $forums = DB::table('report')->leftJoin('event', 'report.event_id', '=', 'event.id')->select('report.*', 'event.title')->where('report.organizer_id', session()->get('id_user'))->select('report.report', 'report.media', 'report_is_approved', 'event.title')->get();
        // $report = Report::all();
        // return dd($forums);
        return view('Organizer.Forum.forum', [
            'listForum' => $forums,
        ]);
    }

    public function formAddReport(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        return view('Organizer.Forum.formAddReport');
        // $validation = $request->validate([
        //     'report' => 'required|min:5',
        //     'media' => 'image|mimes:jpg,jpeg,png',
        //     'report_date' => 'required'
        // ]);

        // dd($validation);
    }

    public function addReport(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/organizer/login');
        } else {
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

        $validation = $request->validate([
            'report' => 'required|min:5',
            'media' => 'image|mimes:jpg,jpeg,png',
            'report_date' => 'required',
        ]);

        $event = Event::where('id', $request->kode_event)->first();
        if ($event == null) {
            return redirect('/organizer/formAddReport')->with('error', 'Event was empty');
        } elseif ($event->event_status == 0) {
            return redirect('/organizer/formAddReport')->with('error', 'Event was not added to form because it has not been approved yet!');
        }

        if (Report::where('event_id', $request->kode_event)->exists()) {
            return redirect('/organizer/formAddReport')->with('error', 'Event was not added to form because it has already been added to the report!');
        } else {
            $image = $request->file('media');
            $imageHash = $image->hashName();

            $report = Report::create([
                'report' => $validation['report'],
                'report_date' => $validation['report_date'],
                'media' => $imageHash,
                'report_is_approved' => 0,
                'report_request_date' => now()->format('Y-m-d'),
                'event_id' => $request->kode_event,
                'organizer_id' => session()->get('id_user'),
            ]);
            $image->storeAs('public/report', $imageHash);
            if ($report) {
                return redirect('/organizer/formAddReport')->with('success', 'Event was added to report successfully!');
            } else {
                return redirect('/organizer/formAddReport')->with('error', 'Event was not added to report!');
            }
        }
    }
}
