<?php

namespace App\Filament\Student\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
// use submission;
use App\Models\Submission;
use Filament\Tables\Columns\TextColumn;

class StudentSubmissionHistory extends TableWidget
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
                TextColumn::make('file_path')
                    ->label('File')
                    ->formatStateUsing(fn ($state) => 'Download')
                    ->url(fn ($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) =>
                        match ($state) {
                            'accepted' => 'success',
                            'rejected' => 'danger',
                            default => 'warning',
                        }
                    ),
                TextColumn::make('marks'),

                TextColumn::make('feedback')
                    ->limit(30),

                TextColumn::make('submitted_at')
                    ->dateTime(),
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
