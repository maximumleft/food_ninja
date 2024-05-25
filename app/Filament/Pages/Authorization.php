<?php

namespace App\Filament\Pages;

use AllowDynamicProperties;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

#[AllowDynamicProperties] class Authorization extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-s-user';

    protected static ?string $title = 'Авторизация';

    protected static string $view = 'filament.pages.authorization';

    protected static ?string $navigationGroup = 'Настройки';

    public $user;

    public function mount(): void
    {
        $this->user = Auth::user();
    }
    protected function getForms(): array
    {
        return [
            'radioForm',
            'gatewayForm',
        ];
    }

    public function radioForm(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('По номеру телефона')
                        ->schema([
                            Radio::make('Для включения авторизации по СМС и/или FlashCall подключите шлюзы, которые осуществляют звонки Flashcall и отправку СМС.')
                                ->options([
                                    'option1' => 'Отключено',
                                    'option2' => 'FlashCall',
                                    'option3' => 'SMS',
                                    'option4' => 'FlashCall + SMS'
                                ])
                                ->descriptions([
                                    'option1' => 'Не использовать авторизацию по номеру телефона.',
                                    'option2' => 'Авторизация через звонок робота. Клиенту нужно ввести последние 4 цифры номера, с которого ему поступит звонок.',
                                    'option3' => 'Авторизация через SMS. Клиенту нужно ввести код из 4 цифр, который он получит в SMS.',
                                    'option4' => 'Is Комбинированный вариант. Авторизация через звонок робота. Если клиенту не приходит звонок, то он может запросить код для авторизации через смс..'
                                ]),
                            Section::make('Для включения авторизации по СМС и/или FlashCall подключите шлюзы, которые осуществляют звонки Flashcall и отправку СМС.')
                                ->schema([
                                    Radio::make('Шлюзы')
                                        ->options([
                                            'option1' => 'Foodninja (SMS Агент)',
                                            'option2' => 'Свои',
                                        ])
                                        ->inline(),

                                    Section::make('Дополнительная конфигурация')
                                        ->schema([
                                            Textarea::make('Настройка')
                                                ->label('Дополнительная конфигурация')
                                                ->rows(3)
                                                ->columnSpan(1)
                                                ->default('Здесь можно добавить дополнительную конфигурацию'),
                                        ])
                                ]),
                        ]),
                    Tabs\Tab::make('Соцсети')
                        ->schema([
                            // ...
                        ]),

                ])



        ]);
    }
    public function gatewayForm(Form $form): Form
    {
        return $form->schema([
            Repeater::make('members')
                ->schema([
                    TextInput::make('name')->required(),
                    Select::make('role')
                        ->options([
                            'member' => 'Member',
                            'administrator' => 'Administrator',
                            'owner' => 'Owner',
                        ])
                        ->required(),
                ])
                ->columns(2),


        ]);
    }
}
