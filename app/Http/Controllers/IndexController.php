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

        $myEvents = DB::table('event')
        ->leftJoin('category', 'event.event_category', '=', 'category.id')
        ->where('event.event_status', 0)
        ->where('event.event_is_approve', 1)
        ->select('event.*', 'category.category_name')->paginate(5);
       
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

        if(empty($request->search)){
            $searchEvent = DB::table('event')
            ->leftJoin('category', 'event.event_category', '=', 'category.id')
            ->select('event.*', 'category.category_name')
            ->where('category.category_name', 'HXleVmb0glrTiHbD6dmS')
            ->paginate(5);

            return view('explore', [
                'allEvent' => $searchEvent,
            ]);
        }

        if ($request->search == 'Community' || $request->search == 'community') {

            $searchEvent = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->select('event.*', 'category.category_name')->where('event.event_status', 0)->where('event.event_is_approve', 1)->whereNull('event.organizer_id')->paginate(5);

        } elseif ($request->search == 'Organizer' || $request->search == 'organizer') {

            $searchEvent = DB::table('event')->leftJoin('category', 'event.event_category', '=', 'category.id')->select('event.*', 'category.category_name')->where('event.event_status', 0)->where('event.event_is_approve', 1)->whereNull('event.community_id')->paginate(5);
        
        } else {
            $searchEvent = DB::table('event')
                ->leftJoin('category', 'event.event_category', '=', 'category.id')
                ->select('event.*', 'category.category_name')
                ->where('event.event_status', 0)
                ->where('event.event_is_approve', 1)
                ->where('event.title', 'like', '%' . $request->search . '%')
                // ->orWhere('category.category_name', 'like', '%' . $request->search . '%')
                // ->orWhere('event.event_date', 'like', '%' . $request->search . '%')
                ->paginate(5);
        }

        // return dd($searchEvent);

        if ($searchEvent) {
            return view('explore', [
                'allEvent' => $searchEvent,
            ]);
        }

    }

    public function forum(){
        $data = DB::table('report')->leftJoin('event', 'report.event_id', '=', 'event.id')->select('report.report', 'event.title')->paginate(5);
        return view('forum', [
            'data' => $data
        ]);
    }

    public function forumSearch(Request $request){
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

        $data = DB::table('report')->leftJoin('event', 'report.event_id', '=', 'event.id')->where('report.report', 'like', '%' . $request->search . '%')->orWhere('event.title', 'like', '%' . $request->search . '%')->select('report.report', 'event.title')->paginate(5);

        // return dd($searchEvent);
        return view('forum', [
            'data' => $data
        ]);

    }
}
