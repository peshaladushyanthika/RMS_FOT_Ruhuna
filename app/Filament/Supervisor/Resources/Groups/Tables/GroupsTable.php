<?php

namespace App\Filament\Supervisor\Resources\Groups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class GroupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group_name')->searchable(),
            TextColumn::make('research_title')->limit(30),

            TextColumn::make('role')
                ->label('Role')
                ->state(fn ($record) =>
                    $record->supervisor_id === auth()->id()
                        ? 'Main Supervisor'
                        : 'Co Supervisor'
                )
                ->badge(),

            TextColumn::make('students_count')
                ->counts('students')
                ->label('Students'),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
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
