<?php

namespace App\Livewire\Attributes;

use Livewire\Features\SupportAttributes\Attribute as LivewireAttribute;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Description extends LivewireAttribute
{
    public function __construct(
        public string $content,
    ) {}
}
