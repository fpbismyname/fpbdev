<?php

use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component {
    public function supportedIcon(string $icon): ?string
    {
        $name = Str::of($icon)->replaceFirst('heroicon-', '')->toString();

        return preg_match('/^(o|m|s|h)-/', $name) ? $name : null;
    }
};
?>

<footer @class(['border-t', 'border-base-content/15', 'bg-base-200/50'])>
    <div @class(['container', 'mx-auto', 'max-w-7xl', 'px-4', 'py-16'])>
        <div @class(['footer', 'sm:footer-horizontal', 'gap-12'])>
            <aside>
                <a href="#hero" class="flex items-center gap-4">
                    @if (settings('media.site_logo.original_url'))
                        <img src="{{ settings('media.site_logo.original_url') }}" class="rounded-full" width="32"
                            height="32" />
                    @endif
                    <h6 class="font-black text-xl uppercase">{{ settings('name', 'Name') }}</h6>
                </a>
                <p class="max-w-xs text-base-content/75 mb-2">
                    {{ settings('description', 'Deskripsi singkat perusahaan Anda.') }}
                </p>
                @if (!empty(settings('social_media')))
                    <div class="flex gap-2">
                        @foreach (settings('social_media') as $social)
                            @php
                                $simpleIcon = Str::of($social['icon'] ?? '')->replaceFirst('simpleicons-', '')->toString();
                                $isSimpleIcon = str_starts_with($social['icon'] ?? '', 'simpleicons-') && $simpleIcon !== '';
                            @endphp
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-circle"
                                aria-label="{{ $social['name'] }}">
                                @if ($isSimpleIcon)
                                    <x-dynamic-component :component="'simpleicon-' . $simpleIcon" class="w-4 h-4" />
                                @elseif ($icon = $this->supportedIcon($social['icon'] ?? ''))
                                    <x-icon name="{{ $icon }}" class="w-4 h-4" />
                                @else
                                    <span class="font-black">{{ strtoupper(Str::substr($social['name'] ?? '?', 0, 1)) }}</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </aside>
            <nav>
                <h6 class="footer-title">Navigasi</h6>
                <a class="link link-hover" href="/" wire:navigate
                    wire:current.exact="font-bold text-primary">Beranda</a>
                <a class="link link-hover" href="/portfolio" wire:navigate
                    wire:current="font-bold text-primary">Portfolio</a>
                <a class="link link-hover" href="/about" wire:navigate wire:current="font-bold text-primary">Tentang
                    Kami</a>
                <a class="link link-hover" href="/blog" wire:navigate wire:current="font-bold text-primary">Blog</a>
            </nav>
            <nav>
                <h6 class="footer-title">Kontak</h6>
                @forelse (settings('contact') ?? [] as $contact)
                    @php
                        $contactIcon = $this->supportedIcon($contact['icon'] ?? '');
                    @endphp
                    <div class="flex items-center gap-2">
                        @if ($contactIcon)
                            <x-icon name="{{ $contactIcon }}" class="w-5 h-5 text-base-content/75" />
                        @endif
                        <a class="link link-hover" href="#contact">{{ $contact['value'] }}</a>
                    </div>
                @empty
                    <a class="link link-hover" href="#contact">Hubungi Kami</a>
                @endforelse
            </nav>
        </div>
    </div>
    <div @class(['border-t', 'border-base-content/10'])>
        <div @class(['container', 'mx-auto', 'max-w-7xl', 'px-4', 'py-6', 'flex', 'items-center', 'justify-between', 'gap-4', 'text-sm', 'text-base-content/75'])>
            <p>&copy; {{ date('Y') }} {{ settings('name', config('app.name')) }}.</p>
            <x-button link="#" no-wire-navigate icon="m-arrow-small-up" class="btn-sm">
                Kembali ke Atas
            </x-button>
        </div>
    </div>
</footer>