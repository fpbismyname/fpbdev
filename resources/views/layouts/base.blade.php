<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <script>
        try {
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                document.documentElement.classList.add('js-reveal');
            }
        } catch (e) {}
    </script>
    <style>
        html.js-reveal [data-reveal],
        html.js-reveal [data-reveal-group] > * {
            opacity: 0;
            transform: translateY(16px);
            will-change: opacity, transform;
        }
        @media (prefers-reduced-motion: reduce) {
            html.js-reveal [data-reveal],
            html.js-reveal [data-reveal-group] > * {
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $siteName = settings('name', config('app.name'));
        $pageTitle = isset($title) ? $title.' | '.$siteName : $siteName;
        $faviconUrl = settings('media.site_logo.original_url') ?: '/favicon.ico';
        $appleIconUrl = settings('media.site_logo.original_url') ?: '/apple-touch-icon.png';
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description"
        content="{{ $description ?? settings('description', config('app.name')) }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $description ?? settings('description', config('app.name')) }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if (isset($ogImage))
        <meta property="og:image" content="{{ $ogImage }}">
    @elseif (settings('media.site_logo.original_url'))
        <meta property="og:image" content="{{ settings('media.site_logo.original_url') }}">
    @endif
    @if (($ogType ?? '') === 'article' && isset($publishedAt))
        <meta property="article:published_time" content="{{ $publishedAt }}">
    @endif
    <meta property="og:locale" content="id_ID">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $description ?? settings('description', config('app.name')) }}">
    @if (isset($ogImage))
        <meta name="twitter:image" content="{{ $ogImage }}">
    @elseif (settings('media.site_logo.original_url'))
        <meta name="twitter:image" content="{{ settings('media.site_logo.original_url') }}">
    @endif

    <link rel="icon" href="{{ $faviconUrl }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ $appleIconUrl }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#7c31cf">

    @php
        $schemaOrg = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            '@id' => rtrim(config('app.url'), '/').'/#organization',
            'name' => settings('name', config('app.name')),
            'url' => config('app.url'),
            'logo' => settings('media.site_logo.original_url') ?: rtrim(config('app.url'), '/').'/favicon-32x32.png',
            'description' => settings('description', config('app.name')),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => settings('contact.alamat', 'Cianjur, Jawa Barat, Indonesia.'),
                'addressLocality' => 'Cianjur',
                'addressRegion' => 'Jawa Barat',
                'postalCode' => '43292',
                'addressCountry' => 'ID',
            ],
            'telephone' => settings('contact.whatsapp', settings('contact.telepon')),
            'email' => settings('contact.email'),
            'openingHours' => settings('contact.jam-operasional'),
            'areaServed' => ['Cianjur', 'Bandung', 'Jabodetabek', 'Yogyakarta', 'Surabaya'],
            'sameAs' => collect(settings('social_media') ?? [])->pluck('url')->filter()->values()->all(),
        ];
        $schemaOrg = array_filter($schemaOrg, fn ($v) => ! is_null($v) && $v !== '' && $v !== []);
        if (empty($schemaOrg['sameAs'])) {
            unset($schemaOrg['sameAs']);
        }
        if (empty($schemaOrg['address']['streetAddress'])) {
            unset($schemaOrg['address']);
        }
    @endphp
    <script type="application/ld+json">{!! json_encode($schemaOrg, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fonts
    @livewireStyles
</head>

<body class="min-h-screen antialiased bg-base-100">
    <livewire:ui.navbar />
    {{ $slot }}
    <livewire:ui.footer />
    @livewireScripts
</body>

</html>