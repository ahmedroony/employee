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
        $user = Auth::user();
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
        return (auth()->user()->shifts(Auth::id())
            ->first(['start_time', 'end_time']));
    }
}
