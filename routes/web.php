<?php

use App\Livewire\Pages\AllShifts;
use App\Livewire\Pages\AllUsers;
// Users Routes
use App\Livewire\Pages\CreateShift;
use App\Livewire\Pages\CreateUser;
use App\Livewire\Pages\EditShift;
// Shifts Routes
use App\Livewire\Pages\EditUser;
use App\Livewire\Pages\employedashboard;
use App\Livewire\Pages\login;
// register,logout,login
use App\livewire\Pages\Logout;
use App\Livewire\Pages\RegisterUserPage;
use App\Livewire\Pages\showUsersShift;
// employee dashboard routes
use Illuminate\Support\Facades\Route;
// Shifts Routes
Route::middleware(['auth','adminAuth:admin'])->group(function () {

    Route::get('/admin/shifts', AllShifts::class)->name('admin.shifts');
    Route::get('/admin/create', CreateShift::class)->name('admin.shifts.create');
    Route::get('/shifts/{id}/edit', EditShift::class)->name('admin.shifts.edit');
    Route::get('/shifts/{id}/showusers', showUsersShift::class)->name('admin.shifts.showusersshift');

    // Users Routes
    Route::get('/admin/users', AllUsers::class)->name('admin.users');
    Route::get('/admin/users/create', CreateUser::class)->name('admin.users.create');
    Route::get('/admin/users/{id}/edit', EditUser::class)->name('admin.users.edit');
});
// register,logout,login
Route::get('/register', RegisterUserPage::class)->name('register');
Route::get('/logout', Logout::class)->name('logout');
Route::get('/login', login::class)->name('login');

// employee dashboard routes
Route::middleware('auth')->group(function () {
    Route::get('/employee/dashboard', employedashboard::class)->name('employee.dashboard');
    Route::get('/', function () {
        return view('home');
    })->name('welcome');
});
