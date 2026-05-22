<?php

namespace App\Filament\Supervisor\Resources\Groups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class GroupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('Group'),

            TextColumn::make('research_title')->limit(30),

            TextColumn::make('role')
                ->label('Role')
                ->getStateUsing(function ($record) {

                $supervisor = auth()->user()?->supervisor;

                if (! $supervisor) {
                    return '-';
                }

                if ($record->supervisor_id === $supervisor->id) {
                    return 'Main Supervisor';
                }

                if ($record->co_supervisor_id === $supervisor->id) {
                    return 'Co Supervisor';
                }

                return '-';
            })
             ->badge()
             ->color(fn ($state) => match ($state) {
                'Main Supervisor' => 'success',
                'Co Supervisor' => 'warning',
                default => 'gray',
             }),

               
            
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
