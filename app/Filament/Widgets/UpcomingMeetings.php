<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Meeting;
use Filament\Tables\Columns\TextColumn;

class UpcomingMeetings extends TableWidget
{
    protected static ?string $heading = 'Upcoming Meetings';
    // protected int | string | array $columnSpan = 2; 
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Meeting::query()
            ->whereDate('next_meeting_date', '>=', now())
                    ->orderBy('next_meeting_date', 'asc')
                    ->limit(5)
            )
            ->columns([
                TextColumn::make('group.id')
                    ->label('Group'),
                TextColumn::make('next_meeting_date')
                    ->dateTime()
                    ->label('Date'),
                // TextColumn::make('group.research_title')
                //     ->label('Research Title'),
                TextColumn::make('supervisor.user.name')
                    ->label('Supervisor'),
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
