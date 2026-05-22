<?php

namespace App\Filament\Supervisor\Resources\Meetings;

use App\Filament\Supervisor\Resources\Meetings\Pages\CreateMeetings;
use App\Filament\Supervisor\Resources\Meetings\Pages\EditMeetings;
use App\Filament\Supervisor\Resources\Meetings\Pages\ListMeetings;
use App\Filament\Supervisor\Resources\Meetings\Schemas\MeetingsForm;
use App\Filament\Supervisor\Resources\Meetings\Tables\MeetingsTable;
use App\Models\Meeting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MeetingsResource extends Resource
{
    protected static ?string $model = Meeting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Meeting';

    public static function form(Schema $schema): Schema
    {
        return MeetingsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MeetingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMeetings::route('/'),
            'create' => CreateMeetings::route('/create'),
            'edit' => EditMeetings::route('/{record}/edit'),
        ];
    }
}
