<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Event;
use App\Models\Rsvp;

class DataController extends Controller
{
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

    public function eventdatasearch($id, $search){
        $data = Rsvp::where('event_id', $id)
                ->whereHas('user', function($query) use ($search){
                    $query->where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $search . '%');
                })
                ->with('user')->orderBy('created_at', 'desc')
                ->get();
        
        return response()->json($data);
    }


    public function eventdata($id){
        $data = Rsvp::where('event_id', $id)
                ->with('user')->orderBy('created_at', 'desc')
                ->get();
        
        return response()->json($data);
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


}
