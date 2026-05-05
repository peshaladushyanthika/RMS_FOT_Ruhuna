<?php

namespace App\Filament\Resources\Supervisors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SupervisorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Supervisor Name')
                    ->formatStateUsing(fn ($record) => $record?->user?->name) 
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->formatStateUsing(fn ($record) => $record?->user?->email)
                    ->email()
                    ->required(),
            ]);
    }
}
