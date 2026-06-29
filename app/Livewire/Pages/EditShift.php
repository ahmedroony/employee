<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Actions\UpdateShiftAction;
use App\Models\Shift;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditShift extends Component
{
    public $shiftId;

    public $name;

    public $start_time;

    public $end_time;
    //mount this is where i pass the data
    public function mount($id)
    {
        $shift = Shift::findOrFail($id);
        $this->shiftId = $shift->id;
        $this->name = $shift->name;
        $this->start_time = $shift->start_time;
        $this->end_time = $shift->end_time;
    }

    public function update(UpdateShiftAction $action)
    {
        $data = $this->validate([
            'name' => 'required|string|max:50|unique:shifts,name,'.$this->shiftId,
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $action->execute($this->shiftId, $data);
        session()->flash('message', 'تم تعديل الشفت بنجاح!');

        return redirect()->route('admin.shifts');
    }

    public function render()
    {
        return view('livewire.pages.edit');
    }
}

