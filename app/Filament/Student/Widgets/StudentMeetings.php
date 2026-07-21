<?php

namespace App\Filament\Student\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Meeting;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;

class StudentMeetings extends TableWidget
{
    protected static ?string $heading = 'Upcoming Meetings';

    public function table(Table $table): Table
    {
        $groupId = auth()->user()->student->group_id;
        
        return $table
            ->query(fn (): Builder => Meeting::query()
            ->where('group_id', $groupId)
                    ->where('meeting_date', '>=', now())
                    ->orderBy('meeting_date', 'asc')
                    )
            ->columns([
                TextColumn::make('meeting_date')
                    ->label('Meeting Date')
                    ->dateTime()
                    ->description(fn ($record) =>
                        now()->diffForHumans($record->meeting_date, [
                            'parts' => 2,
                            'short' => true,
                        ])
                    ),

                // TextColumn::make('supervisor.user.name')
                //     ->label('Supervisor'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
