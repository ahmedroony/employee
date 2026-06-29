<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Users\Actions\UpdateUserAction;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditUser extends Component
{
    public $user_id;

    public $name;

    public $email;

    public $password;

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function edituser(UpdateUserAction $action)
    {
        $data = $this->validate([
            'name' => 'required|string|max:50|unique:users,name,'.$this->user_id,
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            'password' => 'nullable|min:8',
        ]);
        $action->execute($this->user_id, $data);
        session()->flash('success','تم تعديل بيانات المستخدم بنجاح');
        return redirect()->route('admin.users');
    }
    public function render(){
        return view('livewire.pages.edit-user');
    }
}

