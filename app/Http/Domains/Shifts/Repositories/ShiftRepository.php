<?php
namespace App\Http\Domains\Shifts\Repositories;
use App\Models\Shift;
class ShiftRepository implements ShiftRepositoryInterface
{
    public function getAllShifts() {
        return Shift::all();
    }
}
