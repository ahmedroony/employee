<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Users\Actions\StoreUserAction;
use App\Models\Shift;
use App\Models\UserType;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateUser extends Component
{
    public $name,$password,$email;
    public $user_type_id;
    public $userTypes = [];
    public $shifts = []; // This holds all available shifts from the DB
    public $selected_shifts = []; // This holds the IDs the user selects

    public function mount()
    {
        $this->shifts = Shift::withCount('users')->get(); // Load all shifts
        $this->userTypes = UserType::all();
    }

    public function store(StoreUserAction $action)
    {
        $validated = $this->validate([
            'name' => 'required|string|max:50|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'user_type_id' => 'required|exists:user_types,id',
            'selected_shifts' => 'nullable|array',
            'selected_shifts.*' => 'exists:shifts,id'
        ]);

        $validated['shifts'] = $validated['selected_shifts'];

        $action->execute($validated);

        return redirect()->route('admin.users')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    public function render()
    {
        return view('livewire.pages.create-user');
    }
}

