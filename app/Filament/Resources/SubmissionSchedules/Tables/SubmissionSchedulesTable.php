<?php

namespace App\Filament\Resources\SubmissionSchedules\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class SubmissionSchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('title')
                ->searchable(),

            TextColumn::make('type')
                ->badge(),

            TextColumn::make('template_file')
    ->label('Template')
    ->formatStateUsing(fn ($state) =>
        $state ? 'View Template' : 'No Template'
    )
    ->url(fn ($record) => $record->file_path
                        ? asset('storage/' . $record->file_path) 
                        : null
            )
             ->openUrlInNewTab(),

            TextColumn::make('due_date')
                ->dateTime()
                ->sortable(),

            TextColumn::make('groups_count')
                ->label('Target Groups')
                ->counts('groups')
                ->formatStateUsing(fn ($state) =>
                    $state == 0 ? 'All Groups' : $state . ' Groups'
                ),

            IconColumn::make('is_active')
                ->boolean(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
