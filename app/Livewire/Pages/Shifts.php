<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Shifts\Repositories\ShiftRepositoryInterface;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Shifts extends Component
{
    public function render(ShiftRepositoryInterface $repository)
    {
        $shifts = $repository->getAllShifts();
        return view('livewire.pages.shifts', compact('shifts'));
    }
}
