<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;
use App\Models\Event;

class SurveyController extends Controller
{
    public function index($id, $slug){
        $event = Event::find($id);
        $survey = [
            'id' => $id,
            'slug' => $slug,
            'event' => $event

        ];
        return view('survey', compact('survey'));
    }

    public function submit(Request $request){
        Rsvp::where('event_id', $request->eventId)
            ->where('user_id', $request->userId)
            ->update([
                'rating' => $request->rating,
                'review' => $request->review,
                'speaker_rating' => $request->sprating,
                'suggestion' => $request->suggestion
            ]);

        return redirect('/event/'.$request->eventId.'-'.$request->slug);
    }
}
