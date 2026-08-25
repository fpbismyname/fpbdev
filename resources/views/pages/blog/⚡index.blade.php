<?php

use App\Enums\PostStatus;
use App\Models\Post;
use App\Livewire\Attributes\Description;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::base'), Title('Blog'), Description('site_content.pages.index.blog.subheadline')] class extends Component {
    use WithPagination;

    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.blog');
    }

    public function listPosts()
    {
        return Post::query()
            ->with('category')
            ->where('status', PostStatus::PUBLISHED)
            ->latest('published_at')
            ->paginate(12);
    }

    public function totalPosts()
    {
        return Post::query()->where('status', PostStatus::PUBLISHED)->count();
    }
}

?>

<main>
    <section @class(['relative', 'py-24'])>
        <div @class(['container', 'mx-auto', 'max-w-7xl', 'px-4'])>
            @php
                $paginated = $this->listPosts();
                $featured = $paginated->onFirstPage() ? $paginated->getCollection()->first() : null;
                $posts = $featured !== null
                    ? $paginated->getCollection()->slice(1)
                    : $paginated->getCollection();
                $total = $this->totalPosts();
            @endphp
            <div @class(['flex', 'flex-col', 'gap-12'])>
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
                    <div class="max-w-2xl">
                        <x-badge value="{{ $site_content['badge'] }}" @class(['badge-section']) />
                        <h1 @class(['text-4xl', 'lg:text-5xl', 'font-black', 'tracking-wide', 'mb-4'])>
                            {{ $site_content['headline'] }}
                        </h1>
                        <p @class(['text-lg', 'text-base-content/75'])>{{ $site_content['subheadline'] }}</p>
                    </div>
                    @if ($paginated->total())
                        <span class="text-sm text-base-content/60 whitespace-nowrap">{{ $total }} artikel</span>
                    @endif
                </div>
                <div class="flex flex-col gap-8">
                    @if ($paginated->total() === 0)
                        <x-card class="bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary">
                            <div class="flex flex-col items-center gap-4 py-8 text-center">
                                <x-icon name="o-document-text" class="w-8 h-8 text-base-content/50" />
                                <div>
                                    <p class="text-lg mb-2 font-bold">Belum ada artikel</p>
                                    <p class="text-base text-base-content/75">Artikel seputar website bisnis akan segera
                                        hadir.</p>
                                </div>
                            </div>
                        </x-card>
                    @else
                        @if ($featured !== null)
                            <a href="/blog/{{ $featured->slug }}" wire:navigate
                                class="grid lg:grid-cols-3 gap-4 lg:gap-8 items-center bg-base-200 border border-base-content/15 rounded-box overflow-hidden transition-colors duration-200 hover:border-primary">
                                <div class="p-5 lg:p-8 flex flex-col gap-3 lg:col-span-2">
                                    <div class="flex items-center gap-1.5 text-sm">
                                        @if ($featured->category)
                                            <span class="font-semibold text-primary">{{ $featured->category->name }}</span>
                                            <span class="text-base-content/60">·</span>
                                        @endif
                                        <span class="text-base-content/60">
                                            {{ $featured->published_at?->translatedFormat('d M Y') }}
                                        </span>
                                    </div>
                                    <h2 class="text-2xl lg:text-3xl font-black tracking-wide">
                                        {{ $featured->title }}
                                    </h2>
                                    <p class="text-base text-base-content/75 line-clamp-3">{{ $featured->excerpt }}</p>
                                    <span class="link link-hover font-semibold inline-flex items-center gap-1.5 mt-2 w-fit">
                                        Baca Artikel
                                        <x-icon name="o-arrow-right" class="w-4 h-4" />
                                    </span>
                                </div>
                                <div
                                    class="relative order-first lg:order-last aspect-16/10 lg:aspect-auto lg:h-full lg:min-h-72">
                                    @if ($featured->getFirstMediaUrl('posts/cover', 'preview'))
                                        <img src="{{ $featured->getFirstMediaUrl('posts/cover', 'preview') }}" srcset="{{ $featured->getFirstMedia('posts/cover')?->getSrcset('preview') }}" alt="{{ $featured->title }}"
                                            class="absolute inset-0 w-full h-full object-center object-cover" loading="lazy" decoding="async" sizes="(max-width: 1024px) 100vw, 33vw" />
                                    @else
                                        <div
                                            class="absolute inset-4 bg-primary/5 border border-dashed border-primary/30 rounded-box grid place-items-center">
                                            <div class="flex flex-col items-center gap-1.5 text-primary/60">
                                                <x-icon name="o-photo" class="w-10 h-10" />
                                                <span
                                                    class="text-xs font-medium">{{ $featured->category?->name ?? 'Artikel' }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endif
                        @if ($posts->isNotEmpty())
                            <div class="grid lg:grid-cols-3 gap-4 mt-4">
                                @foreach ($posts as $post)
                                    <a href="/blog/{{ $post->slug }}" wire:navigate>
                                        <x-card
                                            class="h-full bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary">
                                            <x-slot:figure class="aspect-4/3">
                                                @if ($post->getFirstMediaUrl('posts/cover', 'thumb'))
                                                    <img src="{{ $post->getFirstMediaUrl('posts/cover', 'thumb') }}" srcset="{{ $post->getFirstMedia('posts/cover')?->getSrcset('thumb') }}" alt="{{ $post->title }}"
                                                        class="w-full h-full object-center object-cover" loading="lazy" decoding="async" sizes="(max-width: 768px) 100vw, 33vw" />
                                                @else
                                                    <div
                                                        class="w-full h-full bg-primary/5 border border-dashed border-primary/30 grid place-items-center">
                                                        <div class="flex flex-col items-center gap-1 text-primary/60">
                                                            <x-icon name="o-photo" class="w-6 h-6" />
                                                            <span
                                                                class="text-xs font-medium">{{ $post->category?->name ?? 'Artikel' }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </x-slot:figure>
                                            <div class="flex flex-col gap-2">
                                                <div class="flex items-center gap-1.5 text-sm">
                                                    @if ($post->category)
                                                        <span class="font-semibold text-primary">{{ $post->category->name }}</span>
                                                        <span class="text-base-content/60">·</span>
                                                    @endif
                                                    <span class="text-base-content/60">
                                                        {{ $post->published_at?->translatedFormat('d M Y') }}
                                                    </span>
                                                </div>
                                                <h3 class="text-xl font-bold link link-hover">{{ $post->title }}</h3>
                                                <p class="line-clamp-2 text-base-content/75">{{ $post->excerpt }}</p>
                                            </div>
                                        </x-card>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        @if ($paginated->hasPages())
                            {{ $paginated->links() }}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>