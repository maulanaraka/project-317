<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function explore()
    {
        // if (session()->get('login') == true) {
        //     if (session()->get('role') != '4dm1n') {
        //         return redirect('/4dm1n/login');
        //     }
        //     if (session()->get('role') != 'community') {
        //         return redirect('/community/login');
        //     }
        //     if (session()->get('role') != 'organizer') {
        //         return redirect('/organizer/login');
        //     }
        // }

        $myEvents = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->where('event.event_status', 0)->where('event.event_is_approve', 1)->select('event.*', 'category.category_name')->paginate(5);
        
        // return dd($myEvents);
        if ($myEvents) {
            return view('explore', [
                'allEvent' => $myEvents,
            ]);
        }
    }

    public function search(Request $request){
        if (session()->get('login') == true) {
            if (session()->get('role') != '4dm1n') {
                return redirect('/4dm1n/login');
            }
            if (session()->get('role') != 'community') {
                return redirect('/community/login');
            }
            if (session()->get('role') != 'organizer') {
                return redirect('/organizer/login');
            }
        }

            // return dd($request->search);
        if ($request->search == 'Community' || $request->search == 'community') {
            $searchEvent = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->select('event.*', 'category.category_name')->where('event.event_status', 0)->where('event.event_is_approve', 1)->whereNull('organizer_id')->paginate(5);;
        } elseif ($request->search == 'Organizer' || $request->search == 'organizer') {
            $searchEvent = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->select('event.*', 'category.category_name')->where('event.event_status', 0)->where('event.event_is_approve', 1)->whereNull('community_id')->paginate(5);;
        } else {
            $searchEvent = DB::table('event')
                ->leftJoin('category', 'event.event_category', '=', 'category.id')
                ->where('event.event_status', 0)
                ->where('event.event_is_approve', 1)
                ->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('category.category_name', 'like', '%' . $request->search . '%')
                ->orWhere('event_date', 'like', '%' . $request->search . '%')
                ->select('event.*', 'category.category_name')
                ->paginate(5);
        }

        // return dd($searchEvent);

        if ($searchEvent) {
            return view('explore', [
                'allEvent' => $searchEvent,
            ]);
        }

    }
}
