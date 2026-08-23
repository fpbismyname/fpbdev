<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->reactive()
                    ->debounce()
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->required(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('portfolio'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('client')
                    ->required(),
                TextInput::make('url')
                    ->url()
                    ->placeholder('https://contoh.com')
                    ->columnSpanFull(),
            ]);
    }
}
