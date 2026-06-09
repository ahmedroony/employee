<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Actions\ShiftService;
use Livewire\Component;

class Edit extends Component
{
    public $shiftId;

    public $name;

    public $start_time;

    public $end_time;

    public function mount(ShiftService $service, $id)
    {
        $shift = $service->findId($id);
        $this->shiftId = $shift->id;
        $this->name = $shift->name;
        $this->start_time = $shift->start_time;
        $this->end_time = $shift->end_time;
    }

    public function update(ShiftService $service)
    {
        $data = $this->validate([
            'name' => 'required|string|max:50|unique:shifts,name,'.$this->shiftId,
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $service->update($this->shiftId, $data);
        session()->flash('message', 'تم تعديل الشفت بنجاح!');

        return redirect()->route('admin.shifts');
    }

    public function render()
    {
        return view('livewire.pages.edit');
    }
}
