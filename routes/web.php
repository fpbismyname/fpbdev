<?php

use App\Enums\PostStatus;
use App\Models\Portfolio;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home');
Route::livewire('/portfolio', 'pages::portfolio');
Route::livewire('/about', 'pages::about');
Route::livewire('/blog', 'pages::blog');
Route::livewire('/blog/{post:slug}', 'pages::post');

Route::get('/sitemap.xml', function () {
    $base = rtrim(config('app.url'), '/');
    $urls = collect([
        ['loc' => $base.'/', 'lastmod' => now()->toDateString(), 'priority' => '1.0'],
        ['loc' => $base.'/portfolio', 'lastmod' => now()->toDateString(), 'priority' => '0.8'],
        ['loc' => $base.'/about', 'lastmod' => now()->toDateString(), 'priority' => '0.8'],
        ['loc' => $base.'/blog', 'lastmod' => now()->toDateString(), 'priority' => '0.7'],
    ]);

    $posts = Post::where('status', PostStatus::PUBLISHED)->latest('published_at')->get();
    foreach ($posts as $post) {
        $urls->push([
            'loc' => $base.'/blog/'.$post->slug,
            'lastmod' => ($post->published_at ?? $post->updated_at)->toDateString(),
            'priority' => '0.6',
        ]);
    }

    $portfolios = Portfolio::latest()->get();
    foreach ($portfolios as $portfolio) {
        $urls->push([
            'loc' => $base.'/portfolio',
            'lastmod' => $portfolio->updated_at->toDateString(),
            'priority' => '0.5',
        ]);
        break;
    }

    return response()->view('sitemap', ['urls' => $urls])->header('Content-Type', 'application/xml');
});
