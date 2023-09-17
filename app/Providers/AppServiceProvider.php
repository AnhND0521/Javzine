<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('Javzine/livewire/update', $handle);
        });
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('Javzine/livewire/livewire.js', $handle);
        });
        
    }
}
