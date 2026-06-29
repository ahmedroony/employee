<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Actions\StoreShiftAction;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')] // use layout in folder layouts/admin
class CreateShift extends Component
{
    public $name;

    public $start_time;

    public $end_time;

    public function store(StoreShiftAction $action)
    {
        $validated = $this->validate([
            'name' => 'required|string|max:50|unique:shifts,name',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $action->execute($validated);

        return redirect()->route('admin.shifts')->with('success', 'تم إضافة الشفت بنجاح');
    }

    public function render()
    {
        return view('livewire.pages.create');
    }
}

