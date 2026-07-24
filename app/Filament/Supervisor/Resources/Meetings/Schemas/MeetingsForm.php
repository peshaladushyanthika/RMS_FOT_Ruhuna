<?php

namespace App\Filament\Supervisor\Resources\Meetings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\Supervisor;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class MeetingsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('group_id')
                    ->required()
                    ->numeric(),
                Hidden::make('supervisor_id')
                    ->default(function () {
                        return Supervisor::where('user_id', Auth::id())->value('id');
                    }),
                DateTimePicker::make('meeting_date')
                    ->required(),
                Textarea::make('discussion_note')
                    ->required(),
                Textarea::make('next_actions'),
                DateTimePicker::make('next_meeting_date'),
            ]);
    }
}
