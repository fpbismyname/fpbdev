<?php

use App\Livewire\Attributes\Description;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::base'), Title('Buat Bisnis Rental Mobil Anda Tampil Lebih Profesional'), Description('site_content.pages.index.hero.subheadline')] class extends Component {
    //
};
?>

<main>
    <livewire:sections.hero />
    <livewire:sections.features />
    <livewire:sections.services />
    <livewire:sections.portfolio />
    <livewire:sections.pricing />
    <livewire:sections.about />
    <livewire:sections.faq />
    <livewire:sections.cta_banner />
</main>