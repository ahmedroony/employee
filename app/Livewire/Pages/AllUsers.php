<?php
namespace App\Livewire\Pages;

use App\Http\Domains\Users\Actions\DeleteUserAction;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class AllUsers extends Component
{
    public function delete(DeleteUserAction $action, $id)
    {
        $action->execute($id);
        session()->flash('success', 'تم حذف المستخدم بنجاح');
    }

    public function render()
    {
        $users = User::with('user_type')->get();
        return view('livewire.pages.users', compact('users'));
    }
}
?>

