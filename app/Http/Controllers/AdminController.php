<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\KeyTheme;
use App\Models\Rsvp;
use App\Models\Qna;

class AdminController extends Controller
{
    public function member(){
    
        return view('admin.chapter-member');
    }

    public function memberdeath($id){
        $user = User::find($id);
        $rsvp = Rsvp::where('user_id', $id)->get();
        return view('admin.profile',compact('user','rsvp'));
    }

    public function qr(Request $request){
        $event = Event::find($request->id);
        return view('admin.admin-show-qr',compact('event'));
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

    public function resource(Request $request, $id){
        $event = Event::find($id);
        $event->resource = $request->resource;
        $event->save();
        return back();
    }

    public function resourcerm($id){
        $event = Event::find($id);
        $event->resource = NULL;
        $event->save();
        return back();
    }

    public function docrm($id){
        $event = Event::find($id);
        $event->documentation = NULL;
        $event->save();
        return back();
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
        $event->speaker_name = $request->speakname;
        $event->address = $request->map;

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

        if ($request->hasFile('speakimg')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('speakimg')->getClientOriginalExtension();
            $imageName = strtotime($request->tanggal)+time().'-'.'.'.$extension;
            $request->file('speakimg')->move(public_path('speaker'), $imageName);
            $event->speaker_img = $imageName;
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

    public function eventqna($id){
        $event = Qna::where('event_id', $id)->get();
        return view('admin.event-qna',compact('event','id'));
    }

    public function adddoc(Request $request, $id){
        $event = Event::find($id);

        if ($request->hasFile('docu')) {
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $extension = $request->file('docu')->getClientOriginalExtension();
            $imageName = time().'-'.'.'.$extension;
            $request->file('docu')->move(public_path('documentation'), $imageName);
            $event->documentation = $imageName;
        }

        $event->save();
        return back();
    }

    public function sertifikat(){
        $totalEventsPerCategory = DB::table('events')
        ->select('categories', DB::raw('COUNT(*) as total'))
        ->groupBy('categories')
        ->pluck('total', 'categories');

    $users = DB::table('users')
        ->join('rsvps', 'users.user_id', '=', 'rsvps.user_id')
        ->join('events', 'rsvps.event_id', '=', 'events.event_id')
        ->select('users.user_id', 'users.first_name', 'users.last_name', 'users.email', 'events.categories', DB::raw('COUNT(rsvps.event_id) as total_attended'))
        ->groupBy('users.user_id', 'users.first_name', 'users.last_name', 'users.email', 'events.categories')
        ->get()
        ->groupBy('user_id');

    $userAttendance = [];

    foreach ($users as $userId => $categories) {
        $user = [
            'user_id' => $categories->first()->user_id,
            'first_name' => $categories->first()->first_name,
            'last_name' => $categories->first()->last_name,
            'email' => $categories->first()->email,
            'categories' => []
        ];

        foreach ($categories as $category) {
            $totalEvents = $totalEventsPerCategory[$category->categories] ?? 0;
            $attendancePercentage = $totalEvents > 0 ? ($category->total_attended / $totalEvents) * 100 : 0;

            if ($attendancePercentage > 60) {
                $user['categories'][] = [
                    'category' => $category->categories,
                    'attendance_percentage' => $attendancePercentage
                ];
            }
        }

        if (!empty($user['categories'])) {
            $userAttendance[] = $user;
        }
    }

    return view('admin.admin-sertif', compact('userAttendance'));
    }
}
