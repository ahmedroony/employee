<?php

namespace App\Livewire\Pages;

use App\Http\Domains\EmployeeDashboardService\EmployeeDashboard;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class EmployeeDashboardPage extends Component
{
    public $login_time;

    public $logout_time;

    public $shifts;

    public $officaltimeshift;

    public $errorMessage;

    
    public function startShift(EmployeeDashboard $employeeDashboard)
    {
        $this->errorMessage = null;
        $success = $employeeDashboard->startShift();
        if (! $success) {
            $this->errorMessage = 'أنت تعمل بالفعل في شفت مفتوح ولا يمكنك بدء شفت جديد.';
            return;
        }
        $this->login_time = $employeeDashboard->getDateAndTimeShift();
    }

    public function endShift(EmployeeDashboard $employeeDashboard)
    {
        $employeeDashboard->endShift();
    }

    public function continueOvertime(EmployeeDashboard $employeeDashboard)
    {
        $employeeDashboard->continueOvertime();
    }

    public function mount(EmployeeDashboard $employeeDashboard)
    {
        $this->shifts = auth()->user()->shifts;
        $this->login_time = $employeeDashboard->getDateAndTimeShift();
        $this->logout_time = $employeeDashboard->getDateAndTimeEndShift();
    }

    public function render()
    {
        return view('livewire.users.employee-dashboard');
    }
}
