<?php
namespace App\Livewire\Pages;

use App\Models\Shift;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class showUsersShift extends Component
{
    public $shift;
    public $shiftId;

    public function mount($id)
    {
        $this->shiftId = $id;
        $this->shift = Shift::with('users')->findOrFail($id);
    }
    //render is a method that returns the view for the component. It is called automatically by Livewire when the component is rendered.
    public function render()
    {
        return view('livewire.pages.show-users-shift');
    }
}

