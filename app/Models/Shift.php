<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Shift extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
    ];

    public function minstime()
    {
        // how the endtime less then startTime
        /*
        solution:
        -if the endtime < start time , Add 24 hour
        */
        $start = Carbon::parse($this->start_time);
        $end = Carbon::parse($this->end_time);
        if ($end < $start) {
            $end->addDay();
        }

        return $start->diffInHours($end);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_shift','shift_id','user_id');
    }
}
