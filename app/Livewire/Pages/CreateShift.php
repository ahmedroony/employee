<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Actions\ShiftService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')] // use layout in folder layouts/admin
class CreateShift extends Component
{
    public $name;

    public $start_time;

    public $end_time;

    public function store(ShiftService $service)
    {
        $validated = $this->validate([
            'name' => 'required|string|max:50|unique:shifts,name',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $service->storeshifts($validated);

        return redirect()->route('admin.shifts')->with('success', 'تم إضافة الشفت بنجاح');
    }

    public function render()
    {
        return view('livewire.pages.create');
    }
}
