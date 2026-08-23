<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
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
                    ->collection('services'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
