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
                TextColumn::make('group.id')
                ->label('Group'),

                TextColumn::make('Supervisor')
                ->label('Role')
                ->getStateUsing(function ($record) {
                    $supervisor = auth()->user()->supervisor;

                    if($record->group->supervisor_id === $supervisor->id){
                        return 'Main';
                    }
                    if($record->group->co_supervisor_id === $supervisor->id){
                        return 'Co';
                    }
                    return '-';   
                })
                ->badge()
                ->color(fn ($state) => match ($state) {
                'Main' => 'success',
                'Co' => 'warning',
                default => 'gray',
             }),

            TextColumn::make('file_path')
                ->label('Submitted File')
                ->formatStateUsing(function ($state){
                    
                $fileName = basename($state);
                    
                     return strlen($fileName) > 25
                    ? substr($fileName, 0, 25) . '...'
                    : $fileName;
                
                })
                ->tooltip(fn ($state) => basename($state))
                ->url(fn ($record) => asset('storage/' . $record->file_path))
                ->openUrlInNewTab(),
            
            TextColumn::make('schedule.type')
                ->label('File Type'),

           TextColumn::make('status')
                ->badge()
                ->colors([
                        'success' => 'accepted',
                        'danger' => 'rejected',
                        'warning' => 'pending',
                    ]),

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
