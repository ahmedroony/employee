<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Shifts;
use App\Livewire\Pages\Create;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/shifts', Shifts::class)->name('admin.shifts');
Route::get('/admin/create', Create::class)->name('Create.shifts');
// Route::post('/admin', store::class)->name('store.shifts');
