<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
class EventController extends Controller
{
    public function index(){
        $events = Event::get();

        return view('index', compact('events'));
    }
}
