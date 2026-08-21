<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::base')] class extends Component {
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