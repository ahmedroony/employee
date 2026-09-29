<?php

namespace App\Livewire\Pages;

use App\Http\Domains\employeedashboard\EmployeeDashboard;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class employedashboard extends Component
{
    public $login_time;
    public $shifts;
    public $officaltimeshift;

    public function startShift()
    {
        $employeeDashboard = app(EmployeeDashboard::class);
        $employeeDashboard->startShift();
    }

    public function endShift(EmployeeDashboard $employeeDashboard)
    {
        $employeeDashboard->endShift();
    }
    
    public function mount(EmployeeDashboard $employeeDashboard)
    {
        $this->shifts = auth()->user()->shifts;
        $this->login_time = $employeeDashboard->getCurrentWorkDuration();
        $this->officaltimeshift = $employeeDashboard->getcurrentTimeShift();
    }

    public function render()
    {
        return view('livewire.users.employee-dashboard');
    }



}
