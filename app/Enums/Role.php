<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasLabel
{
    case ADMIN = 'admin';
    case OWNER = 'owner';
    case EDITOR = 'editor';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::OWNER => 'Owner',
            self::EDITOR => 'Editor',
        };
    }
}
