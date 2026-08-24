<?php

use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.hero');
    }
};
?>

<section id="hero" class="relative py-24 overflow-hidden bg-linear-to-t from-primary/45 from-0% to-75% to-transparent">
    <div class="container mx-auto max-w-7xl px-4">
        <div data-reveal-group class="grid items-center gap-16 mb-16">
            <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
                <x-badge value="{{ $site_content['badge']['label'] }}" class="badge-hero font-display"
                    icon="{{ $site_content['badge']['icon'] }}" data-reveal />
                <h1 class="text-5xl lg:text-7xl font-black tracking-wide mb-4" data-reveal>{{ $site_content['headline'] }}</h1>
                <p class="text-lg mb-8 text-base-content/75" data-reveal>{{ $site_content['subheadline'] }}</p>
                <div class="flex flex-wrap justify-center gap-4" data-reveal>
                    @foreach ($site_content['ctaButtons'] as $cta)
                        <a href="{{ $cta['value'] }}" @class(['btn', 'lg:btn-lg', $cta['variant']])>{{ $cta['label'] }}</a>
                    @endforeach
                </div>
            </div>
            <div class="w-full flex flex-col items-center" data-reveal>
                <livewire:ui.website-phone-mockup />
            </div>
        </div>
    </div>
</section>