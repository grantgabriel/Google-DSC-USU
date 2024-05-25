<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

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

    public function eventsort($id){
        if ($id == 1) {
            $event = Event::where('time', '>', now())
            ->orderBy('time', 'asc')
            ->get();
            return response()->json($event);
        }

        else if ($id == 2) {
            $event = Event::where('time', '<', now())
            ->orderBy('time', 'asc')
            ->get();
            return response()->json($event);
        }

        else {
            return response()->json('error');
        }

    }
    public function eventsortsearch($id,$search){
        if ($id == 1) {
            $event = Event::where('time', '>', now())-> where('event_name', 'like', '%' . $search . '%')
            ->orderBy('time', 'asc')
            ->get();
            return response()->json($event);
        }

        else if ($id == 2) {
            $event = Event::where('time', '<', now())-> where('event_name', 'like', '%' . $search . '%')
            ->orderBy('time', 'asc')
            ->get();
            return response()->json($event);
        }

        else {
            return response()->json('error');
        }

    }

    public function memberdata(){
        $data = User::where('role', 'Member')->with('rsvp')->get();
        
        return response()->json($data); 
    }

    public function membersearch($input){
        $data = User::where('role', 'Member')
                ->with('rsvp')
                ->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $input . '%')
                ->get();    
        return response()->json($data);
    }

    public function analytic(){
        $event = Event::where('time', '>', now())
        ->orderBy('time', 'asc')
        ->get();

        $user = User::all();
        $registrationCount = User::whereHas('rsvp')->count();
        return view('admin.analytic',compact('event','user','registrationCount'));
    }
}
