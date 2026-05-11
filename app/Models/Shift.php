<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_shift');
    }
}
