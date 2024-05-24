<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class AdminController extends Controller
{
    public function member(){
        $data = User::where('role', 'Member')->with('rsvp')->get();

        return view('admin.chapter-member', compact('data'));
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
