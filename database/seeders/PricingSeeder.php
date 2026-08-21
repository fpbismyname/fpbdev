<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $pricings = [
            [
                'slug' => 'rental-starter',
                'name' => 'Starter',
                'description' => 'Landing page fokus 1 mobil unggulan untuk promosi & iklan.',
                'price' => 1200000,
                'features' => [
                    '1 Landing Page promo mobil unggulan',
                    'Domain .com (1 tahun) + Hosting cepat & aman',
                    'Desain responsif mobile',
                    'Galeri foto & spesifikasi unit',
                    'CTA WhatsApp untuk inquiry/booking',
                    'Optimasi SEO dasar',
                    'Video tutorial pengelolaan website',
                    'Biaya langganan tahunan (server & domain): Rp50rb/bulan (mulai tahun ke-2)',
                ],
            ],
            [
                'slug' => 'rental-professional',
                'name' => 'Professional',
                'description' => 'Website lengkap company profile + katalog armada + artikel untuk rental mobil.',
                'price' => 1700000,
                'features' => [
                    'Semua fitur Starter',
                    'Company Profile multi-halaman',
                    'Katalog armada lengkap + filter & pencarian',
                    'Halaman pricing, FAQ, & blog/artikel',
                    'Hingga 50 unit armada',
                    'Optimasi SEO lengkap',
                    'Prioritas dukungan',
                    'Biaya langganan tahunan (server & domain): Rp70rb/bulan (mulai tahun ke-2)',
                ],
            ],
            [
                'slug' => 'rental-custom',
                'name' => 'Custom',
                'description' => 'Mulai Rp3.500.000 — full website + booking system custom sesuai kebutuhan.',
                'price' => 3500000,
                'features' => [
                    'Semua fitur Professional',
                    'Booking online custom (kalender availability)',
                    'Durasi rental, deposit & kalkulasi harga otomatis',
                    'Integrasi payment gateway (Midtrans/Xendit)',
                    'Notifikasi WhatsApp & dashboard admin',
                    'Fitur custom sesuai kebutuhan armada',
                    'Biaya langganan tahunan (server & domain): Rp100rb/bulan (mulai tahun ke-2)',
                ],
            ],
        ];

        Pricing::whereNotIn('slug', array_column($pricings, 'slug'))->delete();

        foreach ($pricings as $pricing) {
            Pricing::updateOrCreate(
                ['slug' => $pricing['slug']],
                $pricing
            );
        }
    }
}
