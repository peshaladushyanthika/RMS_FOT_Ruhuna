<?php

namespace App\Filament\Student\Resources\Submissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use App\Models\Submission;
use Filament\Tables\Columns\TextColumn;


class SubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->heading('Submission History')
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
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
