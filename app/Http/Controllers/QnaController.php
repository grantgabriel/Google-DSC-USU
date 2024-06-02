<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class QnaController extends Controller
{
    public function view($id, $slug){
        $event = Event::find($id);
        $qna = [
            'id' => $id,
            'slug' => $slug,
            'event' => $event
        ];
        return view('qna', compact('qna'));
    }
}
