<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Actions\ShiftService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Allshifts extends Component
{
    public function deleteShift(ShiftService $repository, $id)
    {
        $repository->delete($id);
        session()->flash('success', 'تم حذف الشفت بنجاح!');
    }
    //render working automatic when i open the page everyTime
    public function render(ShiftService $repository)
    {
        $shifts = $repository->getAll();
        return view('livewire.pages.shifts', compact('shifts'));
    }
}
