<?php

namespace App\Http\Domains\Shifts\Actions;

use App\Models\Shift;

class UpdateShiftAction
{
    public function execute($id, array $data): bool
    {
        $shift = Shift::findOrFail($id);

        return $shift->update([
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }
}
