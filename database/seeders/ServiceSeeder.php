<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $services = [
            [
                'slug' => 'website-rental-mobil',
                'name' => 'Website Rental Mobil',
                'description' => 'Website profesional untuk memperkenalkan bisnis, layanan, lokasi, kontak, dan informasi rental Anda.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'katalog-armada',
                'name' => 'Katalog Armada',
                'description' => 'Tampilkan mobil, foto, spesifikasi, harga, dan informasi kendaraan secara rapi agar pelanggan lebih mudah memilih.',
                'sort_order' => 2,
            ],
            [
                'slug' => 'sistem-rental-custom',
                'name' => 'Sistem Rental Custom',
                'description' => 'Kembangkan website dengan fitur khusus seperti booking, ketersediaan kendaraan, durasi rental, atau integrasi pembayaran.',
                'sort_order' => 3,
            ],
        ];

        Service::whereNotIn('slug', array_column($services, 'slug'))->delete();

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
