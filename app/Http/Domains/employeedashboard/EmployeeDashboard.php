<?php

namespace App\Http\Domains\employeedashboard;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeDashboard
{
    public function startShift()
    {
        //store new login_time in log
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
        DB::table('logs')
            ->where('user_id', Auth::id())
            ->whereNull('logout_time')
            ->update([
                'logout_time' => now(),
                'status' => 'completed',
            ]);
    }
    public function getCurrentWorkDuration()
    {
        return DB::table('logs')->where('user_id', Auth::id())->orderByDesc('login_time')->value('login_time');
    }

    public function getcurrentTimeShift()
    {
        return auth()->user()->shifts()->first();
    }

    public function autoCloseShift()
    {
        $now = Carbon::now('Africa/Cairo');
        $openLogs = DB::table('Logs')
        ->join('shifts', 'logs.shift_id', '=', 'shifts.id')
        ->whereNull('logs.logout_time')->where('logs.status', 'working')
        ->select('logs.id as log_id', 'shifts.end_time')
        ->get();

        foreach ($openLogs as $log) {
            $shiftEnd = Carbon::parse($log->end_time, 'Africa/Cairo')->setDateFrom($now);
            if ($now->diffInMinutes($shiftEnd, false) <= -1) {
                DB::table('logs')->where('id', $log->log_id)->update([
                    'logout_time' => $shiftEnd,
                    'status' => 'auto_closed',
                ]);
            }
        }
        return response()->json(['message' => 'Auto-close completed.']);
    }
}
