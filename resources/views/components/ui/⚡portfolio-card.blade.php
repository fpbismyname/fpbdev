<?php

use App\Models\Portfolio;
use Livewire\Component;

new class extends Component {
    public Portfolio $portfolio;

    public function mount(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }
};
?>

<x-card title="{{ $this->portfolio->name }}" subtitle="{{ $this->portfolio->description }}"
    class="bg-base-200 border border-base-content/10 transition-colors duration-200 hover:border-primary">
    <x-slot:figure class="aspect-4/3">
        @php
            $imageItem = $this->portfolio->getMedia('portfolio')->first();
        @endphp
        @if ($imageItem)
            <img src="{{ $imageItem->getUrl() }}" alt="{{ $this->portfolio->name }}" class="w-full h-full object-center object-cover" loading="lazy" decoding="async" />
        @else
            <div class="w-full h-full grid place-items-center bg-primary text-primary-content">
                <x-icon name="o-photo" class="w-8 h-8" />
            </div>
        @endif
    </x-slot:figure>
    @if (!empty($this->portfolio->url))
        <a href="{{ $this->portfolio->url }}" rel="noopener noreferrer" class="link link-hover link-primary font-bold"
            target="_blank">
            <span>
                Lihat Website
            </span>
            <x-icon name="m-arrow-small-right" class="w-5 h-5" />
        </a>
    @endif
</x-card>