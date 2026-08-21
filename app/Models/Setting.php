<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo')->singleFile();
    }
}
