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


    public function addevent(){
        return view('admin.add-event');
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


    public function eventedit($id){
        $event = Event::find($id);
        return view('admin.event-edit',compact('event'));
    }

    public function eventeditdata(Request $request, $id){
        $event = Event::find($id);
        $event->event_name = $request->nama;
        $event->time = $request->tanggal;
        // $event->location = $request->location;
        $event->description = $request->deskripsi;

        if ($request->hasFile('banner')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('banner')->move(public_path('banner'), $imageName);
            $event->event_banner = $imageName;
        }

        if ($request->hasFile('pp')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('pp')->getClientOriginalExtension();
            $imageName = strtotime($request->tanggal)+time().'-'.'.'.$extension;
            $request->file('pp')->move(public_path('event-profile'), $imageName);
            $event->event_profile = $imageName;
        }

        $event->save();
        return redirect('/admin/event/'.$id);
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
