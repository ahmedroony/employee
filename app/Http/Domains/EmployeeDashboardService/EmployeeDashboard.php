<?php

namespace App\Http\Domains\EmployeeDashboardService;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeDashboard
{
    public function startShift()
    {
        $user = Auth::user();
        $currentlog = DB::table('logs')->where('user_id', Auth::id())->where('status', 'working')->whereNull('logout_time')->exists();
        if ($currentlog) {
            return false;
        } else {
            Log::create([
                'user_id' => $user->id,
                'shift_id' => $user->shifts()->latest()->first()?->id,
                'login_time' => now(),
                'logout_time' => null,
                'status' => 'working',
            ]);
            return true;
        }
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

    public function getDateAndTimeShift()
    {
        return DB::table('logs')->where('user_id', Auth::id())->whereDate('login_time', Carbon::today())->orderByDesc('login_time')->value('login_time');
    }

    public function getDateAndTimeEndShift()
    {
        // get the last log for user where teh logout is not null last log
        return DB::table('logs')->where('user_id', Auth::id())->whereNotNull('logout_time')->orderByDesc('logout_time')->value('logout_time');
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

    public function continueOvertime()
    {
        DB::table('logs')
            ->where('user_id', Auth::id())
            ->whereNull('logout_time')
            ->update([
                'status' => 'overtime',
            ]);
    }
}
