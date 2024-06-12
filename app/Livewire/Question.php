<?php

namespace App\Livewire;

use App\Models\Qna;
use Livewire\Component;

class Question extends Component
{
    
    public $question;
    public $anonym;
    public $eventId;
    public function mount($eventId)
    {
        $this->eventId = $eventId;
    }
    
    public function askQuestion(){
        Qna::create([
            'event_id' => $this->eventId,
            'question' => $this->question
        ]);
    }
    public function render()
    {
        $question = Qna::where('event_id', $this->eventId)->get();
        return view('livewire.question', [
            'questions' => $question

        ]);
    }
}
