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

<section id="contact" class="relative py-12 md:py-16 lg:py-24 scroll-mt-24">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="bg-primary rounded-box px-6 py-12 sm:px-8 sm:py-16 lg:px-16 lg:py-20">
            <div class="flex flex-col gap-8 text-center items-center">
                <div class="max-w-2xl mx-auto">
                    <h2 class="text-2xl sm:text-3xl lg:text-5xl font-black tracking-wide mb-4 text-primary-content" data-reveal>
                        {{ $site_content['headline'] }}
                    </h2>
                    <p class="text-base sm:text-lg text-primary-content/80" data-reveal data-reveal-delay="80">{{ $site_content['subheadline'] }}</p>
                </div>
                @php
                    $wa = settings('contact.whatsapp');
                    $ctaLink = $wa ? 'https://wa.me/'.preg_replace('/\D/', '', $wa) : ($site_content['button']['value'] !== 'contact.whatsapp' ? $site_content['button']['value'] : '#contact');
                @endphp
                <x-button link="{{ $ctaLink }}" @class([$site_content['button']['variant']])
                    external label="{{ $site_content['button']['label'] }}" data-reveal data-reveal-delay="160" />
            </div>
        </div>
    </div>
</section>