<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function member(){
        $data = User::where('role', 'Member')->with('rsvp')->get();

        return view('admin.chapter-member', compact('data'));
    }
}
