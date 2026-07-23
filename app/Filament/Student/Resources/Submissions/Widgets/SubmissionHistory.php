<?php

namespace App\Filament\Student\Resources\Submissions\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Submission;
use Filament\Tables\Columns\TextColumn;

class SubmissionHistory extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        $groupId = auth()->user()->student->group_id;
        return $table
            ->query(fn (): Builder => submission::query()
            ->where('group_id', $groupId)
                    ->with('schedule')
                    )
            ->columns([
                TextColumn::make('schedule.title')
                    ->label('Submission'),
                TextColumn::make('submitted_at')
                    ->label('Submitted Date')
                    ->date(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) =>
                        match ($state) {
                            'accepted' => 'success',
                            'rejected' => 'danger',
                            default => 'warning',
                        }
                    ),

                TextColumn::make('feedback')
                    ->limit(30),
                
                TextColumn::make('reviewed_file')
                    ->label('Reviewed File')
                    ->formatStateUsing(fn ($state) => 'Download')
                    ->url(fn ($record) => asset('storage/' . $record->reviewed_file))
                    ->openUrlInNewTab(),
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
