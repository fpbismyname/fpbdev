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
                <x-badge value="{{ $site_content['badge'] }}" class="badge-section" />
                <h1 class="text-4xl lg:text-5xl font-black tracking-wide mb-4">
                    {{ $site_content['headline'] }}
                </h1>
                <p class="text-lg text-base-content/75">{{ $site_content['subheadline'] }}</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div
                    class="relative md:col-span-2 lg:row-span-2 rounded-box overflow-hidden border border-base-content/15 transition-colors duration-200 hover:border-primary min-h-64 lg:min-h-0">
                    @if ($site_content['image'] && file_exists(public_path($site_content['image'])))
                        <img src="{{ asset($site_content['image']) }}" alt="Tentang FPBDEV"
                            class="absolute inset-0 w-full h-full object-cover" />
                    @else
                        <div class="absolute inset-0 bg-base-200 grid place-items-center">
                            <div class="flex flex-col items-center gap-2 text-base-content/50">
                                <x-icon name="o-photo" class="w-10 h-10" />
                                <span class="text-sm">Foto tentang kami akan tampil di sini</span>
                            </div>
                        </div>
                    @endif
                </div>
                @foreach ($site_content['points'] as $point)
                    <x-card
                        @class(['bg-base-200 border border-base-content/15 transition-colors duration-200 hover:border-primary', 'md:col-span-2 lg:col-span-2' => $loop->last])>
                        <div class="flex flex-col gap-3">
                            <div class="w-fit h-fit p-3 bg-primary rounded-box text-primary-content inline-flex">
                                <x-icon name="{{ $point['icon'] }}" class="w-6 h-6" />
                            </div>
                            <h6 class="text-lg font-bold">{{ $point['label'] }}</h6>
                            <p class="text-base text-base-content/75">{{ $point['value'] }}</p>
                        </div>
                    </x-card>
                @endforeach
            </div>
        </div>
    </div>
</section>
