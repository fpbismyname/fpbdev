<?php

use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.services');
    }

    public function listServices()
    {
        $data = Service::orderBy('sort_order')->orderBy('id')->get();

        return $data;
    }
};
?>

<section id="services" @class(['relative', 'py-12', 'md:py-16', 'lg:py-24', 'scroll-mt-24'])>
    <div @class(['container', 'mx-auto', 'max-w-7xl', 'px-4', 'sm:px-6', 'lg:px-8'])>
        <div @class(['max-w-2xl', 'mx-auto', 'text-center'])>
            <x-badge value="{{ $site_content['badge'] }}" @class(['badge-section']) data-reveal />
            <h2 @class(['text-2xl', 'sm:text-3xl', 'lg:text-5xl', 'font-black', 'tracking-wide', 'mb-4']) data-reveal data-reveal-delay="80">
                {{ $site_content['headline'] }}
            </h2>
            <p @class(['text-base', 'sm:text-lg', 'mb-8', 'text-base-content/75']) data-reveal data-reveal-delay="160">{{ $site_content['subheadline'] }}</p>
        </div>
        <div @class(['grid', 'gap-4', 'md:grid-cols-3']) data-reveal-group data-reveal-delay="260">
            @foreach ($this->listServices() as $item)
                @php
                    $imageItem = $item->getMedia('services')->first();
                @endphp
                <x-card class="bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary">
                    <x-slot:figure>
                        @if ($imageItem)
                            <img src="{{ $imageItem->getUrl('thumb') }}" srcset="{{ $imageItem->getSrcset('preview') }}" alt="{{ $item->name }}" class="w-full aspect-4/3 object-cover" loading="lazy" decoding="async" sizes="(max-width: 768px) 100vw, 33vw" />
                        @else
                            <div class="w-full aspect-4/3 bg-base-300 grid place-items-center">
                                <x-icon name="o-photo" class="w-8 h-8 text-base-content/30" />
                            </div>
                        @endif
                    </x-slot:figure>
                    <h3 class="text-lg card-title">{{ $item->name }}</h3>
                    <p class="text-base-content/75">{{ $item->description }}</p>
                </x-card>
            @endforeach
        </div>
    </div>
</section>