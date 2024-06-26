<?php

namespace App\Http\Controllers;

use App\Models\KeyTheme;
use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        $userCount = count(User::get());

        return view('index', compact(['events', 'userCount']));
    }

    public function detail($id, $slug){
        $event = Event::find($id);
        $key = KeyTheme::where('event_id', $id)->get();
        $rsvpCount = count(Rsvp::where('event_id', $id)->get());
        
        return view('event', compact(['event', 'key', 'rsvpCount']));
    }

    public function rsvp(Request $request){
        $ev_id = $request->eventid;
        $event = Event::find($ev_id);
        $slug = Str::slug($event->event_name);
        Rsvp::create([
            'event_id' => $request->eventid,
            'user_id' => $request->userid,
            'attendance_detail' => 'Could Not Attend'
        ]);

        return redirect('/event/'.$ev_id.'-'.$slug);
    }
}
