<?php

namespace App\Http\Controllers;

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
}
