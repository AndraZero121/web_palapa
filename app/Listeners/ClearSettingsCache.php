<?php

namespace App\Listeners;

use App\Events\SettingsUpdated;
use App\Services\SettingService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClearSettingsCache
{
    public function __construct()
    {
        //
    }

    public function handle(SettingsUpdated $event)
    {
        app(SettingService::class)->clearCache();
    }
}