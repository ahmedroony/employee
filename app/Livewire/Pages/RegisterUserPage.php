<?php

namespace App\Livewire\Pages;

use App\Http\Domains\RegisterUser\RegisterUser;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class RegisterUserPage extends Component
{
    public $name;

    public $email;

    public $password;

    public function mount()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function storeuser(RegisterUser $service)
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($service->storeuser($validatedData)) {
            return $this->redirectRoute('login',navigate: true);
        }
        session()->flash('error', 'حدث خطأ أثناء التسجيل، يرجى المحاولة مرة أخرى.');
    }

    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
