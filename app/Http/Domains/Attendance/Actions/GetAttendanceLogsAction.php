<?php
namespace App\Http\Domains\Attendance\Actions;

use App\Models\Log;

class GetAttendanceLogsAction
{
    public function execute(string $search)
    {
        return Log::with('user')->when($search != '', function($query) use ($search) {
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%'.$search. '%')
                    ->orWhere('email', 'like', '%'.$search .'%');
            });
        })->latest()->paginate(10);
    }
}
