<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

if (! function_exists('settings')) {
    function settings(string $key, mixed $default = null)
    {
        $settingValue = Cache::rememberForever('settings', fn () => Setting::with('media')->first()?->toArray() ?? []);

        if (str_starts_with($key, 'media.')) {
            [$relation, $collection, $column] = explode('.', $key);
            $data = collect(array_filter($settingValue[$relation] ?? [], fn ($item) => $item['collection_name'] == $collection))->values()->first();

            return $data[$column] ?? $default;
        }

        if (str_contains($key, '.')) {
            [$column, $itemKey] = array_pad(explode('.', $key, 2), 2, null);
            if ($itemKey !== null && is_array($settingValue[$column] ?? null)) {
                $item = collect($settingValue[$column])->first(fn ($entry) => Str::slug($entry['name'] ?? '') === $itemKey);
                if ($item) {
                    return $item['value'] ?? $item['url'] ?? $default;
                }
            }
        }

        return $settingValue[$key] ?? $default;
    }
}
