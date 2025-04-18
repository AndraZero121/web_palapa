<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SettingServiceProvider extends ServiceProvider
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
        // Defer settings loading until after application is booted
        $this->app->booted(function () {
            try {
                // Skip during console commands or testing
                if ($this->app->runningInConsole()) {
                    return;
                }

                // Directly check if settings table exists with a query
                try {
                    $tableExists = $this->app['db']->connection()->getSchemaBuilder()->hasTable('settings');
                    if (!$tableExists) {
                        return;
                    }

                    $settings = Setting::all()->pluck('value', 'key')->toArray();
                    View::share('settings', $settings);
                } catch (\Exception $e) {
                    // Database connection might not be ready
                    report($e);
                }
            } catch (\Exception $e) {
                // Fail silently if any error occurs
                report($e);
            }
        });
    }
}
