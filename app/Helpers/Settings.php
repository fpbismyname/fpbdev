<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('settings')) {
    function settings(string $key, mixed $default = null)
    {
        Cache::forget('settings');
        $settingValue = Cache::rememberForever('settings', fn () => Setting::with('media')->first()->toArray());
        if (str_contains($key, 'media.')) {
            [$relation, $collection, $column] = explode('.', $key);
            $data = collect(array_filter($settingValue[$relation], fn ($item) => $item['collection_name'] == $collection))->values()->first();

            return $data[$column] ?? $default;
        }

        return $settingValue[$key] ?? $default;

    }
}
