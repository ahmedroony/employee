<?php

namespace App\Http\Domains\employeedashboard;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeDashboard
{
    public function startShift()
    {
        $user = Auth::user();

        $activeLog = DB::table('logs')->where('user_id', $user->id)
            ->whereNull('logout_time')
            ->first();

        if ($activeLog) {
            return 'already working';
        }

        Log::create([
            'user_id' => $user->id,
            'login_time' => now(),
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
}
