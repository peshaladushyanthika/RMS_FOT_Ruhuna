<?php

namespace App\Filament\Student\Resources\Meetings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class MeetingsTable
{
    public static function configure(Table $table): Table
    {

        return $table 
            ->columns([
                TextColumn::make('meeting_date')
                    ->label('Meeting Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('discussion_note')
                    ->label('Discussion Summary')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('next_actions')
                    ->label('Next Actions')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('next_meeting_date')
                    ->label('Next Meeting')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // Action::make('view')
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
