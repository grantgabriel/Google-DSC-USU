<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\KeyTheme;
use App\Models\Rsvp;

class AdminController extends Controller
{
    public function member(){
    
        return view('admin.chapter-member');
    }

    public function event(){
        $event = Event::where('time', '>', now())
        ->orderBy('time', 'asc')
        ->get();
        return view('admin.event',compact('event'));
    }

    public function eventdetail($id){
        $event = Event::find($id);
        $key = KeyTheme::where('event_id', $id)->get();
        $rsvpCount = count(Rsvp::where('event_id', $id)->get());
        return view('admin.event-detail',compact('event','key','rsvpCount'));
    }

    public function eventattendees($id){
        $event = Event::find($id);
        return view('admin.event-attendees',compact('event'));
    }


    public function updateattend(Request $request){
        $attendance = Rsvp::where('event_id', $request->input('event_id'))
        ->where('user_id', $request->input('user_id'))
        ->first();

        $attendance->attendance_detail = $request->input('attendance_detail');
        $attendance->save();
    }


    

    public function analytic(){
        $event = Event::where('time', '>', now())
        ->orderBy('time', 'asc')
        ->get();

        $user = User::all();
        $eventCount = Event::all()->count();
        $registrationCount = User::whereHas('rsvp')->count();

        return view('admin.analytic',compact('event','user','registrationCount','eventCount'));
    }
}
