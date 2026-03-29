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
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        try {
            $setting = \Illuminate\Support\Facades\Cache::rememberForever('site_setting', function () {
                // If it fails initially, it prevents migrations from breaking
                try {
                    return SiteSetting::first() ?? new SiteSetting();
                } catch (\Exception $e) {
                    return new SiteSetting();
                }
            });
            View::share('setting', $setting);
        } catch (\Exception $e) {
            // Suppress errors during initial migrations
        }

        // Cache Invalidation Observers
        $clearHomePageCache = function () {
            \Illuminate\Support\Facades\Cache::forget('homepage_data');
        };

        $models = [
            \App\Models\Service::class,
            \App\Models\Project::class,
            \App\Models\Testimonial::class,
            \App\Models\Blog::class,
            \App\Models\Faq::class,
        ];

        foreach ($models as $model) {
            $model::saved($clearHomePageCache);
            $model::deleted($clearHomePageCache);
        }

        SiteSetting::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('site_setting');
        });
    }
}
