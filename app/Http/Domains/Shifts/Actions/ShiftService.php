<?php

namespace App\Http\Domains\Shifts\Actions;

use App\Models\Shift;

class ShiftService
{
    public function index() {}

    public function create() {}

    public function store(array $data)
    {

        return Shift::create([
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);

    }

    public function find($id)
    {
        return Shift::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $shift = $this->find($id);
        return $shift->update([
            'name' => $data['name'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }
}
