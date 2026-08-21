<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $tags = [
            ['slug' => 'website', 'name' => 'Website'],
            ['slug' => 'seo', 'name' => 'SEO'],
            ['slug' => 'responsive', 'name' => 'Responsive'],
            ['slug' => 'branding', 'name' => 'Branding'],
            ['slug' => 'rental-mobil', 'name' => 'Rental Mobil'],
            ['slug' => 'whatsapp', 'name' => 'WhatsApp'],
            ['slug' => 'booking', 'name' => 'Booking'],
        ];

        Tag::query()->whereNotIn('slug', array_column($tags, 'slug'))->delete();

        foreach ($tags as $tag) {
            Tag::firstOrCreate(['slug' => $tag['slug']], $tag);
        }
    }
}
