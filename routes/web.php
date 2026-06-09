<?php

use App\Http\Controllers\AdminController;
use App\Livewire\Pages\CreateShift;
use App\Livewire\Pages\EditShift;
use App\Livewire\Pages\AllShifts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/shifts', AllShifts::class)->name('admin.shifts');
Route::get('/admin/create', CreateShift::class)->name('admin.shifts.create');
Route::get('/shifts/{id}/edit', EditShift::class)->name('admin.shifts.edit');
