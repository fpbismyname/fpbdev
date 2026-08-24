<?php

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

new #[Layout('layouts::base')] class extends Component {
    #[Locked]
    public Post $post;

    public function mount(Post $post)
    {
        abort_unless($post->status === PostStatus::PUBLISHED, 404);

        $this->post = $post->load('category');
    }

    public function render()
    {
        return $this->view()->title($this->post->title);
    }

    public function relatedPosts(): Collection
    {
        $sameCategory = Post::query()
            ->with('category')
            ->where('status', PostStatus::PUBLISHED)
            ->whereKeyNot($this->post->getKey())
            ->when($this->post->category_id, fn($query) => $query->where('category_id', $this->post->category_id))
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($sameCategory->count() >= 3) {
            return $sameCategory;
        }

        $latest = Post::query()
            ->with('category')
            ->where('status', PostStatus::PUBLISHED)
            ->whereKeyNot($this->post->getKey())
            ->whereNotIn('id', $sameCategory->modelKeys())
            ->latest('published_at')
            ->take(3 - $sameCategory->count())
            ->get();

        return $sameCategory->concat($latest)->values();
    }
};
?>

<x-slot:description>{{ Str::limit(strip_tags((string) $this->post->excerpt), 155) }}</x-slot:description>
<x-slot:ogType>article</x-slot:ogType>
<x-slot:ogImage>{{ $this->post->getFirstMediaUrl('posts/cover', 'preview') ?: settings('media.site_logo.original_url') }}</x-slot:ogImage>
<x-slot:publishedAt>{{ $this->post->published_at?->toIso8601String() }}</x-slot:publishedAt>

<main>
    <article @class(['relative', 'pt-24', 'pb-16'])>
        <div @class(['container', 'mx-auto', 'max-w-3xl', 'px-4'])>
            <div @class(['flex', 'flex-col', 'gap-6'])>
                @if ($this->post->category)
                    <x-badge class="badge-primary" value="{{ $this->post->category->name }}" />
                @endif
                <h1 @class(['text-4xl', 'lg:text-5xl', 'font-black', 'tracking-wide', 'mb-2'])>{{ $this->post->title }}
                </h1>
                <p @class(['text-base', 'text-base-content/60'])>
                    Dipublikasikan {{ $this->post->published_at?->translatedFormat('d F Y') }}
                </p>
                @if ($this->post->getFirstMediaUrl('posts/cover', 'preview'))
                    <img src="{{ $this->post->getFirstMediaUrl('posts/cover', 'preview') }}" srcset="{{ $this->post->getFirstMedia('posts/cover')?->getSrcset('preview') }}" alt="{{ $this->post->title }}"
                        class="w-full aspect-16/9 object-center object-cover rounded-box shadow-lg" loading="lazy" decoding="async" sizes="(max-width: 768px) 100vw, 768px" />
                @endif
                <div class="article-content prose prose-lg max-w-none">
                    {!! $this->post->content !!}
                </div>
            </div>
        </div>
    </article>
    @php
        $related = $this->relatedPosts();
    @endphp
    @if ($related->isNotEmpty())
        <section class="pb-24">
            <div class="container mx-auto max-w-7xl px-4">
                <div class="flex items-center justify-between gap-4 mb-8">
                    <h2 class="text-2xl lg:text-3xl font-black tracking-wide">Artikel Terkait</h2>
                    <x-button link="/blog" label="Artikel lainnya" class="btn-primary" wire:navigate />
                </div>
                <div class="grid lg:grid-cols-3 gap-4">
                    @foreach ($related as $relatedPost)
                        <a href="/blog/{{ $relatedPost->slug }}" wire:navigate>
                            <x-card
                                class="h-full bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary">
                                <x-slot:figure class="aspect-4/3">
                                    @if ($relatedPost->getFirstMediaUrl('posts/cover', 'thumb'))
                                        <img src="{{ $relatedPost->getFirstMediaUrl('posts/cover', 'thumb') }}" srcset="{{ $relatedPost->getFirstMedia('posts/cover')?->getSrcset('thumb') }}" alt="{{ $relatedPost->title }}"
                                            class="w-full h-full object-center object-cover" loading="lazy" decoding="async" sizes="(max-width: 768px) 100vw, 33vw" />
                                    @else
                                        <div
                                            class="w-full h-full bg-primary/5 border border-dashed border-primary/30 grid place-items-center">
                                            <div class="flex flex-col items-center gap-1 text-primary/60">
                                                <x-icon name="o-photo" class="w-6 h-6" />
                                                <span
                                                    class="text-xs font-medium">{{ $relatedPost->category?->name ?? 'Artikel' }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </x-slot:figure>
                                <div class="flex flex-col gap-2">
                                    <div class="flex items-center gap-1.5 text-sm">
                                        @if ($relatedPost->category)
                                            <span class="font-semibold text-primary">{{ $relatedPost->category->name }}</span>
                                            <span class="text-base-content/60">·</span>
                                        @endif
                                        <span class="text-base-content/60">
                                            {{ $relatedPost->published_at?->translatedFormat('d M Y') }}
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold link link-hover">{{ $relatedPost->title }}</h3>
                                    <p class="line-clamp-2 text-base-content/75">{{ $relatedPost->excerpt }}</p>
                                </div>
                            </x-card>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>