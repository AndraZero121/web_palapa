<?php

namespace App\Console\Commands;

use App\Services\SettingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RefreshWebsiteCache extends Command
{
    protected $signature = 'website:refresh-cache';
    protected $description = 'Refresh the website cache';

    public function handle()
    {
        // Clear settings cache
        app(SettingService::class)->clearCache();

        // Clear other caches if needed
        Cache::forget('latest_news');
        Cache::forget('gallery_items');

        $this->info('Website cache refreshed successfully!');

        return self::SUCCESS;
    }
}