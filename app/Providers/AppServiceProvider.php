<?php

namespace App\Providers;

use App\Models\Sector;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['layouts.app', 'site.*'], function ($view) {
            $view->with([
                'siteSetting' => Setting::current(),
                'navServices' => Service::where('is_active', true)->orderBy('order')->get(),
                'navSectors' => Sector::orderBy('order')->get(),
            ]);
        });
    }
}
