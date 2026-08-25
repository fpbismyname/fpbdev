<?php

use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.features');
    }
};
?>

<section id="features" class="relative py-12 md:py-16 lg:py-24 scroll-mt-24">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 items-center">
            <div class="max-w-2xl mx-auto text-center">
                <x-badge value="{{ $site_content['badge'] }}" class="badge-section" data-reveal />
                <h2 class="text-2xl sm:text-3xl lg:text-5xl font-black tracking-wide mb-4" data-reveal data-reveal-delay="80">{{ $site_content['headline'] }}</h2>
                <p class="text-base sm:text-lg mb-8 text-base-content/75" data-reveal data-reveal-delay="160">{{ $site_content['subheadline'] }}</p>
            </div>
            <div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4" data-reveal-group data-reveal-delay="240">
                    @foreach ($site_content['items'] as $item)
                        <x-card class="bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary">
                            <div class="flex flex-col gap-3 text-center">
                                <div
                                    class="w-fit h-fit p-3 bg-primary rounded-box text-primary-content inline-flex mx-auto">
                                    <x-icon name="{{ $item['icon'] }}" class="w-6 h-6" />
                                </div>
                                <h3 class="text-lg font-bold">{{ $item['label'] }}</h3>
                                <p class="text-base text-base-content/75">{{ $item['value'] }}</p>
                            </div>
                        </x-card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>