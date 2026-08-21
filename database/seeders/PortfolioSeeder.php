<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $portfolios = [
            [
                'slug' => 'kopi-nusantara',
                'name' => 'Toko Online Kopi Nusantara',
                'description' => 'Website e-commerce untuk penjualan kopi nusantara dengan katalog produk, keranjang belanja, dan pembayaran terintegrasi.',
                'client' => 'Kopi Nusantara',
                'url' => 'https://kopinusantara.example.com',
            ],
            [
                'slug' => 'hotel-grand-asia',
                'name' => 'Company Profile Hotel Grand Asia',
                'description' => 'Website resmi hotel dengan informasi kamar, fasilitas, dan form pemesanan yang mudah diakses dari berbagai perangkat.',
                'client' => 'Hotel Grand Asia',
                'url' => 'https://hotelgrandasia.example.com',
            ],
            [
                'slug' => 'klinik-sehat-medika',
                'name' => 'Sistem Pemesanan Klinik Sehat',
                'description' => 'Aplikasi web pemesanan jadwal konsultasi dengan notifikasi otomatis dan dashboard antrean untuk pasien.',
                'client' => 'Klinik Sehat Medika',
                'url' => 'https://kliniksehatmedika.example.com',
            ],
            [
                'slug' => 'batik-indah-collection',
                'name' => 'E-Commerce Batik Indah Collection',
                'description' => 'Toko online fashion batik dengan galeri produk, fitur ukuran, dan promo musiman untuk meningkatkan penjualan.',
                'client' => 'Batik Indah Collection',
                'url' => 'https://batikindah.example.com',
            ],
            [
                'slug' => 'smk-harapan-bangsa',
                'name' => 'Website Sekolah SMK Harapan',
                'description' => 'Portal informasi sekolah dengan berita kegiatan, pengumuman PPDB online, dan profil tenaga pengajar.',
                'client' => 'SMK Harapan Bangsa',
                'url' => 'https://smkharapanbangsa.example.com',
            ],
            [
                'slug' => 'umkm-bersinar',
                'name' => 'Landing Page Kampanye UMKM',
                'description' => 'Landing page kampanye pemberdayaan UMKM dengan halaman pendaftaran dan integrasi WhatsApp untuk konversi.',
                'client' => 'Program UMKM Bersinar',
                'url' => 'https://umkmbersinar.example.com',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(['slug' => $portfolio['slug']], $portfolio);
        }
    }
}
