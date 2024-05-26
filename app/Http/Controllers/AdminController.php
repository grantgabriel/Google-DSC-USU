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
        
        $attendance = Rsvp::where('event_id', $request->eventId)
        ->where('user_id', $request->attendanceId)
        ->first();

        if (!$attendance) {
            return response()->json(['error' => 'Attendance record not found'], 404);
        }
    
        // Update the attendance detail based on the request
        if ($request->isChecked == 'Could Not Attend') {
            $attendance->attendance_detail = 'Attend';
        } else {
            $attendance->attendance_detail = 'Could Not Attend';
        }
    
        // Save the changes
        if ($attendance->save()) {
            return response()->json(['success' => 'Attendance updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Failed to update attendance'], 500);
        }

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
