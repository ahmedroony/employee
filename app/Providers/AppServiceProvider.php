<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Domains\Shifts\Repositories\ShiftRepository;
use App\Http\Domains\Shifts\Repositories\ShiftRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ShiftRepositoryInterface::class,ShiftRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
