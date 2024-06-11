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

        $dataEvent = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.event_is_approve', '1')->where('event.event_status', 0)->whereNull('event.community_id')->select('event.id', 'event.title', 'event.description', 'event.event_date', 'event.media', 'category.category_name')->paginate(5);

        $corousel = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.event_is_approve', '1')->where('event.event_status', 0)->whereNull('event.community_id')->select('event.id', 'event.title', 'event.event_date', 'event.media', 'category.category_name')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('Community.dashboard', [
            'dataEvent' => $dataEvent,
            'dataCorousel' => $corousel,
        ]);
    }

    public function searchDashboard(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }
        $corousel = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.event_is_approve', '1')->where('event.event_status', 0)->whereNull('event.community_id')->select('event.id', 'event.title', 'event.event_date', 'event.media', 'category.category_name')->orderBy('created_at', 'desc')->limit(5)->get();

        $searchEvent = DB::table('event')
            ->leftJoin('category', 'event.event_category', '=', 'category.id')
            ->select('event.id', 'event.title', 'event.description', 'event.event_date', 'event.media', 'category.category_name')
            ->where('event.event_is_approve', '1')
            ->where('event.event_status', 0)
            ->whereNull('event.community_id')
            ->where('title', 'like', '%' . $request->search . '%')
            ->orWhere('category.category_name', 'like', '%' . $request->search . '%')
            ->orWhere('event_date', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->paginate(5);

        if ($searchEvent) {
            return view('Organizer.dashboard', [
                'dataEvent' => $searchEvent,
                'dataCorousel' => $corousel,
            ]);
        }
    }

    // Menampilkan detail Event pada dashboard
    // Auth
    public function detailEventDashboard($id)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        $event = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.id', $id)->leftJoin('organizer', 'event.organizer_id', '=', 'organizer.id')->select('event.title', 'event.description', 'event.event_date', 'event.media', 'category.category_name', 'organizer.username', 'organizer.phone')->first();

        // return dd($event);

        return view('Organizer.detailEventDashboard', compact('event'));
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
                'phone' => $validation['phone'],
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
            'event_status' => 0,
            'event_is_approve' => 0,
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
    // Auth
    public function listMyEvent()
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        // $myEvents = Event::where('community_id', session()->get('id_user'))->get();
        // Melakukan join
        $myEvents = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.community_id', session()->get('id_user'))->select('event.*', 'category.category_name')->paginate(5);

        if ($myEvents) {
            return view('Community.Event.listMyEvent', [
                'myEvents' => $myEvents,
            ]);
        }
    }
    // Melakukan Searching pada mylistevent
    public function searchMyEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        
          
        if(empty($request->search)){
            $searchEvent = DB::table('event')
            ->leftJoin('category', 'event.event_category', '=', 'category.id')
            ->select('event.*', 'category.category_name')
            ->where('event.community_id', session()->get('id_user'))
            ->where('category.category_name', 'HXleVmb0glrTiHbD6dmS')
            ->paginate(5);

            return view('Community.Event.listMyEvent', [
                'myEvents' => $searchEvent,
            ]);
        }

        $searchEvent = DB::table('event')
        ->leftJoin('category', 'event.event_category', '=', 'category.id')
        ->select('event.*', 'category.category_name')
        ->where('event.community_id', session()->get('id_user'))
        ->where('title', 'like', '%' . $request->search . '%')
        ->paginate(5);
     

        if ($searchEvent) {
            return view('Community.Event.listMyEvent', [
                'myEvents' => $searchEvent,
            ]);
        }
    }

    // Menampilkan Form Update event
    // Auth
    public function formUpdateEvent($id)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        $myEvents = Event::where('id', $id)->first();
        // dd($myEvents);
        $category = Category::all();
        return view('Community.Event.formUpdateEvent', [
            'myEvent' => $myEvents,
            'category' => $category,
        ]);
    }
    // Aksi Update event Community
    // Auth
    public function updateEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
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
            return redirect('/community/listMyEvent')->with('success', 'Event was updated successfully!');
        } else {
            return redirect('/community/listMyEvent')->with('error', 'Event was not updated!');
        }
    }

    // Hapus Event yang di update
    // Auth

    public function deleteEvent(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }
        Storage::delete('public/event/' . $request->mediaHidden);
        $eventDeleted = Event::where('id', $request->id)->delete();
        if ($eventDeleted) {
            return redirect('/community/listMyEvent')->with('success', 'Event was deleted successfully!');
        } else {
            return redirect('/community/listMyEvent')->with('error', 'Event was not deleted!');
        }
    }

    // Detail my Event
    // Auth

    public function detailEvent($id)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        $event = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.id', $id)->leftJoin('community', 'event.community_id', '=', 'community.id')->select('event.*', 'category.category_name', 'community.username', 'community.phone')->first();

        return view('Community.Event.detailEvent', compact('event'));
    }

    // Update Event status jika sudah dilobby oleh community dan sudah di approve oleh admin

    public function updateEventStatus(Request $request)
    {
        if (session()->get('login') != true) {
            return redirect('/community/login');
        } else {
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
        }

        $id = $request->id;

        $event = Event::where('id', $id)->update([
            'event_status' => 1,
        ]);

        if ($event) {
            return redirect('/community/listMyEvent')->with('success', 'Event was updated status successfully!');
        } else {
            return redirect('/community/listMyEvent')->with('error', 'Event was not updated status!');
        }
    }
}
