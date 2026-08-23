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

<section id="services" @class(['relative', 'py-24'])>
    <div @class(['container', 'mx-auto', 'max-w-7xl', 'px-4'])>
        <div @class(['max-w-2xl', 'col-span-2'])>
            <x-badge value="{{ $site_content['badge'] }}" @class(['badge-section']) data-reveal />
            <h2 @class(['text-4xl', 'lg:text-5xl', 'font-black', 'tracking-wide', 'mb-4']) data-reveal data-reveal-delay="80">
                {{ $site_content['headline'] }}
            </h2>
            <p @class(['text-lg', 'mb-8', 'text-base-content/75']) data-reveal data-reveal-delay="160">{{ $site_content['subheadline'] }}</p>
        </div>
        <div @class(['grid', 'gap-4', 'md:grid-cols-3']) data-reveal-group data-reveal-delay="260">
            @foreach ($this->listServices() as $item)
                @php
                    $imageItem = $item->getMedia('services')->first();
                @endphp
                <div @class(['card', 'group/cardServices', 'image-full', 'aspect-4/3'])>
                    <figure>
                        @if ($imageItem)
                            <img src="{{ $imageItem->getUrl() }}" alt="{{ $item->name }}"
                                class="object-center object-cover w-full h-full group-hover/cardServices:brightness-50 transition-discrete duration-200" loading="lazy" decoding="async" />
                        @else
                            <div class="grid content-center h-full w-full bg-neutral aspect-3/1">
                            </div>
                        @endif
                    </figure>
                    <div @class(['card-body'])>
                        <h3 @class(['text-lg', 'card-title'])>{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>