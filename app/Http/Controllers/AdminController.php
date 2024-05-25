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
