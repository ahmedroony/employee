<?php

use App\Http\Middleware\CheckUserRole;
use App\Livewire\Pages\AllShifts;
// Users Routes
use App\Livewire\Pages\AllUsers;
use App\Livewire\Pages\CreateShift;
use App\Livewire\Pages\CreateUser;
// Shifts Routes
use App\Livewire\Pages\EditShift;
use App\Livewire\Pages\EditUser;
use App\Livewire\Pages\showUsersShift;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Shifts Routes
Route::middleware('adminAuth')->group(function () {

    Route::get('/admin/shifts', AllShifts::class)->name('admin.shifts');
    Route::get('/admin/create', CreateShift::class)->name('admin.shifts.create');
    Route::get('/shifts/{id}/edit', EditShift::class)->name('admin.shifts.edit');
    Route::get('/shifts/{id}/showusers', showUsersShift::class)->name('admin.shifts.showusersshift');

    // Users Routes
    Route::get('/admin/users', AllUsers::class)->name('admin.users');
    Route::get('/admin/users/create', CreateUser::class)->name('admin.users.create');
    Route::get('/admin/users/{id}/edit', EditUser::class)->name('admin.users.edit');
});
//register route
Route::get('/register',['RegisterUser']);
