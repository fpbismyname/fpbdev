<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::base')] class extends Component {
    //
};
?>

<main>
    <livewire:sections.about />
    <livewire:sections.features />
    <livewire:sections.cta_banner />
</main>