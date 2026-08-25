<?php

use App\Livewire\Attributes\Description;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::base'), Title('Tentang Kami'), Description('site_content.pages.index.about.subheadline')] class extends Component {
    //
};
?>

<main>
    <livewire:sections.about />
    <livewire:sections.features />
    <livewire:sections.cta_banner />
</main>