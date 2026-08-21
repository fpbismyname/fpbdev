<?php

use App\Models\Portfolio;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::base'), Title('Portfolio')] class extends Component {
    public $site_content;

    public function mount()
    {
        $this->site_content = config('site_content.pages.index.portfolio');
    }

    public function listPortfolios()
    {
        return Portfolio::query()->latest()->get();
    }
};
?>

<main>
    <section @class(['relative', 'py-24'])>
        <div @class(['container', 'mx-auto', 'max-w-7xl', 'px-4'])>
            <div @class(['flex', 'flex-col', 'gap-8'])>
                <div>
                    <div class="max-w-4xl">
                        <x-badge value="{{ $site_content['badge'] }}" @class(['badge-section']) />
                        <h1 @class(['text-4xl', 'lg:text-5xl', 'font-black', 'tracking-wide', 'mb-4'])>
                            {{ $site_content['headline'] }}
                        </h1>
                        <p @class(['text-lg', 'mb-8', 'text-base-content/75'])>{{ $site_content['subheadline'] }}</p>
                    </div>
                </div>
                @php
                    $portfolios = $this->listPortfolios();
                @endphp
                <div>
                    @if ($portfolios->isEmpty())
                        <x-card class="bg-base-200 border border-base-content/15">
                            <div class="flex flex-col items-center gap-4 py-8 text-center">
                                <x-icon name="o-photo" class="w-8 h-8 text-base-content/50" />
                                <div>
                                    <p class="text-lg mb-2 font-bold">Belum ada proyek ditampilkan</p>
                                    <p class="text-base text-base-content/75">Cek kembali nanti untuk melihat proyek yang
                                        pernah kami kerjakan.</p>
                                </div>
                            </div>
                        </x-card>
                    @else
                        <div class="grid lg:grid-cols-3 gap-8">
                            @foreach ($portfolios as $item)
                                <livewire:ui.portfolio-card :portfolio="$item"
                                    wire:key="portfolio-{{ $item->id }}" />
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>