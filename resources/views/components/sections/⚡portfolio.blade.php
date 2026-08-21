<?php

use App\Models\Portfolio;
use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.portfolio');
    }

    public function listPortfolio()
    {
        return Portfolio::query()->latest()->get()->take(3);
    }
};
?>

<section id="portfolio" class="relative py-24">
    <div class="container mx-auto max-w-7xl px-4">
        <div class="flex flex-col gap-8">
            <div class="max-w-2xl">
                <x-badge value="{{ $site_content['badge'] }}" class="badge-section" />
                <h1 class="text-4xl lg:text-5xl font-black tracking-wide mb-4">{{ $site_content['headline'] }}</h1>
                <p class="text-lg mb-8 text-base-content/75">{{ $site_content['subheadline'] }}</p>
            </div>
            <div class="flex flex-col gap-8">
                <div class="grid lg:grid-cols-3 gap-8">
                    @foreach ($this->listPortfolio() as $item)
                        <livewire:ui.portfolio-card :portfolio="$item" wire:key="portfolio-{{ $item->id }}" />
                    @endforeach
                </div>
                <div class="flex justify-center">
                    <x-button link="/portfolio" label="Lihat Selengkapnya" class="btn-primary" />
                </div>
            </div>
        </div>
    </div>
</section>