<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::base'), Title('Tentang Kami')] class extends Component {
    //
};
?>

<main>
    <livewire:sections.about />
    <livewire:sections.features />
    <livewire:sections.cta_banner />
</main>