<?php

namespace App\Filament\Student\Resources\Meetings;

use App\Filament\Student\Resources\Meetings\Pages\CreateMeeting;
use App\Filament\Student\Resources\Meetings\Pages\EditMeeting;
use App\Filament\Student\Resources\Meetings\Pages\ListMeetings;
use App\Filament\Student\Resources\Meetings\Schemas\MeetingForm;
use App\Filament\Student\Resources\Meetings\Tables\MeetingsTable;
use App\Models\Meeting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Infolists\Components\TextEntry;

class MeetingResource extends Resource
{
    protected static ?string $model = Meeting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'meetings';

    public static function form(Schema $schema): Schema
    {
        return MeetingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MeetingsTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('meeting_date')
                    ->label('Meeting Date')
                    ->dateTime(),

                // TextEntry::make('supervisor.user.name')
                //     ->label('Supervisor'),

                TextEntry::make('discussion_note')
                    ->label('Discussion Summary')
                    ->columnSpanFull(),

                TextEntry::make('next_actions')
                    ->label('Next Actions')
                    ->columnSpanFull(),

                TextEntry::make('next_meeting_date')
                    ->label('Next Meeting')
                    ->dateTime(),

            ]);
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
            // 'create' => CreateMeeting::route('/create'),
            // 'edit' => EditMeeting::route('/{record}/edit'),
        ];
    }
}
