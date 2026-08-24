<?php
namespace App\Livewire\Pages;
use App\Models\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Attendee extends Component
{
    use WithPagination;

    public string $search = '';
    public function render()
    {
        $logs = Log::with('user')->when($this->search != '',function($query){
            $query->whereHas('user',function($q){
                $q->where('name', 'like', '%'.$this->search. '%')
                    ->orWhere('email', 'like', '%'.$this->search .'%');
            });
        })->latest()->paginate(10);
        return view('livewire.pages.attendee',[
            'logs' => $logs
        ]);
    }
}
