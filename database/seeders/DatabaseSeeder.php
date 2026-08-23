<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password'), 'role' => Role::ADMIN]
        );
        User::updateOrCreate(
            ['email' => 'owner@example.com'],
            ['name' => 'Owner', 'password' => bcrypt('password'), 'role' => Role::OWNER]
        );
        User::updateOrCreate(
            ['email' => 'editor@example.com'],
            ['name' => 'Editor', 'password' => bcrypt('password'), 'role' => Role::EDITOR]
        );

        $this->call([
            SettingsSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PricingSeeder::class,
            PostSeeder::class,
        ]);
    }
}
