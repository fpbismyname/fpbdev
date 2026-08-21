<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Setting::updateOrCreate(
            ['name' => 'FPBDEV'],
            [
                'tagline' => 'Website Profesional untuk Bisnis Anda',
                'description' => 'Jasa Pembuatan Website Profesional untuk Bisnis Anda.',
                'social_media' => [
                    ['name' => 'Facebook', 'icon' => 'simpleicons-facebook', 'url' => 'https://facebook.com/fpbdev'],
                    ['name' => 'Instagram', 'icon' => 'simpleicons-instagram', 'url' => 'https://instagram.com/fpbdev'],
                    ['name' => 'LinkedIn', 'icon' => 'simpleicons-linkedin', 'url' => 'https://linkedin.com/company/fpbdev'],
                    ['name' => 'X', 'icon' => 'simpleicons-x', 'url' => 'https://x.com/fpbdev'],
                ],
                'contact' => [
                    ['name' => 'Email', 'icon' => 'heroicon-o-envelope', 'value' => 'halo@fpbdev.com'],
                    ['name' => 'WhatsApp', 'icon' => 'heroicon-o-device-phone-mobile', 'value' => '+62 812-3456-7890'],
                    ['name' => 'Alamat', 'icon' => 'heroicon-o-map-pin', 'value' => 'Jl. Merdeka No. 12, Bandung'],
                    ['name' => 'Jam Operasional', 'icon' => 'heroicon-o-clock', 'value' => 'Senin–Jumat, 09.00–17.00 WIB'],
                ],
            ]
        );
    }
}
