<?php

use App\Models\Pricing;
use Livewire\Component;

new class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.pricing');
    }

    public function listPricings()
    {
        $pricings = Pricing::query()->orderBy('price')->get();
        $highlighted = $pricings->firstWhere('slug', 'rental-professional');

        if ($highlighted) {
            $middle = intdiv($pricings->count(), 2);
            $withoutHighlighted = $pricings->reject(fn($item) => $item->is($highlighted))->values();
            $pricings = $withoutHighlighted->slice(0, $middle)
                ->concat([$highlighted])
                ->concat($withoutHighlighted->slice($middle))
                ->values();
        }

        return $pricings;
    }
};
?>

<section id="pricing" class="relative py-24 scroll-mt-24">
    <div class="container mx-auto max-w-7xl px-4">
        <div class="flex flex-col gap-8">
            <div class="max-w-2xl">
                <x-badge value="{{ $site_content['badge'] }}" class="badge-section" data-reveal />
                <h2 class="text-4xl lg:text-5xl font-black tracking-wide mb-4" data-reveal data-reveal-delay="80">
                    {{ $site_content['headline'] }}
                </h1>
                <p class="text-lg mb-8 text-base-content/75" data-reveal data-reveal-delay="160">{{ $site_content['subheadline'] }}</p>
            </div>
            @php
                $pricings = $this->listPricings();
                $customApp = $site_content['customApp'];
            @endphp
            <div class="flex flex-col gap-16">
                @if ($pricings->isEmpty())
                    <x-card class="bg-base-200 border border-base-content/15">
                        <div class="flex flex-col items-center gap-4 py-8 text-center">
                            <x-icon name="o-currency-dollar" class="w-8 h-8 text-base-content/50" />
                            <div>
                                <p class="text-lg mb-2 font-bold">Belum ada paket tersedia</p>
                                <p class="text-base text-base-content/75">Hubungi kami untuk mendapatkan penawaran yang
                                    sesuai dengan kebutuhan bisnis Anda.</p>
                            </div>
                        </div>
                    </x-card>
                @else
                    <div class="grid lg:grid-cols-3 gap-8 items-stretch" data-reveal-group data-reveal-delay="260">
                        @foreach ($pricings as $item)
                            @php
                                $highlighted = $item->slug === 'rental-professional';
                            @endphp
                            <x-card @class([
                                'border',
                                'lg:scale-110' => $highlighted,
                                'border-primary' => $highlighted,
                                'bg-base-200 border-base-content/15 transition-colors duration-200 hover:border-primary' => !$highlighted,
                            ])>
                                <div class="flex flex-col gap-4 h-full">
                                    <div class="flex items-center justify-between gap-4">
                                        <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                                        @if ($highlighted)
                                            <x-badge value="Paling Populer" class="badge-primary badge-sm whitespace-nowrap" />
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-3xl font-black tracking-wide">
                                            {{ $item->slug === 'rental-custom' ? 'Mulai ' : '' }}Rp
                                            {{ number_format($item->price, 0, ',', '.') }}
                                        </div>
                                        <div class="text-sm text-base-content/60 mt-1">/ paket</div>
                                    </div>
                                    <p class="text-base text-base-content/75">{{ $item->description }}</p>
                                    @if (!empty($item->features))
                                        <ul class="flex flex-col gap-2">
                                            @foreach ($item->features as $feature)
                                                <li class="flex items-center gap-2">
                                                    <x-icon name="o-check-circle" class="w-5 h-5 text-primary shrink-0" />
                                                    <span class="text-sm">{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <a href="#contact" @class([
                                        'btn',
                                        'w-full',
                                        'mt-auto',
                                        'btn-primary' => $highlighted,
                                    ])>
                                        Pilih Paket
                                    </a>
                                </div>
                            </x-card>
                        @endforeach
                    </div>
                @endif
                <div class="bg-primary text-primary-content rounded-box p-8 lg:p-12" data-reveal data-reveal-delay="500">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="max-w-2xl">
                            <h3 class="text-2xl font-black tracking-wide mb-2">{{ $customApp['title'] }}</h3>
                            <p class="text-lg text-primary-content/80">{{ $customApp['description'] }}</p>
                        </div>
                        <a href="{{ $customApp['button']['value'] }}"
                            class="btn btn-lg bg-base-100 text-primary hover:bg-base-200 border-base-100 shrink-0">
                            {{ $customApp['button']['label'] }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>