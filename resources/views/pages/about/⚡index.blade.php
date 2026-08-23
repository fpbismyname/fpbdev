<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::base'), Title('Tentang Kami')] class extends Component {
    //
};
?>

<x-slot:description>{{ config('site_content.pages.index.about.subheadline') }}</x-slot:description>

<main>
    <livewire:sections.about />
    <livewire:sections.features />
    <livewire:sections.cta_banner />
</main>