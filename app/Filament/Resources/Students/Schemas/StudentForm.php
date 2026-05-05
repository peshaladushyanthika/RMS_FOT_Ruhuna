<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('stu_number')
                    ->required(),
                TextInput::make('name')
                    ->label('Name')
                    ->formatStateUsing(fn ($record) => $record?->user?->name)
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->formatStateUsing(fn ($record) => $record?->user?->email)
                    ->required(),
                TextInput::make('group_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
