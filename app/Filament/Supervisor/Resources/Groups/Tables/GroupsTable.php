<?php

namespace App\Filament\Supervisor\Resources\Groups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Group;

class GroupsTable
{
    public static function configure(Table $table): Table
    {
        $supervisor = auth()->user()?->supervisor;

        return $table

            ->query(
                Group::query()
                    ->when($supervisor, function (Builder $query) use ($supervisor) {
                        $query->where(function ($query) use ($supervisor) {
                            $query->where('supervisor_id', $supervisor->id)
                                  ->orWhere('co_supervisor_id', $supervisor->id);
                        });
                    })
            )
            ->columns([
                TextColumn::make('id')
                ->label('Group'),

            TextColumn::make('research_title')->limit(30),

            TextColumn::make('role')
                ->label('Role')
                ->getStateUsing(function ($record) use ($supervisor) {

                // $supervisor = auth()->user()?->supervisor;

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
