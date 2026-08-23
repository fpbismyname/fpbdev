<?php

return [
    'pages' => [
        'index' => [
            'hero' => [
                'badge' => [
                    'label' => 'Website untuk Bisnis Rental',
                    'icon' => 'o-truck',
                ],
                'headline' => 'Buat Bisnis Rental Mobil Anda Tampil Lebih Profesional',
                'subheadline' => 'Tampilkan armada, harga, dan informasi rental dalam satu website yang mudah digunakan. Pelanggan dapat melihat pilihan kendaraan dan langsung menghubungi Anda melalui WhatsApp.',
                'image' => 'storage/hero.webp',
                'ctaButtons' => [
                    [
                        'label' => 'Konsultasi Gratis',
                        'value' => '#contact',
                        'variant' => 'btn-primary',
                    ],
                    [
                        'label' => 'Lihat Paket',
                        'value' => '#pricing',
                        'variant' => '',
                    ],
                ],
                'mockup' => [
                    'brand' => 'RentalKu',
                    'headline' => 'Sewa Mobil Mudah & Terpercaya',
                    'cta' => 'Chat WhatsApp',
                    'sectionLabel' => 'Katalog Armada',
                    'cars' => [
                        [
                            'name' => 'Toyota Avanza',
                            'transmission' => 'Matic',
                            'seats' => '7 Penumpang',
                            'price' => 'Rp350rb/hari',
                            'icon' => 'toyota',
                        ],
                        [
                            'name' => 'Honda Brio',
                            'transmission' => 'Manual',
                            'seats' => '5 Penumpang',
                            'price' => 'Rp300rb/hari',
                            'icon' => 'honda',
                        ],
                        [
                            'name' => 'Toyota Innova',
                            'transmission' => 'Matic',
                            'seats' => '7 Penumpang',
                            'price' => 'Rp500rb/hari',
                            'icon' => 'toyota',
                        ],
                    ],
                    'featuresLabel' => 'Kenapa Pilih Kami',
                    'features' => [
                        [
                            'icon' => 'o-shield-check',
                            'label' => 'Armada Terawat',
                        ],
                        [
                            'icon' => 'o-currency-dollar',
                            'label' => 'Harga Transparan',
                        ],
                        [
                            'icon' => 'o-clock',
                            'label' => 'Layanan 24 Jam',
                        ],
                    ],
                    'testimonial' => [
                        'quote' => 'Pemesanan mudah, mobil bersih dan siap pakai. Sangat recommended!',
                        'name' => 'Budi, Jakarta',
                    ],
                    'ctaBanner' => [
                        'text' => 'Siap Jalan? Booking Sekarang',
                        'button' => 'Reservasi',
                    ],
                ],
            ],

            'features' => [
                'badge' => 'Mengapa Memilih Kami?',
                'headline' => 'Website yang Dirancang untuk Kebutuhan Rental Mobil',
                'subheadline' => 'Bukan sekadar menampilkan informasi. Website dibuat untuk membantu calon pelanggan menemukan armada, memahami layanan, dan menghubungi bisnis Anda dengan lebih mudah.',
                'image' => 'storage/features.webp',
                'items' => [
                    [
                        'label' => 'Tampilkan Armada dengan Profesional',
                        'value' => 'Tampilkan foto, spesifikasi, harga, dan informasi setiap kendaraan secara rapi agar pelanggan lebih mudah menentukan pilihan.',
                        'icon' => 'm-photo',
                    ],
                    [
                        'label' => 'Langsung Terhubung ke WhatsApp',
                        'value' => 'Calon pelanggan dapat langsung menghubungi Anda dari halaman kendaraan tanpa perlu mencari nomor kontak terlebih dahulu.',
                        'icon' => 'm-chat-bubble-left-right',
                    ],
                    [
                        'label' => 'Mudah Dikelola',
                        'value' => 'Tambah atau perbarui armada, harga, promo, dan konten website melalui panel admin tanpa perlu coding.',
                        'icon' => 'm-adjustments-horizontal',
                    ],
                ],
            ],

            'services' => [
                'badge' => 'Layanan Rental Mobil',
                'headline' => 'Solusi Website Sesuai Kebutuhan Rental Anda',
                'subheadline' => 'Mulai dari website sederhana untuk mempromosikan armada hingga website dengan fitur dan kebutuhan khusus untuk bisnis rental yang lebih berkembang.',
                'image' => 'storage/services.webp',
            ],

            'portfolio' => [
                'badge' => 'Portfolio',
                'headline' => 'Website Telah yang Kami Kerjakan',
                'subheadline' => 'Lihat website yang kami rancang untuk membantu bisnis tampil lebih profesional dan memberikan pengalaman yang lebih baik bagi calon pelanggan.',
            ],

            'pricing' => [
                'badge' => 'Paket Website Rental',
                'headline' => 'Pilih Paket yang Sesuai dengan Kebutuhan Anda',
                'subheadline' => 'Mulai dari website sederhana untuk menampilkan armada hingga solusi yang lebih lengkap untuk kebutuhan bisnis rental yang berkembang.',
                'customApp' => [
                    'title' => 'Membutuhkan Fitur yang Lebih Spesifik?',
                    'description' => 'Paket Business dapat dikembangkan sesuai proses bisnis Anda, termasuk kebutuhan seperti booking, pengecekan ketersediaan kendaraan, pengelolaan durasi rental, dan integrasi pembayaran.',
                    'button' => [
                        'label' => 'Diskusikan Kebutuhan Anda',
                        'value' => '#contact',
                    ],
                ],
            ],

            'about' => [
                'badge' => 'Tentang Kami',
                'headline' => 'Partner Digital untuk Bisnis Rental Mobil',
                'subheadline' => 'FPBDEV membantu bisnis rental mobil membangun website yang profesional, mudah dikelola, dan sesuai dengan kebutuhan bisnis Anda.',
                'image' => 'storage/about.jpeg',
                'points' => [
                    [
                        'label' => 'Memahami Kebutuhan Rental',
                        'value' => 'Struktur website dirancang dengan fokus pada armada, informasi layanan, harga, dan kemudahan pelanggan untuk menghubungi bisnis Anda.',
                        'icon' => 'o-truck',
                    ],
                    [
                        'label' => 'Dari Katalog hingga Booking',
                        'value' => 'Mulai dari katalog armada dan WhatsApp hingga fitur booking yang lebih lengkap sesuai kebutuhan bisnis.',
                        'icon' => 'o-calendar-days',
                    ],
                    [
                        'label' => 'Mudah Dikelola',
                        'value' => 'Kelola armada, harga, promo, dan konten website melalui panel admin tanpa perlu bergantung pada developer untuk perubahan sederhana.',
                        'icon' => 'o-wrench-screwdriver',
                    ],
                ],
            ],

            'faq' => [
                'badge' => 'FAQ',
                'headline' => 'Pertanyaan Seputar Website Rental Mobil',
                'subheadline' => 'Beberapa pertanyaan yang sering ditanyakan sebelum memulai pembuatan website.',

                'items' => [
                    [
                        'question' => 'Apa perbedaan Paket Starter, Professional, dan Business?',
                        'answer' => 'Starter cocok untuk kebutuhan promosi sederhana. Professional ditujukan untuk bisnis yang membutuhkan website lengkap dengan katalog armada. Business dapat dikembangkan dengan fitur khusus sesuai kebutuhan, termasuk sistem booking dan integrasi pembayaran.',
                    ],
                    [
                        'question' => 'Apakah Starter dan Professional sudah memiliki booking online?',
                        'answer' => 'Kedua paket menggunakan alur inquiry melalui WhatsApp. Pelanggan dapat melihat informasi kendaraan dan langsung menghubungi Anda. Sistem booking dengan ketersediaan kendaraan, durasi, dan pembayaran dapat dikembangkan pada Paket Business.',
                    ],
                    [
                        'question' => 'Apakah domain dan hosting sudah termasuk?',
                        'answer' => 'Ketersediaan domain dan hosting dapat disesuaikan dengan paket dan kebutuhan proyek. Detail biaya awal dan biaya perpanjangan akan dijelaskan sebelum proyek dimulai.',
                    ],
                    [
                        'question' => 'Berapa lama proses pembuatan website?',
                        'answer' => 'Waktu pengerjaan bergantung pada paket dan kelengkapan materi seperti foto, informasi armada, harga, dan konten bisnis. Estimasi dan timeline akan disepakati sebelum pengerjaan dimulai.',
                    ],
                    [
                        'question' => 'Apakah saya bisa mengelola website sendiri?',
                        'answer' => 'Bisa. Website dengan panel admin memungkinkan Anda memperbarui armada, harga, promo, dan konten tertentu tanpa perlu coding. Kami juga dapat membantu memberikan panduan penggunaannya.',
                    ],
                ],
            ],

            'cta' => [
                'headline' => 'Siap Membuat Bisnis Rental Anda Tampil Lebih Profesional?',
                'subheadline' => 'Diskusikan kebutuhan website Anda bersama kami dan pilih paket yang paling sesuai dengan kondisi bisnis rental Anda.',
                'button' => [
                    'label' => 'Konsultasi Gratis',
                    'value' => 'contact.whatsapp',
                    'variant' => 'btn-lg',
                ],
            ],

            'blog' => [
                'badge' => 'Blog',
                'headline' => 'Tips dan Wawasan untuk Bisnis Rental Mobil',
                'subheadline' => 'Temukan informasi seputar website, digital marketing, dan strategi membangun kehadiran online untuk bisnis rental mobil.',
            ],
        ],
    ],
];
