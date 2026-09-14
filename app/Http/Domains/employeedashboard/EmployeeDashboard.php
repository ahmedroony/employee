<?php

namespace App\Http\Domains\employeedashboard;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class EmployeeDashboard
{
    public function startShift()
    {
        /*
        -store the login time in the logs table when the user starts the shift
        -store shift_id in the logs table when the user starts the shift
        */
        $user = Auth::user();
        Log::create([
            'user_id' => $user->id,
            'shift_id' => $user->shifts()->latest()->first()?->id,
            'login_time' => now(),
            'logout_time' => null,
            'status' => 'working',
        ]);
    }

    public function endShift()
    {
        DB::table('logs')->where('user_id', Auth::id())
            ->whereNull('logout_time')
            ->update(['logout_time' => now()]);
    }
    public function getCurrentWorkDuration()
    {
        return DB::table('logs')->where('user_id',Auth::id())->orderByDesc('login_time')->value('login_time');
    }
        // task we need get  all shift and display the start time and end time to user

        public function getcurrentTimeShift()
    {
        return (auth()->user()->shifts()->first(['start_time', 'end_time']));
    }
}
