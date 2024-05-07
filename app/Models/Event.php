<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
    // use HasFactory;
}
