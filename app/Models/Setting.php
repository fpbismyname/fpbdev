<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[Fillable([
    'name',
    'tagline',
    'description',
    'social_media',
    'contact',
])]
class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $casts = [
        'social_media' => 'array',
        'contact' => 'array',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('settings'));
        static::deleted(fn () => Cache::forget('settings'));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo')->singleFile();
    }
}
