<?php

namespace App\Livewire\Pages;

use App\Models\Shift;
use Livewire\Component;

class Edit extends Component
{
    public $shiftId;

    public $name;

    public $start_time;

    public $end_time;

    public function mount($id)
    {
        $shift = Shift::findOrFail($id);

        $this->shiftId = $shift->id;
        $this->name = $shift->name;
        $this->start_time = $shift->start_time;
        $this->end_time = $shift->end_time;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:50|unique:shifts,name,'.$this->shiftId,
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $shift = Shift::findOrFail($this->shiftId);
        $shift->update([
            'name' => $this->name,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);
        session()->flash('message', 'تم تعديل الشفت بنجاح!');

        return redirect()->route('admin.shifts');
    }

    public function render()
    {
        return view('livewire.pages.edit');
    }
}
