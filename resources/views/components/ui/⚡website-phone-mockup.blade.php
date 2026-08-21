<?php

use Livewire\Component;

new class extends Component {
    public $mockup;

    public function mount()
    {
        $this->mockup = config('site_content.pages.index.hero.mockup');
    }
};
?>
<div class="relative">
    <div class="mockup-phone w-full lg:w-85 shadow-2xl shadow-neutral/75">
        <div class="mockup-phone-camera"></div>
        <div class="mockup-phone-display relative flex flex-col bg-base-100 overflow-hidden">
            <div class="py-6 bg-base-300"></div>
            <div class="flex items-center justify-between px-4 py-2.5 border-b border-base-content/10">
                <div class="flex items-center gap-1.5">
                    <div class="p-1 bg-primary rounded-box text-primary-content inline-flex">
                        <x-icon name="o-truck" class="w-3 h-3" />
                    </div>
                    <p class="text-xs font-bold">{{ $mockup['brand'] }}</p>
                </div>
                <x-icon name="o-bars-3" class="w-4 h-4 text-base-content/60" />
            </div>
            <div
                class="flex flex-col items-center gap-2 px-4 py-5 text-center bg-linear-to-b from-primary/15 to-transparent">
                <h4 class="text-base font-black tracking-wide leading-snug">{{ $mockup['headline'] }}</h4>
                <span class="btn btn-primary btn-sm w-fit gap-1.5">
                    <x-simpleicon-whatsapp class="w-3.5 h-3.5" />
                    {{ $mockup['cta'] }}
                </span>
            </div>
            <div class="px-4 pt-3">
                <p class="text-xs font-bold mb-2">{{ $mockup['sectionLabel'] }}</p>
                <div class="flex flex-col gap-2">
                    @foreach ($mockup['cars'] as $car)
                        <div class="bg-base-200 rounded-box p-3 flex items-center gap-3">
                            <div class="w-14 h-14 shrink-0 bg-primary/10 rounded-box grid place-items-center text-primary">
                                <x-dynamic-component :component="'simpleicon-' . $car['icon']" class="w-8 h-8" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold leading-tight">{{ $car['name'] }}</p>
                                <p class="text-xs text-base-content/60">{{ $car['transmission'] }} · {{ $car['seats'] }}</p>
                            </div>
                            <p class="text-xs font-bold text-primary whitespace-nowrap">{{ $car['price'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="px-4 pt-4">
                <p class="text-xs font-bold mb-2">{{ $mockup['featuresLabel'] }}</p>
                <div class="grid grid-cols-3 gap-2">
                    @foreach ($mockup['features'] as $feature)
                        <div class="bg-base-200 rounded-box p-2 flex flex-col items-center gap-1.5 text-center">
                            <div class="p-1.5 bg-primary/10 rounded-box text-primary inline-flex">
                                <x-icon name="{{ $feature['icon'] }}" class="w-3.5 h-3.5" />
                            </div>
                            <p class="text-[10px] font-semibold leading-tight">{{ $feature['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="px-4 pt-4">
                <div class="bg-base-200 rounded-box p-3">
                    <p class="text-xs italic leading-relaxed">&ldquo;{{ $mockup['testimonial']['quote'] }}&rdquo;</p>
                    <p class="text-[10px] font-bold text-primary mt-1.5">&mdash; {{ $mockup['testimonial']['name'] }}
                    </p>
                </div>
            </div>
            <div class="mx-4 mt-4 bg-primary rounded-box p-4 pb-6 text-center text-primary-content">
                <p class="text-sm font-black tracking-wide leading-snug">{{ $mockup['ctaBanner']['text'] }}</p>
                <span class="btn btn-neutral btn-xs w-fit mx-auto mt-2">{{ $mockup['ctaBanner']['button'] }}</span>
            </div>
            <div class="absolute bottom-3 right-3 p-4 bg-primary rounded-full text-primary-content shadow-lg">
                <x-simpleicon-whatsapp class="w-4 h-4" />
            </div>
        </div>
    </div>
    <div class="hidden md:block absolute top-1/4 -right-3/5 -translate-1/2">
        <x-card class="w-fit shadow-xl border border-base-content/15 text-lg rounded-bl-none">
            <div class="flex items-center gap-2 text-primary">
                <x-icon name="o-chart-bar" class="w-5 h-5" />
                <h4>Mobile Friendly</h4>
            </div>
        </x-card>
    </div>
    <div class="hidden md:block absolute top-1/2 -left-3/4 translate-1/2">
        <x-card class="w-fit shadow-xl border border-base-content/15 text-lg rounded-br-none">
            <div class="flex items-center gap-2 text-primary">
                <x-icon name="o-cog-6-tooth" class="w-5 h-5" />
                <h4>Mudah Dikelola</h4>
            </div>
        </x-card>
    </div>
</div>