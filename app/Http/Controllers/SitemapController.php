<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $xml = Cache::remember('sitemap', 3600, function () {
            $sitemap = Sitemap::create();

            $base = rtrim(config('app.url'), '/');

            $sitemap->add(Url::create($base.'/')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(1.0));
            $sitemap->add(Url::create($base.'/portfolio')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(0.8));
            $sitemap->add(Url::create($base.'/about')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8));
            $sitemap->add(Url::create($base.'/blog')->setLastModificationDate(Post::where('status', PostStatus::PUBLISHED)->latest('updated_at')->value('updated_at') ?? now())->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setPriority(0.7));

            Post::where('status', PostStatus::PUBLISHED)->latest('published_at')->get()->each(function ($post) use ($sitemap, $base) {
                $sitemap->add(Url::create($base.'/blog/'.$post->slug)->setLastModificationDate($post->updated_at)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(0.6));
            });

            return $sitemap->render();
        });

        return response($xml)->header('Content-Type', 'application/xml');
    }
}
