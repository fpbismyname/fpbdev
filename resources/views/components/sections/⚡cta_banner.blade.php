<?php

use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.cta');
    }
};
?>

<section id="contact" class="relative py-24 scroll-mt-24">
    <div class="container mx-auto max-w-7xl px-4">
        <div class="bg-primary rounded-box px-8 py-16 lg:px-16 lg:py-20">
            <div class="flex flex-col gap-8 text-center items-center">
                <div class="max-w-2xl mx-auto">
                    <h1 class="text-4xl lg:text-5xl font-black tracking-wide mb-4 text-primary-content">
                        {{ $site_content['headline'] }}
                    </h1>
                    <p class="text-lg text-primary-content/80">{{ $site_content['subheadline'] }}</p>
                </div>
                <x-button link="{{ $site_content['button']['value'] }}" @class([$site_content['button']['variant']])
                    external label="{{ $site_content['button']['label'] }}" />
            </div>
        </div>
    </div>
</section>