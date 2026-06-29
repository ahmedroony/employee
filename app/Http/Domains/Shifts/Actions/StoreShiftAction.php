<?php

namespace App\Http\Domains\Shifts\Actions;

use App\Models\Shift;

class StoreShiftAction
{
    public function execute(array $data): Shift
    {
        return Shift::create([
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }
}
