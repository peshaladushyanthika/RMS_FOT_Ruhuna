<?php

namespace App\Filament\Supervisor\Resources\Meetings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\Supervisor;

class MeetingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('group_id')
                    ->required()
                    ->numeric(),
                // Select::make('supervisor_id')
                //     ->label('Supervisor')
                //     ->options(
                //         Supervisor::with('user')
                //         ->get()
                //         ->pluck('user.name', 'id')
                //     )
                //     // ->relationship('supervisor', 'name')
                //     ->searchable()
                //     ->preload()
                //     ->required(),
                DateTimePicker::make('meeting_date')
                    ->required(),
                Textarea::make('discussion_note')
                    ->required(),
                Textarea::make('next_actions'),
                DateTimePicker::make('next_meeting_date'),
            ]);
    }
}
