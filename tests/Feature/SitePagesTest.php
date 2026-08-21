<?php

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Pricing;
use App\Models\Setting;

beforeEach(function () {
    Setting::create([
        'name' => 'FPBDEV',
        'tagline' => 'Website Profesional untuk Bisnis Anda',
        'description' => 'Jasa Pembuatan Website Profesional untuk Bisnis Anda.',
        'social_media' => [],
        'contact' => [],
    ]);
});

test('home page renders every section', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('id="hero"', false)
        ->assertSee('id="features"', false)
        ->assertSee('id="services"', false)
        ->assertSee('id="portfolio"', false)
        ->assertSee('id="pricing"', false)
        ->assertSee('id="about"', false)
        ->assertSee('id="faq"', false)
        ->assertSee('id="contact"', false)
        ->assertSee('Lihat Selengkapnya')
        ->assertSee('href="/portfolio"', false);
});

test('home page renders footer and navbar', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('FPBDEV')
        ->assertSee('FPBDEV.')
        ->assertSee('Hubungi Kami');
});

test('footer renders social media brand icons', function () {
    Setting::first()->update([
        'social_media' => [
            ['name' => 'Instagram', 'icon' => 'simpleicons-instagram', 'url' => 'https://instagram.com/fpbdev'],
        ],
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('https://instagram.com/fpbdev', false)
        ->assertSee('aria-label="Instagram"', false)
        ->assertSee('<svg', false);
});

test('home page renders about and faq content from config', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee(config('site_content.pages.index.about.headline'))
        ->assertSee(config('site_content.pages.index.faq.items.0.question'));
});

test('pricing section renders seeded plans', function () {
    Pricing::create([
        'name' => 'Starter',
        'slug' => 'starter',
        'description' => 'Paket dasar.',
        'price' => 2500000,
        'features' => ['Domain .com 1 tahun', 'Hosting cepat & aman'],
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Starter')
        ->assertSee('2.500.000')
        ->assertSee('Domain .com 1 tahun')
        ->assertSee(config('site_content.pages.index.pricing.customApp.title'));
});

test('pricing section renders plans without features list', function () {
    Pricing::create([
        'name' => 'Minimal',
        'slug' => 'minimal',
        'description' => 'Paket tanpa fitur.',
        'price' => 1000000,
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Minimal')
        ->assertSee('Paket tanpa fitur.');
});

test('pricing section shows empty state when no plans exist', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Belum ada paket tersedia');
});

test('portfolio page renders all portfolios', function () {
    Portfolio::create([
        'name' => 'Toko Online Sejahtera',
        'slug' => 'toko-online-sejahtera',
        'description' => 'Website toko online dengan katalog produk dan pembayaran terintegrasi.',
        'client' => 'PT Sejahtera Abadi',
        'url' => 'https://toko-online-sejahtera.example.com',
    ]);

    $this->get('/portfolio')
        ->assertOk()
        ->assertSee('Toko Online Sejahtera')
        ->assertSee('https://toko-online-sejahtera.example.com', false);
});

test('portfolio page shows empty state when no projects exist', function () {
    $this->get('/portfolio')
        ->assertOk()
        ->assertSee('Belum ada proyek ditampilkan');
});

test('about page renders sections', function () {
    $this->get('/about')
        ->assertOk()
        ->assertSee(config('site_content.pages.index.about.headline'))
        ->assertSee('id="features"', false)
        ->assertSee('id="contact"', false);
});

test('blog page renders published posts', function () {
    Post::create([
        'title' => 'Panduan Website Bisnis',
        'slug' => 'panduan-website-bisnis',
        'excerpt' => 'Panduan lengkap membangun website bisnis.',
        'content' => '<p>Konten artikel.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now(),
    ]);

    $this->get('/blog')
        ->assertOk()
        ->assertSee('Panduan Website Bisnis');
});

test('blog page shows empty state when no posts exist', function () {
    $this->get('/blog')
        ->assertOk()
        ->assertSee('Belum ada artikel');
});

test('blog page paginates after twelve posts', function () {
    foreach (range(1, 13) as $index) {
        Post::create([
            'title' => "Artikel Nomor {$index}",
            'slug' => "artikel-nomor-{$index}",
            'excerpt' => 'Excerpt.',
            'content' => '<p>Konten.</p>',
            'status' => PostStatus::PUBLISHED,
            'published_at' => now()->subDays($index),
        ]);
    }

    $this->get('/blog')
        ->assertOk()
        ->assertSee('13 artikel')
        ->assertSee('Artikel Nomor 1')
        ->assertDontSee('Artikel Nomor 13');

    $this->get('/blog?page=2')
        ->assertOk()
        ->assertSee('Artikel Nomor 13');
});

test('published post detail renders content', function () {
    $post = Post::create([
        'title' => 'Panduan Website Bisnis',
        'slug' => 'panduan-website-bisnis',
        'excerpt' => 'Panduan lengkap membangun website bisnis.',
        'content' => '<p>Konten artikel lengkap.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now(),
    ]);

    $this->get("/blog/{$post->slug}")
        ->assertOk()
        ->assertSee('Panduan Website Bisnis')
        ->assertSee('Konten artikel lengkap.');
});

test('draft post detail returns 404', function () {
    $post = Post::create([
        'title' => 'Draf Artikel',
        'slug' => 'draf-artikel',
        'excerpt' => 'Draf.',
        'content' => '<p>Draf.</p>',
        'status' => PostStatus::DRAFT,
        'published_at' => null,
    ]);

    $this->get("/blog/{$post->slug}")->assertNotFound();
});

test('post detail shows related posts from same category first', function () {
    $category = Category::create(['name' => 'Website', 'slug' => 'website']);
    $otherCategory = Category::create(['name' => 'Marketing', 'slug' => 'marketing']);

    $post = Post::create([
        'title' => 'Artikel Utama',
        'slug' => 'artikel-utama',
        'excerpt' => 'Excerpt utama.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now(),
    ]);
    $post->update(['category_id' => $category->id]);

    Post::create([
        'title' => 'Artikel Satu Kategori',
        'slug' => 'artikel-satu-kategori',
        'excerpt' => 'Excerpt.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now()->subDay(),
        'category_id' => $category->id,
    ]);

    Post::create([
        'title' => 'Draf Sekategori',
        'slug' => 'draf-sekategori',
        'excerpt' => 'Draf.',
        'content' => '<p>Draf.</p>',
        'status' => PostStatus::DRAFT,
        'published_at' => null,
        'category_id' => $category->id,
    ]);

    Post::create([
        'title' => 'Artikel Terbaru Lain',
        'slug' => 'artikel-terbaru-lain',
        'excerpt' => 'Excerpt.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now()->subDays(2),
        'category_id' => $otherCategory->id,
    ]);

    $this->get("/blog/{$post->slug}")
        ->assertOk()
        ->assertSee('Artikel Terkait')
        ->assertSee('Artikel Satu Kategori')
        ->assertSee('Artikel Terbaru Lain')
        ->assertDontSee('Draf Sekategori');
});

test('post detail falls back to latest posts when category has no siblings', function () {
    $category = Category::create(['name' => 'Website', 'slug' => 'website']);

    $post = Post::create([
        'title' => 'Artikel Utama',
        'slug' => 'artikel-utama-fallback',
        'excerpt' => 'Excerpt utama.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now(),
    ]);
    $post->update(['category_id' => $category->id]);

    Post::create([
        'title' => 'Terbaru Kemarin',
        'slug' => 'terbaru-kemarin',
        'excerpt' => 'Excerpt.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now()->subDay(),
    ]);

    Post::create([
        'title' => 'Terbaru Lama',
        'slug' => 'terbaru-lama',
        'excerpt' => 'Excerpt.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now()->subDays(2),
    ]);

    $this->get("/blog/{$post->slug}")
        ->assertOk()
        ->assertSee('Artikel Terkait')
        ->assertSee('Terbaru Kemarin')
        ->assertSee('Terbaru Lama');
});

test('post detail hides related section when no other posts exist', function () {
    $post = Post::create([
        'title' => 'Satu-satunya Artikel',
        'slug' => 'satu-satunya-artikel',
        'excerpt' => 'Excerpt.',
        'content' => '<p>Konten.</p>',
        'status' => PostStatus::PUBLISHED,
        'published_at' => now(),
    ]);

    $this->get("/blog/{$post->slug}")
        ->assertOk()
        ->assertDontSee('Artikel Terkait');
});
