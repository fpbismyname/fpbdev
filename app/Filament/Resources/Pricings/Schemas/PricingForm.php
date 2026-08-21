<?php

namespace App\Filament\Resources\Pricings\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PricingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Repeater::make('features')
                    ->simple(
                        TextInput::make('feature')
                            ->required()
                            ->placeholder('Contoh: Domain .com 1 tahun')
                    )
                    ->default([])
                    ->columnSpanFull()
                    ->label('Fitur yang Didapat'),
            ]);
    }
}
