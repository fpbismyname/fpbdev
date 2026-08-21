<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $siteName = settings('name', config('app.name'));
        $pageTitle = isset($title) ? $title.' | '.$siteName : $siteName;
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