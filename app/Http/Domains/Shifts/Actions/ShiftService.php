<?php

namespace App\Http\Domains\Shifts\Actions;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftService
{
    public function index() {}

    public function create() {}

    public function store(Request $request)
    {
        Shift::create([
            'name' => 'moring2',
            'start_time' => '08:00:00',
            'end_time' => '16:00:00',
        ]);

    }
}
