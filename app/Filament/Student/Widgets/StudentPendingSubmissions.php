<?php

namespace App\Filament\Student\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\SubmissionSchedule;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;


class StudentPendingSubmissions extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {

    $groupId = auth()->user()->student->group_id;

        return $table
            ->query(fn (): Builder => SubmissionSchedule::query()
             ->where('is_active', true)
             ->where(function ($query) use ($groupId) {

                        // FOR ALL GROUPS
                        $query->whereDoesntHave('groups')

                            // FOR SPECIFIC GROUPS
                            ->orWhereHas('groups', function ($q) use ($groupId) {
                                $q->where('groups.id', $groupId);
                            });
                    })
                    )
            ->columns([
                TextColumn::make('title')
                    ->label('Submission'),
                TextColumn::make('type')
                    ->badge(),
                
                    TextColumn::make('template_file')

    ->label('Template')

    ->formatStateUsing(fn ($state) =>
        $state ? 'Download Template' : 'No Template'
    )

    ->url(fn ($record) =>
        $record->template_file
            ? asset('storage/' . $record->template_file)
            : null
    )

    ->openUrlInNewTab(),
    TextColumn::make('description')
                    ->label('Instruction'),

                TextColumn::make('due_date')
                    ->dateTime(),

                TextColumn::make('start_date')
                    ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                 Action::make('upload')
                 ->label('Upload')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
