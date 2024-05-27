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

    public function eventsurvey($id){
        $event = Event::find($id);
        return view('admin.event-survey',compact('event'));
    }


    public function addevent(){
        $key = KeyTheme::select('key_name')->distinct()->get();
        return view('admin.add-event',compact('key'));
    }

    public function addeventcreate(Request $request){
        $event = new Event;
        $event->event_id = uniqid();
        $event->event_name = $request->name;
        $event->description = $request->desc;
        $event->type = $request->venue;
        $event->time = $request->date;
        $event->event_location = $request->map;
        $event->address = $request->location;
        $event->publication_status = 'Published';
        $event->speaker_name = $request->speak;
        if($request->categories != null){
            $event->categories = $request->categories;
        }

        if ($request->hasFile('banner')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('banner')->move(public_path('banner'), $imageName);
            $event->event_banner = $imageName;
        }
        else{
            $event->event_banner = 'default.webp';
        }



        if ($request->hasFile('profile')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('profile')->move(public_path('event-profile'), $imageName);
            $event->event_profile = $imageName;
        }
        else{
            $event->event_profile = 'default.webp';
        }

        if ($request->hasFile('speakimg')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('speakimg')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('speakimg')->move(public_path('speaker'), $imageName);
            $event->speaker_img = $imageName;
        }
        else{
            $event->speaker_img = 'default.webp';
        }

        $event->save();

        return redirect('/admin/event');
        
    }

    public function addeventdraft(Request $request){
        $event = new Event;
        $event->event_id = uniqid();
        $event->event_name = $request->name;
        $event->description = $request->desc;
        $event->type = $request->venue;
        $event->time = $request->date;
        $event->event_location = $request->map;
        $event->address = $request->location;
        $event->publication_status = 'Draft';
        $event->speaker_name = $request->speak;
        if($request->categories != null){
            $event->categories = $request->categories;
        }

        if ($request->hasFile('banner')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('banner')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('banner')->move(public_path('banner'), $imageName);
            $event->event_banner = $imageName;
        }
        else{
            $event->event_banner = 'default.webp';
        }



        if ($request->hasFile('profile')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('profile')->move(public_path('event-profile'), $imageName);
            $event->event_profile = $imageName;
        }
        else{
            $event->event_profile = 'default.webp';
        }

        if ($request->hasFile('speakimg')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('speakimg')->getClientOriginalExtension();
            $imageName = time().'-'.strtotime($request->tanggal).'.'.$extension;
            $request->file('speakimg')->move(public_path('speaker'), $imageName);
            $event->speaker_img = $imageName;
        }
        else{
            $event->speaker_img = 'default.webp';
        }

        $event->save();

        return redirect('/admin/event');
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

    public function eventstat($id){
        $event = Event::find($id);
        return view('admin.event-stat',compact('event'));
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
