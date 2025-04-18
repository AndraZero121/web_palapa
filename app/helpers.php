<?php

use App\Services\SettingService;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return app(SettingService::class)->get($key, $default);
    }
}
