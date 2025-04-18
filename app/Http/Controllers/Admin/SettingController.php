<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use App\Services\SettingService;
use App\Events\SettingsUpdated;

class SettingController extends Controller
{
    public function index()
    {
        $settings = app(SettingService::class)->all();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(SettingRequest $request)
    {
        $settings = $request->validated();

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Dispatch event to clear settings cache
        event(new SettingsUpdated());

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}