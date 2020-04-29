<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'event_name', 'description', 'start_date', 'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
