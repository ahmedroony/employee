<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Domains\employeedashboard\EmployeeDashboard;
class autoCloseShift extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shiftcommand:auto-close-shift';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'detect the shifts that not close by users and autoclose it';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employeeDashboard = new EmployeeDashboard();
        $employeeDashboard->autoCloseShift();
    }
}
