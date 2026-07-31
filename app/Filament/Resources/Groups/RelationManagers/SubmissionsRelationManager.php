<?php

namespace App\Filament\Resources\Groups\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class SubmissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'submissions';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('schedule.type')
                            ->label('Type')
                            ->badge(),
                TextColumn::make('file_path')
                    ->label('File')
                    ->formatStateUsing(fn ($state) => $state ? 'View File' : 'No File')
                    ->url(fn ($record) => $record->file_path
                        ? asset('storage/' . $record->file_path) 
                        : null
            )
                    ->openUrlInNewTab(),
                TextColumn::make('marks')->label('Marks'),
                TextColumn::make('status')->label('Status')->badge()
                            ->colors([
                        'success' => 'accepted',
                        'danger' => 'rejected',
                        'warning' => 'pending',
                    ]),
                TextColumn::make('feedback')->label('Feedback'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('downloadAll')
                        ->label('Download All ZIP')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('info')
                        ->action(function () {

            $group = $this->getOwnerRecord();

            $zip = new ZipArchive();

            $zipFileName = 'Group_'.$group->id.'.zip';
            $zipPath = storage_path('app/temp/'.$zipFileName);

            if (! file_exists(storage_path('app/temp'))) {
                mkdir(storage_path('app/temp'), 0755, true);
            }

            $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

            foreach ($group->submissions as $submission) {

                if (!$submission->file_path) {
                    continue;
                }

                if (!Storage::disk('public')->exists($submission->file_path)) {
                    continue;
                }

                $extension = pathinfo($submission->file_path, PATHINFO_EXTENSION);

                $fileName = str_replace(' ', '_', $submission->schedule->type) .
                    '.' .
                    $extension;

                $zip->addFile(
                    Storage::disk('public')->path($submission->file_path),
                    $fileName
                );
            }

            $zip->close();

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }),
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
