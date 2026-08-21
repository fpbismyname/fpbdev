<?php

namespace App\Filament\Pages\Settings;

use App\Models\Setting as SettingModel;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use UnitEnum;

class General extends Page
{
    protected string $view = 'filament.pages.setting';

    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog';

    protected static ?int $navigationSort = 999;

    public SettingModel $settings;

    public array $data = [];

    public $social_media_icons = [
        'simpleicons-facebook' => 'Facebook',
        'simpleicons-instagram' => 'Instagram',
        'simpleicons-linkedin' => 'LinkedIn',
        'simpleicons-youtube' => 'YouTube',
        'simpleicons-tiktok' => 'TikTok',
        'simpleicons-x' => 'X (Twitter)',
        'simpleicons-threads' => 'Threads',
        'simpleicons-whatsapp' => 'WhatsApp',
        'simpleicons-telegram' => 'Telegram',
        'simpleicons-discord' => 'Discord',
        'simpleicons-github' => 'GitHub',
        'simpleicons-gitlab' => 'GitLab',
        'simpleicons-dribbble' => 'Dribbble',
        'simpleicons-behance' => 'Behance',
        'simpleicons-medium' => 'Medium',
    ];

    public $contact_icons = [
        'heroicon-o-phone' => 'Phone',
        'heroicon-o-device-phone-mobile' => 'Mobile',
        'heroicon-o-chat-bubble-left-right' => 'WhatsApp',
        'heroicon-o-envelope' => 'Email',
        'heroicon-o-map-pin' => 'Address',
        'heroicon-o-building-office-2' => 'Office',
        'heroicon-o-globe-alt' => 'Website',
        'heroicon-o-clock' => 'Business Hours',
        'heroicon-o-identification' => 'Company',
        'heroicon-o-user' => 'Contact Person',
    ];

    public function mount()
    {
        $record = $this->getRecord();
        $this->settings = $record;
        $this->form->fill($record->toArray());
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->keyBindings(['mod+s'])
                ->action(fn () => $this->save()),

        ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Grid::make(['md' => 2])
                        ->schema([
                            Section::make([
                                SpatieMediaLibraryFileUpload::make('logo')
                                    ->collection('site_logo')
                                    ->avatar()
                                    ->circleCropper(),
                                TextInput::make('name'),
                                TextInput::make('tagline'),
                                Textarea::make('description'),
                            ])
                                ->contained(false),
                            Section::make([
                                Repeater::make('social_media')
                                    ->grid(['md' => 2])
                                    ->maxItems(6)
                                    ->reactive()
                                    ->itemLabel(fn ($state) => $state['name'])
                                    ->addActionAlignment(Alignment::Start)
                                    ->collapsible()
                                    ->collapsed()
                                    ->schema([
                                        Section::make([
                                            TextInput::make('name')
                                                ->placeholder('Facebook'),
                                            Select::make('icon')
                                                ->native(false)
                                                ->placeholder('Select an Icon')
                                                ->options($this->social_media_icons),
                                            TextInput::make('url')
                                                ->placeholder('https://facebook.com/username')
                                                ->url(),
                                        ])

                                            ->contained(false)
                                            ->dense(true),
                                    ]),
                                Repeater::make('contact')
                                    ->grid(['md' => 2])
                                    ->maxItems(6)
                                    ->reactive()
                                    ->itemLabel(fn ($state) => $state['name'])
                                    ->addActionAlignment(Alignment::Start)
                                    ->collapsible()
                                    ->collapsed()
                                    ->schema([
                                        Section::make([
                                            TextInput::make('name')
                                                ->placeholder('Email'),

                                            Select::make('icon')
                                                ->native(false)
                                                ->placeholder('Select an icon')
                                                ->options($this->contact_icons),

                                            TextInput::make('value')
                                                ->placeholder('your_email@gmail.com'),
                                        ])
                                            ->contained(false)
                                            ->dense(true),
                                    ]),
                            ])
                                ->contained(false),
                        ]),
                ]),
            ])
            ->statePath('data')
            ->model($this->settings);
    }

    public function save()
    {
        $data = $this->form->getState();
        $isCreateNew = $this->settings->get()->isEmpty();
        if ($isCreateNew) {
            $this->settings->fill($data);
            $this->settings->save();
        } else {
            $this->settings->update($data);
        }
        $this->form->saveRelationships();

        return Notification::make()
            ->title('Setting saved')
            ->success()
            ->send();
    }

    public function getRecord()
    {
        $record = SettingModel::firstOrNew();

        // dd($record->toArray());

        return $record;
    }
}
