<?php

namespace App\Filament\Supervisor\Resources\Submissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;

class SubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group.group_name')
                ->label('Group'),

            TextColumn::make('file_path')
                ->label('Submitted File')
                ->formatStateUsing(fn ($state) => basename($state))
                ->url(fn ($record) => asset('storage/' . $record->file_path))
                ->openUrlInNewTab(),

           TextColumn::make('status')
                ->badge(),

            TextColumn::make('marks'),
            ])
             ->actions([
            ViewAction::make(),
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
