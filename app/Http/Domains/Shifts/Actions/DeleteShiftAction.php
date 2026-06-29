<?php

namespace App\Http\Domains\Shifts\Actions;

use App\Models\Shift;

class DeleteShiftAction
{
    public function execute($id): bool
    {
        $shift = Shift::query()->find($id);
        if (! $shift) {
            return false;
        }

        return $shift->delete();
    }
}
