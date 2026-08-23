<?php

namespace App\Filament\Resources\Pricings\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PricingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->reactive()
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
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
