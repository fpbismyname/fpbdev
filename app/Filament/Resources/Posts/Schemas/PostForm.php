<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->reactive()
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->required(),
                SpatieMediaLibraryFileUpload::make('cover')
                    ->columnSpanFull()
                    ->collection('posts/cover'),
                Textarea::make('excerpt')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->native(false)
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->debounce(750)
                            ->reactive()
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->unique()
                            ->required(),
                    ]),

                Select::make('tag_id')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->native(false)
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->reactive()
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->unique()
                            ->required(),
                    ]),
                Select::make('status')
                    ->options(PostStatus::class)
                    ->disablePlaceholderSelection()
                    ->default(PostStatus::DRAFT)
                    ->native(false)
                    ->reactive()
                    ->required(),
                DateTimePicker::make('published_at')
                    ->hidden(fn ($get) => $get('status') === PostStatus::DRAFT)
                    ->required(fn ($get) => $get('status') !== PostStatus::DRAFT),
            ]);
    }
}
