<?php
namespace App\Livewire\Pages;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Http\Request;
#[Layout('layouts.app')]
class login extends Component
{
    public $email;
    public $password;

    public function mount()
    {
        $this->email = '';
        $this->password = '';
    }

    public function login(Request $request)
    {
        $request = $this->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if (Auth::attempt($request)) {
            session()->regenerate();
            return redirect()->route('employee.dashboard');
        }

        session()->flash('error', 'Invalid credentials.');
    }

    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
