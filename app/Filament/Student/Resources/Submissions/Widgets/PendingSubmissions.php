<?php

namespace App\Filament\Student\Resources\Submissions\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\SubmissionSchedule;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
class PendingSubmissions extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {

     $groupId = auth()->user()->student->group_id;
    //  dd($groupId);
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
            ->whereDoesntHave('submissions', function ($q) use ($groupId) {
            $q->where('group_id', $groupId);
        }))
            ->columns([
                TextColumn::make('title')
                    ->label('Submission')
                    // ->url(fn ($record) =>
                    //     route('filament.student.pages.submission-details', [
                    //         'schedule' => $record->id
                    //     ])
                    // )
                    ->weight('bold'),
                TextColumn::make('type')
                    ->badge(),
                 TextColumn::make('due_date')
                    ->label('Deadline')
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
                Action::make('view')
                    ->label('View Details')
                    ->icon('heroicon-m-eye')
                    ->url(fn ($record) =>
                        route('filament.student.pages.submission-details', [
                            'schedule' => $record->id
                        ])
        ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
