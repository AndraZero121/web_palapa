<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function get($key, $default = null)
    {
        $settings = Cache::remember('website_settings', 86400, function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }

    public function all()
    {
        return Cache::remember('website_settings', 86400, function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });
    }

    public function clearCache()
    {
        Cache::forget('website_settings');
    }
}