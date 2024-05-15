<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $primaryKey = 'event_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'event_id',
        'event_name',
        'description',
        'event_banner',
        'event_profile',
        'event_location',
        'time',
        'type',
        'address',
        'resource',
        'speaker_name',
        'speaker_img',
        'documentation',
        'publication_status',
        'categories'
    ];

    public function keyThemes()
    {
        return $this->hasMany(KeyTheme::class, 'event_id', 'event_id');
    }

    public function partners()
    {
        return $this->hasMany(Partner::class, 'event_id', 'event_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'event_id', 'event_id');
    }

    public function qna()
    {
        return $this->hasMany(Qna::class, 'event_id', 'event_id');
    }

    public function submission()
    {
        return $this->hasOne(Submission::class, 'event_id', 'event_id');
    }
    
    public function rsvp()
    {
        return $this->hasMany(Rsvp::class, 'event_id', 'event_id');
    }
}
