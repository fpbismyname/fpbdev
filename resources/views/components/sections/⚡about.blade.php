<?php

use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.about');
    }
};
?>

<section id="about" class="relative py-24">
    <div class="container mx-auto max-w-7xl px-4">
        <div class="flex flex-col gap-12">
            <div class="max-w-2xl mx-auto text-center">
                <x-badge value="{{ $site_content['badge'] }}" class="badge-section" data-reveal />
                <h2 class="text-4xl lg:text-5xl font-black tracking-wide mb-4" data-reveal data-reveal-delay="80">
                    {{ $site_content['headline'] }}
                </h2>
                <p class="text-lg text-base-content/75" data-reveal data-reveal-delay="160">{{ $site_content['subheadline'] }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-reveal-group data-reveal-delay="240">
                @foreach ($site_content['points'] as $point)
                    <x-card class="bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary">
                        <div class="flex flex-col items-center text-center gap-4 p-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-full grid place-items-center">
                                <x-icon name="{{ $point['icon'] }}" class="w-6 h-6 text-primary" />
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold mb-2">{{ $point['label'] }}</h3>
                                <p class="text-base text-base-content/75">{{ $point['value'] }}</p>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        </div>
    </div>
</section>
