<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Log extends Model
{
    protected $fillable = [
        'user_id',
        'shift_id',
        'login_time',
        'logout_time',
        'status',
    ];

    protected $casts = [
        'login_time' => 'datetime',
        'logout_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shift():BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }

}
