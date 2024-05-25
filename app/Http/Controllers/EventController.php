<?php

namespace App\Http\Controllers;

use App\Models\KeyTheme;
use App\Models\Rsvp;
use Illuminate\Http\Request;
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

    public function detail($id){
        $event = Event::find($id);
        $key = KeyTheme::where('event_id', $id)->get();
        $rsvpCount = count(Rsvp::where('event_id', $id)->get());
        
        return view('event', compact(['event', 'key', 'rsvpCount']));
    }

    public function rsvp(Request $request){
        $ev_id = $request->eventid;
        Rsvp::create([
            'event_id' => $request->eventid,
            'user_id' => $request->userid
        ]);

        return redirect('/event/'.$ev_id);
    }
}
