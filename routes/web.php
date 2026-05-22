<?php

use App\Http\Controllers\AdminController;
use App\Livewire\Pages\Create;
use App\Livewire\Pages\Edit;
use App\Livewire\Pages\Shifts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/shifts', Shifts::class)->name('admin.shifts');
Route::get('/admin/create', Create::class)->name('admin.shifts.create');
Route::get('/shifts/{id}/edit', Edit::class)->name('admin.shifts.edit');
