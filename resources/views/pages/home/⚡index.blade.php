<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::base'), Title('Buat Bisnis Rental Mobil Tampil Profesional')] class extends Component {
    //
};
?>

<x-slot:description>Tampilkan armada, harga, dan informasi rental dalam satu website yang mudah digunakan. Pelanggan dapat melihat pilihan kendaraan dan langsung menghubungi Anda melalui WhatsApp.</x-slot:description>

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