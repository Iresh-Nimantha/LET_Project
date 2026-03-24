<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

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
        try {
            if (Schema::hasTable('site_settings')) {
                View::share('setting', SiteSetting::first() ?? new SiteSetting());
            }
        } catch (\Exception $e) {
            // Suppress errors during initial migrations
        }
    }
}
