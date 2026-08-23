<?php

use Livewire\Component;

new class extends Component {
    public $drawerState = false;

    public $ctaButton = [
        'label' => '',
        'url' => '/#contact',
    ];

    public function mount()
    {
        $this->ctaButton['label'] = config('site_content.pages.index.hero.ctaButtons.0.label');
    }

    public $navMenu = [
        [
            'label' => 'Layanan',
            'url' => '/#services',
            'useWireNavigate' => false,
        ],
        [
            'label' => 'Portfolio',
            'url' => '/portfolio',
            'useWireNavigate' => true,
        ],
        [
            'label' => 'Tentang Kami',
            'url' => '/about',
            'useWireNavigate' => true,
        ],
        [
            'label' => 'Blog',
            'url' => '/blog',
            'useWireNavigate' => true,
        ],
    ];
};
?>

<nav class="sticky top-0 w-full bg-base-100 z-10 border-b border-b-base-content/15">
    <div class="max-w-7xl mx-auto">
        <x-nav class="border-none">
            <x-slot:brand>
                <a class="flex items-center gap-4" href="/" wire:navigate>
                    @if (settings('media.site_logo.original_url'))
                        <img src="{{ settings('media.site_logo.original_url') }}" alt="{{ settings('name', config('app.name')) }} logo" class="rounded-full" width="32"
                            height="32" loading="lazy" decoding="async" />
                    @endif
                    <h6 class="font-black text-xl uppercase">{{ settings('name', 'Name') }}</h6>
                </a>
            </x-slot:brand>
            <x-slot:actions>
                <x-menu horizontal class="gap-2 max-lg:hidden p-0">
                    @foreach ($navMenu as $item)
                        <x-menu-item title="{{ $item['label'] }}" link="{{$item['url']}}"
                            class="data-current:font-bold data-current:text-primary"
                            no-wire-navigate="{{ !$item['useWireNavigate'] }}" />
                    @endforeach
                    @if ($ctaButton)
                        <x-button label="{{ $ctaButton['label'] }}" class="btn-primary" no-wire-navigate
                            link="{{ $ctaButton['url'] }}" />
                    @endif
                </x-menu>
                <x-drawer wire:model="drawerState" class="w-11/12 lg:w-1/3" title="{{ settings('name') }}" separator
                    with-close-button close-on-escape>
                    <x-menu class="p-0">
                        @foreach ($navMenu as $item)
                            <x-menu-item title="{{ $item['label'] }}" link="{{$item['url']}}"
                                no-wire-navigate="{{ !$item['useWireNavigate'] }}" />
                        @endforeach
                        @if ($ctaButton)
                            <x-button label="{{ $ctaButton['label'] }}" class="btn-primary" link="{{ $ctaButton['url'] }}"
                                no-wire-navigate="{{ !$item['useWireNavigate'] }}" />
                        @endif
                    </x-menu>
                </x-drawer>

                <x-button icon="o-bars-3" class="btn-square max-lg:flex hidden" wire:click="$toggle('drawerState')" />
            </x-slot:actions>
        </x-nav>
    </div>
</nav>