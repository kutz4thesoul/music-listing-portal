<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // This is here to load alpine on every page and prevent the multiple instances of Alpine running error on pages with livewire components
        \Livewire\Livewire::forceAssetInjection();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
