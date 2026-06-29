<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Actions\DeleteShiftAction;
use App\Models\Shift;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Allshifts extends Component
{
    public function deleteShift(DeleteShiftAction $action, $id)
    {
        $action->execute($id);
        session()->flash('success', 'تم حذف الشفت بنجاح!');
    }

    // render working automatic when i open the page everyTime
    public function render()
    {
        $shifts = Shift::withCount('users')->get();

        return view('livewire.pages.shifts', compact('shifts'));
    }
}

