<?php

namespace App\Providers;

use App\Models\News;
use App\Models\GalleryItem;
use App\Observers\NewsObserver;
use App\Observers\GalleryItemObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\FilesystemServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Ensure core providers are properly registered
        $this->app->register(FilesystemServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Defer database operations until after full boot
        $this->app->booted(function() {
            if (! $this->app->runningInConsole()) {
                Schema::defaultStringLength(191);

                // Register model observers
                News::observe(NewsObserver::class);
                GalleryItem::observe(GalleryItemObserver::class);
            }
        });
    }
}
