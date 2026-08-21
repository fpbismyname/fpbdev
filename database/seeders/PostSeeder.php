<?php

namespace Database\Seeders;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $posts = [
            [
                'slug' => 'kenapa-bisnis-rental-mobil-perlu-website',
                'category' => 'web-design',
                'tags' => ['website', 'rental-mobil'],
                'title' => 'Kenapa Bisnis Rental Mobil Perlu Website?',
                'excerpt' => 'Mengandalkan status WhatsApp saja membuat bisnis rental terlihat kurang meyakinkan. Ini alasan kenapa website jadi langkah penting untuk naik kelas.',
                'content' => '<p>Banyak pemilik rental mobil mengandalkan status WhatsApp dan broadcast grup untuk menjangkau pelanggan. Cara ini memang berjalan, tetapi jangkauannya terbatas pada orang yang sudah mengenal bisnis Anda.</p><p>Padahal sebagian besar calon penyewa memulai pencariannya dari internet. Tanpa kehadiran di sana, bisnis Anda tidak ikut bersaing di momen paling penting: saat orang sedang mencari.</p><h2>Calon Penyewa Mencari Lewat Internet</h2><p>Sebelum menghubungi, calon penyewa biasanya mengetik "rental mobil dekat saya" di mesin pencari. Website membuat bisnis Anda muncul di pencarian tersebut, bukan hanya bergantung pada rekomendasi mulut ke mulut.</p><h2>Kesan Profesional yang Membangun Kepercayaan</h2><p>Website yang rapi menunjukkan bahwa bisnis Anda dikelola dengan serius. Informasi armada, harga, dan syarat sewa yang tersusun lengkap juga menjawab pertanyaan yang sama berulang kali, sehingga percakapan dengan calon pelanggan menjadi lebih efisien.</p><h2>Informasi Bekerja 24 Jam</h2><p>Berbeda dengan admin yang punya jam istirahat, website selalu siap menampilkan daftar armada beserta spesifikasi, harga sewa dan ketentuannya, serta lokasi dan cara menghubungi. Calon penyewa bisa mengenal bisnis Anda kapan pun mereka luang waktu.</p><h2>Fondasi untuk Fitur Lanjutan</h2><p>Website tidak harus langsung lengkap. Mulai dari katalog sederhana, fitur bisa berkembang sesuai kebutuhan: tombol WhatsApp untuk mempercepat tanya jawab, hingga sistem booking online saat bisnis semakin ramai.</p><p>Pada akhirnya, website adalah aset yang bekerja diam-diam setiap hari. Semakin cepat hadir, semakin lama pula manfaatnya terkumpul untuk bisnis Anda.</p>',
                'published_at' => now()->subDays(10),
            ],
            [
                'slug' => 'memaksimalkan-katalog-armada-online',
                'category' => 'web-design',
                'tags' => ['website', 'responsive', 'rental-mobil'],
                'title' => 'Memaksimalkan Katalog Armada Online untuk Rental',
                'excerpt' => 'Katalog armada adalah etalase utama website rental. Pastikan setiap kendaraan tampil dengan informasi yang memudahkan calon penyewa memutuskan.',
                'content' => '<p>Katalog armada adalah halaman yang paling sering dibuka calon penyewa. Dari sanalah mereka menilai apakah kendaraan Anda cocok dengan kebutuhan dan anggarannya.</p><p>Sayangnya, banyak katalog hanya berisi foto dan nama mobil tanpa informasi penunjang. Padahal detail kecil sering kali menjadi penentu keputusan sewa.</p><h2>Foto yang Jujur dan Konsisten</h2><p>Gunakan foto asli kendaraan dengan gaya yang seragam antar unit, misalnya sudut dan latar yang sama. Foto yang konsisten membuat katalog terlihat rapi sekaligus memberi gambaran jujur kepada calon penyewa.</p><h2>Spesifikasi yang Paling Dicari</h2><p>Tampilkan informasi yang benar-benar menjadi pertimbangan: transmisi manual atau matic, kapasitas penumpang, serta tipe BBM dan tahun kendaraan. Data sederhana ini menyaring pertanyaan dan membantu calon penyewa memilih lebih cepat.</p><h2>Harga yang Transparan</h2><p>Cantumkan harga sewa harian beserta ketentuannya, misalnya apakah sudah termasuk sopir atau BBM. Harga yang jelas mengurangi chat "berapa harga?" yang berulang dan menyisakan calon penyewa yang benar-benar berniat.</p><h2>Nyaman Dibuka dari Ponsel</h2><p>Mayoritas calon penyewa membuka website dari ponsel, biasanya sambil bepergian. Pastikan katalog tetap mudah dibaca di layar kecil agar pengalaman melihat armada tidak terganggu.</p><p>Katalog yang informatif ibarat salesperson yang tidak pernah tidur. Semakin mudah calon penyewa mendapat jawaban, semakin besar peluang mereka melanjutkan ke percakapan.</p>',
                'published_at' => now()->subDays(8),
            ],
            [
                'slug' => 'tombol-whatsapp-di-website-rental',
                'category' => 'digital-marketing',
                'tags' => ['whatsapp', 'website'],
                'title' => 'Memanfaatkan Tombol WhatsApp di Website Rental',
                'excerpt' => 'Tombol WhatsApp mempersingkat jarak antara tertarik dan bertanya. Begini cara memaksimalkannya di website rental Anda.',
                'content' => '<p>WhatsApp sudah menjadi sarana komunikasi utama bisnis di Indonesia, termasuk rental mobil. Masalahnya, calon penyewa harus repot menyimpan nomor telepon terlebih dahulu sebelum bisa bertanya.</p><p>Di sinilah tombol WhatsApp di website berperan: menjembatani minat yang baru muncul dengan percakapan yang langsung terbuka.</p><h2>Satu Klik Langsung ke Chat</h2><p>Dengan tautan WhatsApp, obrolan terbuka begitu tombol ditekan. Tidak ada langkah tambahan yang membuat calon penyewa berpikir dua kali atau bahkan batal bertanya.</p><h2>Pesan Otomatis yang Membantu Admin</h2><p>Sertakan pesan bawaan seperti "Halo, saya tertarik dengan Toyota Avanza". Admin langsung tahu konteks percakapan tanpa perlu bertanya balik, dan calon penyewa merasa dilayani lebih cepat.</p><h2>Letak yang Strategis</h2><p>Tempatkan tombol WhatsApp di titik-titik keputusan:</p><ul><li>Pada setiap kartu armada</li><li>Di banner promosi atau paket harga</li><li>Di halaman kontak</li></ul><p>Semakin dekat tombol dengan informasi yang baru saja menarik perhatian, semakin natural pula langkah calon penyewa untuk menghubungi.</p><h2>Balas Cepat, Tutup Lebih Cepat</h2><p>Tombol hanya membuka pintu; kecepatan dan keramahan admin dalam membalas yang menutup transaksi. Pastikan notifikasi WhatsApp aktif dan siapa pun yang menjawab memahami harga serta syarat sewa.</p><p>Kombinasi website yang informatif dan WhatsApp yang responsif adalah pasangan sederhana namun ampuh untuk mengubah kunjungan menjadi pesanan.</p>',
                'published_at' => now()->subDays(6),
            ],
            [
                'slug' => 'seo-lokal-rental-mobil',
                'category' => 'digital-marketing',
                'tags' => ['seo', 'rental-mobil'],
                'title' => 'SEO Lokal agar Rental Mobil Mudah Ditemukan',
                'excerpt' => 'Sebagian besar calon penyewa mencari rental di sekitarnya. SEO lokal membantu website Anda muncul tepat saat mereka membutuhkan.',
                'content' => '<p>Bisnis rental mobil pada dasarnya bersifat lokal. Pelanggan Anda berada di kota yang sama, dan mereka mencari kendaraan di area tempat mereka akan berkendara.</p><p>Karena itu, strategi pencarian yang paling relevan bukan menjangkau seluruh negeri, melainkan memastikan bisnis muncul saat warga sekitar sedang mencari. Di sinilah SEO lokal berperan.</p><h2>Gunakan Kata Kunci Lokal</h2><p>Orang mencari "rental mobil Bandung", bukan sekadar "sewa mobil". Sebut nama kota dan area layanan Anda secara alami di judul dan isi halaman, tanpa perlu memaksakan pengulangan yang mengganggu kenyamanan membaca.</p><h2>Lengkapi Profil Google Business Profile</h2><p>Isi alamat, jam operasional, foto, dan nomor kontak pada profil Google Business Profile Anda. Profil yang lengkap berpeluang muncul di peta dan hasil pencarian lokal, lengkap dengan ulasan dari pelanggan sebelumnya.</p><h2>Konten yang Menjawab Pertanyaan Lokal</h2><p>Artikel seputar destinasi populer atau tips perjalanan di kota Anda membantu website ditemukan wisatawan yang sekaligus membutuhkan kendaraan. Konten seperti ini bekerja dua arah: mengedukasi sekaligus memperkenalkan layanan.</p><h2>Jaga Konsistensi Data Kontak</h2><p>Pastikan nama, alamat, dan nomor telepon sama persis di website, media sosial, dan direktori online. Konsistensi ini membantu mesin pencari yakin bahwa data tersebut valid dan layak ditampilkan.</p><p>SEO lokal bukan hasil instan, tetapi langkah-langkah di atas konsisten menggerakkan bisnis Anda naik perlahan di hasil pencarian — tepat di depan orang-orang yang paling mungkin menyewa.</p>',
                'published_at' => now()->subDays(4),
            ],
            [
                'slug' => 'tips-memotret-armada',
                'category' => 'business-tips',
                'tags' => ['branding', 'rental-mobil'],
                'title' => 'Tips Memotret Armada agar Menarik di Website',
                'excerpt' => 'Foto adalah hal pertama yang dilihat calon penyewa. Dengan teknik sederhana, foto armada Anda bisa tampil jauh lebih meyakinkan.',
                'content' => '<p>Sebelum membaca spesifikasi atau menanyakan harga, calon penyewa menilai dari foto. Gambar yang gelap dan acak-acakan membuat kendaraan bagus pun tampak kurang terawat.</p><p>Kabar baiknya, foto armada yang menarik tidak membutuhkan kamera mahal. Cukup perhatikan beberapa hal sederhana berikut.</p><h2>Manfaatkan Cahaya Alami</h2><p>Foto pada pagi atau sore hari saat cahaya lembut. Hindari memotret di tempat gelap atau silau karena detail kendaraan jadi hilang dan warna cat tidak tampil seadanya.</p><h2>Ambil Beberapa Sudut Penting</h2><p>Lengkapi katalog dengan foto:</p><ul><li>Eksterior dari sudut depan 45 derajat</li><li>Interior kursi dan dashboard</li><li>Ruang bagasi</li></ul><p>Dengan beberapa sudut ini, calon penyewa bisa membayangkan pengalaman berkendara tanpa perlu datang langsung ke lokasi.</p><h2>Latar Bersih dan Konsisten</h2><p>Pilih satu latar yang sama untuk semua unit, misalnya halaman kantor yang rapi. Konsistensi ini menciptakan kesan profesional sekaligus membuat katalog terlihat seperti satu kesatuan yang tertata.</p><h2>Pastikan Mobil Bersih Sebelum Difoto</h2><p>Mobil yang bersih dan kilap memberi kesan perawatan baik — hal yang justru paling dicari calon penyewa. Luangkan waktu sebentar untuk cuci mobil sebelum sesi foto dimulai.</p><p>Foto yang baik adalah bentuk investasi termurah untuk kredibilitas bisnis rental. Satu sesi foto yang rapi bisa dipakai berbulan-bulan di website maupun media sosial.</p>',
                'published_at' => now()->subDays(2),
            ],
            [
                'slug' => 'kapan-butuh-sistem-booking-online',
                'category' => 'business-tips',
                'tags' => ['booking', 'website'],
                'title' => 'Kapan Rental Mobil Butuh Sistem Booking Online?',
                'excerpt' => 'Sistem booking tidak selalu dibutuhkan sejak awal. Kenali tanda-tanda bisnis rental Anda siap naik level.',
                'content' => '<p>Dengar kata sistem booking online, banyak pemilik rental langsung membayangkan biaya besar dan teknologi rumit. Kenyataannya, tidak semua bisnis butuh itu sejak hari pertama.</p><p>Pertanyaannya bukan "kapan semua orang pakai sistem booking", melainkan "kapan bisnis saya yang membutuhkannya". Jawabannya ada pada tanda-tanda operasional sehari-hari.</p><h2>Mulai dari WhatsApp Saja Tidak Masalah</h2><p>Untuk armada yang masih sedikit, pencatatan manual lewat chat cukup membantu. Fokus dulu pada katalog yang informatif dan respons cepat — dua hal ini yang paling menentukan keputusan calon penyewa di tahap awal.</p><h2>Tanda Anda Siap Naik Level</h2><p>Beberapa sinyal bahwa sistem booking mulai dibutuhkan:</p><ul><li>Double booking sering terjadi</li><li>Jumlah armada semakin banyak</li><li>Admin kewalahan pada jam sibuk</li></ul><p>Jika satu atau lebih tanda ini muncul rutin, koordinasi manual mulai menggerus waktu dan meninggalkan ruang untuk kesalahan yang merugikan.</p><h2>Apa yang Ditawarkan Sistem Booking</h2><p>Kalender ketersediaan real-time mencegah double booking, pemilihan durasi sewa mempercepat proses, dan pembayaran deposit online mengurangi urusan administrasi. Semuanya mengambil alih pekerjaan berulang yang selama ini ditangani manual.</p><h2>Kembangkan Secara Bertahap</h2><p>Mulai dari katalog plus WhatsApp, lalu tambahkan fitur booking saat operasional menuntut. Website yang dirancang fleksibel akan memudahkan perkembangan ini tanpa perlu membangun ulang dari nol.</p><p>Naik level bukan soal mengikuti tren, melainkan menjawab kebutuhan nyata bisnis Anda sendiri. Kenali tandanya, lalu bertahaplah sesuai ritme pertumbuhan.</p>',
                'published_at' => now()->subDays(1),
            ],
            [
                'slug' => 'menyusun-syarat-sewa-yang-jelas',
                'category' => 'business-tips',
                'tags' => ['booking', 'rental-mobil'],
                'title' => 'Menyusun Syarat Sewa yang Jelas untuk Kepercayaan Pelanggan',
                'excerpt' => 'Syarat sewa yang samar membuat calon penyewa ragu melangkah. Begini cara menyusun ketentuan yang jelas tanpa terkesan ribet.',
                'content' => '<p>Momen calon penyewa membaca syarat sewa adalah momen penentu. Ketentuan yang samar membuat mereka ragu, dan keraguan biasanya berakhir dengan mencari rental lain.</p><p>Sebaliknya, syarat yang justru jelas memberi rasa tenang: calon penyewa tahu apa yang diharapkan, dan Anda terlindungi dari kesalahpahaman di kemudian hari.</p><h2>Dokumen dan Deposit yang Wajar</h2><p>Sebutkan dengan jelas dokumen apa saja yang diminta, misalnya KTP, SIM, dan tanda tangan formulir sewa. Untuk deposit, tetapkan jumlah yang masuk akal serta jelaskan kapan dan bagaimana uang tersebut dikembalikan.</p><h2>Kebijakan yang Diumumkan di Awal</h2><p>Denda keterlambatan, batas area pemakaian, dan ketentuan BBM sebaiknya diketahui calon penyewa sejak sebelum transaksi, bukan saat kejadiannya terjadi. Kebijakan yang diumumkan lebih awal selalu terasa lebih adil daripada yang muncul mendadak.</p><h2>Tulis di Website, Bukan Hanya di Chat</h2><p>Sering kali syarat sewa hanya dibahas lewat chat sehingga berbeda-beda jawabannya. Tempatkan ketentuan yang sudah dirapikan pada halaman khusus di website, lalu gunakan percakapan hanya untuk mengonfirmasi hal-hal spesifik. Versi tertulis juga menjadi rujukan yang sama bagi semua pihak.</p><p>Pada akhirnya, syarat sewa yang jelas bukan hambatan, melainkan bentuk profesionalisme. Calon penyewa yang menghargai kejelasan adalah pelanggan yang paling nyaman diajak bekerja sama.</p>',
                'published_at' => now(),
            ],
            [
                'slug' => 'kesalahan-umum-website-rental',
                'category' => 'business-tips',
                'tags' => ['website', 'rental-mobil'],
                'title' => 'Kesalahan Umum di Website Rental dan Cara Menghindarinya',
                'excerpt' => 'Armada bagus bisa kalah oleh detail kecil di website. Kenali kesalahan umum yang diam-diam membuat calon penyewa pergi.',
                'content' => '<p>Tidak sedikit website rental yang armadanya bagus namun tetap sepi peminat. Penyebabnya jarang satu hal besar; biasanya kumpulan detail kecil yang mengikis kepercayaan pengunjung.</p><p>Berikut kesalahan yang paling sering ditemukan, beserta cara sederhana mengatasinya.</p><h2>Harga Tidak Terlihat</h2><p>Pengunjung yang tidak menemukan gambaran harga akan berasumsi bahwa harganya mahal, lalu membuka website kompetitor yang lebih terbuka. Cantumkan harga sewa harian atau minimal rentangnya agar pengunjung bertahan lebih lama.</p><h2>Foto Gelap dan Tidak Konsisten</h2><p>Foto armada yang gelap, miring, atau bergaya beda-beda antarunit membuat katalog tampak tidak terawat. Padahal modal untuk memperbaikinya hanya cahaya pagi dan latar yang sama.</p><h2>Kontak Sulit Ditemukan</h2><p>Tombol WhatsApp yang tersembunyi atau nomor yang tidak aktif adalah pintu keluar bagi calon penyewa yang sebenarnya sudah berniat. Pastikan tombol kontak terlihat jelas dan selalu diuji dari ponsel.</p><h2>Informasi Usang</h2><p>Unit yang sudah dijual masih dipajang, atau harga yang belum diperbarui sejak setahun lalu, menjadi sinyal bahwa website jarang disentuh. Luangkan waktu rutin, misalnya sebulan sekali, untuk meninjau isi website.</p><p>Kesalahan-kesalahan di atas mudah diperbaiki dan efeknya langsung terasa. Website yang rapi informasinya membuat setiap kunjungan punya peluang lebih besar menjadi pesanan.</p>',
                'published_at' => now()->subDays(3),
            ],
            [
                'slug' => 'media-sosial-untuk-rental-mobil',
                'category' => 'digital-marketing',
                'tags' => ['branding', 'whatsapp'],
                'title' => 'Media Sosial untuk Rental Mobil: Konsisten Tanpa Ribet',
                'excerpt' => 'Mengelola media sosial tidak harus melelahkan. Untuk bisnis rental, konsistensi sederhana jauh lebih berharga daripada konten sempurna yang jarang muncul.',
                'content' => '<p>Banyak pemilik rental merasa media sosial itu beban: harus kreatif terus, harus posting tiap hari, harus trendi. Akibatnya akun dibiarkan kosong berbulan-bulan.</p><p>Padahal untuk bisnis rental, yang dicari orang sederhana: bukti bahwa bisnis Anda aktif dan dapat dipercaya.</p><h2>Cukup Satu atau Dua Platform</h2><p>Tidak perlu hadir di semua platform. Pilih satu atau dua tempat calon penyewa Anda paling banyak berkumpul, biasanya Instagram atau TikTok, dan rawat secara rutin di sana.</p><h2>Konten Sederhana yang Jujur</h2><p>Foto unit terbaru, suasana serah terima mobil, atau tangkapan layar ulasan pelanggan sudah lebih dari cukup. Konten seperti ini mudah dibuat karena datang langsung dari pekerjaan harian Anda.</p><h2>Jadikan Website Pusat Informasi</h2><p>Media sosial berperan memancing minat; website yang menampung informasi lengkapnya. Arahkan tautan di bio dan ajakan bertanya menuju website agar pengunjung mendapat daftar armada serta harga yang utuh, bukan tercecer di unggahan lama.</p><p>Konsisten sedikit demi sedikit akan mengalahkan heboh di awal lalu hilang. Media sosial yang hidup membuat bisnis rental terlihat terus bergerak — dan itu yang paling meyakinkan calon penyewa.</p>',
                'published_at' => now()->subDays(9),
            ],
            [
                'slug' => 'checklist-website-rental-sebelum-go-live',
                'category' => 'web-design',
                'tags' => ['website', 'responsive'],
                'title' => 'Checklist Website Rental Mobil Sebelum Go Live',
                'excerpt' => 'Sebelum website rental dipromosikan, pastikan dasar-dasarnya sudah beres. Checklist sederhana ini membantu menjaga kesan pertama tetap baik.',
                'content' => '<p>Kesan pertama di internet sulit diulang. Pengunjung yang kecewa pada kunjungan pertama jarang kembali untuk memberi kesempatan kedua.</p><p>Karena itu, sebelum membagikan tautan website ke mana-mana, luangkan waktu sebentar untuk memeriksa daftar berikut.</p><h2>Halaman Inti Terisi Lengkap</h2><p>Beranda, katalog armada, dan kontak adalah tiga halaman yang wajib siap. Pastikan tidak ada menu yang mengarah ke halaman kosong atau tombol yang tidak berfungsi — detail kecil seperti ini cepat terlihat.</p><h2>Nomor WhatsApp Aktif</h2><p>Coba sendiri tombol WhatsApp dari ponsel: apakah obrolan terbuka ke nomor yang benar dan pesan bawaannya membantu. Tombol yang bekerja baik baru bermakna jika ada yang cepat merespons di baliknya.</p><h2>Nyaman Dibuka dari Ponsel</h2><p>Buka website dari layar kecil dan periksa apakah teks terbaca serta tombol mudah ditekan. Sebagian besar kunjungan pertama datang dari ponsel, biasanya sambil buru-buru.</p><h2>Baca Ulang Sebelum Tayang</h2><p>Salah ketik pada nama mobil atau angka harga yang tertukar bisa merusak kepercayaan tanpa sadar. Baca ulang seluruh halaman, atau minta rekan mengeceknya sekali lagi dengan mata segar.</p><p>Checklist ini sengaja dibuat pendek supaya benar-benar dijalankan. Website yang lolos pemeriksaan dasar siap menerima kunjungan pertama dengan lebih percaya diri.</p>',
                'published_at' => now()->subDays(11),
            ],
        ];

        Post::query()->whereNotIn('slug', array_column($posts, 'slug'))->delete();

        foreach ($posts as $post) {
            $category = Category::query()->where('slug', $post['category'])->first();
            $tagIds = Tag::query()->whereIn('slug', $post['tags'])->pluck('id');

            $record = Post::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'title' => $post['title'],
                    'excerpt' => $post['excerpt'],
                    'content' => $post['content'],
                    'status' => PostStatus::PUBLISHED,
                    'published_at' => $post['published_at'],
                ]
            );

            $record->update(['category_id' => $category?->id]);
            $record->tags()->sync($tagIds);
        }
    }
}
