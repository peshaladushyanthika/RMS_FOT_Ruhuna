<?php

namespace App\Filament\Resources\Submissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MarksheetExport;

class SubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('file_path')
                    ->label('File')
                    ->formatStateUsing(fn ($state) => $state ? 'View PDF' : 'No File')
                    ->url(fn ($record) => $record->file_path
                        ? asset('storage/' . $record->file_path) 
                        : null
            )
                    ->openUrlInNewTab(),

                TextColumn::make('marks')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'accepted',
                        'danger' => 'rejected',
                        'warning' => 'pending',
                    ]),
                TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('exportMarksheet')
                    ->label('Download Marksheet')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        return Excel::download(
                            new MarksheetExport(),
                            'marksheet.xlsx'
                        );
                    }),
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
