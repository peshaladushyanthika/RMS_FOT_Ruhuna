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
use Filament\Schemas\Components\Section;

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

                Section::make('Meeting Details')
                ->icon('heroicon-o-calendar-days')
                ->schema([
                    TextEntry::make('meeting_date')
                        ->label('Meeting Date')
                        ->dateTime()
                        ->size('lg'),
                    TextEntry::make('next_meeting_date')
                        ->label('Next Meeting')
                        ->dateTime()
                        ->size('lg'),

                ])
                ->columns(2),
                Section::make('Discussion Summary')
                ->icon('heroicon-o-document-text')
                ->schema([
                    TextEntry::make('discussion_note')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->size('lg'),
                ]),

            Section::make('Next Actions')
                ->icon('heroicon-o-check-circle')
                ->schema([
                    TextEntry::make('next_actions')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->size('lg'),
                ]),

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
