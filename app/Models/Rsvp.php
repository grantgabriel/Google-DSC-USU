<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    use HasFactory;
    protected $table = 'rsvps';

    protected $fillable = [
        'event_id',
        'user_id',
        'attendance_detail',
        'rating',
        'review',
        'speaker_rating',
        'suggestion'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
