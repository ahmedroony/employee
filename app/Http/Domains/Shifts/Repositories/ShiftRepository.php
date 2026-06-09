<?php

namespace App\Http\Domains\Shifts\Repositories;

use App\Models\Shift;
class ShiftRepository implements ShiftRepositoryInterface
{
    public function getAllShifts()
    {
        return Shift::all();
    }

    public function findId($id)
    {
        return Shift::findOrFail($id);
    }

    public function storeShifts(array $data)
    {
        return Shift::create([
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }

    public function updateShift($id, array $data)
    {
        $shift = Shift::findOrFail($id);
        return $shift->update([
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }
    public function deleteShift($id)
    {
        $shift = Shift::find($id);
        if(!$shift){
            session()->flash('error', 'هذا الشفت غير موجود أو تم حذفه مسبقاً');
            return;
        }
        $shift->delete();
        session()->flash('success', 'تم حذف الشفت بنجاح!');
    }
}
