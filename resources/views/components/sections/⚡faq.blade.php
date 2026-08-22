<?php

use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.faq');
    }
};
?>

<section id="faq" class="relative py-24 scroll-mt-24">
    <div class="container mx-auto max-w-7xl px-4">
        <div class="flex flex-col gap-8 items-center">
            <div class="max-w-2xl text-center">
                <x-badge value="{{ $site_content['badge'] }}" class="badge-section" data-reveal />
                <h2 class="text-4xl lg:text-5xl font-black tracking-wide mb-4" data-reveal data-reveal-delay="80">{{ $site_content['headline'] }}</h2>
                <p class="text-lg mb-8 text-base-content/75" data-reveal data-reveal-delay="160">{{ $site_content['subheadline'] }}</p>
            </div>
            <div class="w-full max-w-3xl flex flex-col gap-4" data-reveal-group data-reveal-delay="240">
                @foreach ($site_content['items'] as $index => $item)
                    <div class="collapse collapse-plus bg-base-200 border border-base-content/15 rounded-box">
                        <input type="radio" name="faq" {{ $index === 0 ? 'checked="checked"' : '' }} />
                        <div class="collapse-title text-lg font-bold">{{ $item['question'] }}</div>
                        <div class="collapse-content">
                            <p class="text-base text-base-content/75">{{ $item['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center gap-4" data-reveal data-reveal-delay="480">
                <p class="text-base-content/75">Masih ada pertanyaan?</p>
                <a href="#contact" class="btn btn-primary btn-sm">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>
