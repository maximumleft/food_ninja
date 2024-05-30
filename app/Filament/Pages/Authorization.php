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

    public function form(Form $form): Form
    {
        return $form->schema([

        ]);
    }
}
