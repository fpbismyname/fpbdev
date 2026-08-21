<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            ['slug' => 'web-design', 'name' => 'Web Design'],
            ['slug' => 'digital-marketing', 'name' => 'Digital Marketing'],
            ['slug' => 'business-tips', 'name' => 'Tips Bisnis'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
