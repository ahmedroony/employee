<?php

namespace App\Livewire\Pages;

use App\Http\Domains\Attendance\Actions\GetAttendanceLogsAction;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class Attendee extends Component
{
    use WithPagination;

    public string $search = '';

    protected array $rules = [
        'search' => 'nullable|string|max:255',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $logs = (new GetAttendanceLogsAction())->execute($this->search);

        return view('livewire.pages.attendee', [
            'logs' => $logs,
        ]);
    }
}
