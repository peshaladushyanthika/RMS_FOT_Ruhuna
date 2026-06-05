<?php

namespace App\Filament\Supervisor\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Group;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class GroupStats extends TableWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Research Groups Overview';
    public function table(Table $table): Table
    {
        $supervisor = auth()->user()?->supervisor;
        $supervisorId = $supervisor->id;
        return $table
            ->query(fn (): Builder => group::query()
            ->where('supervisor_id', $supervisorId)->with('submissions.schedule'))
            ->columns([
                TextColumn::make('id')
                    ->label('Groups')
                    ->weight('bold')
                    ->searchable(),

            // Milestone status columns
                $this->getStatusIconColumn('proposal', 'Proposal'),

                $this->getStatusIconColumn('p_Pres', 'Presentation'),

                $this->getStatusIconColumn('progress1', 'Progress 01'),

                $this->getStatusIconColumn('progress2', 'Progress 02'),

                $this->getStatusIconColumn('thesis', 'Thesis'),

                $this->getStatusIconColumn('viva', 'Viva'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    protected function getStatusIconColumn(string $type, string $label): IconColumn
    {

    return IconColumn::make($type)

            ->label($label)

            ->alignCenter()

            ->getStateUsing(function ($record) use ($type) {

                // Get latest submission for this stage
                $submission = $record->submissions

                    ->filter(function ($submission) use ($type) {
                        return $submission->schedule?->type === $type;
                    })

                    ->sortByDesc('created_at')

                    ->first();

                return $submission?->status;
            })
        ->icons([
                'heroicon-o-check-circle' => 'accepted',
                'heroicon-o-clock' => 'pending',
                'heroicon-o-x-circle' => 'rejected',
                'heroicon-o-minus-circle' => null,
            ])
            ->colors([
                'success' => 'accepted',
                'warning' => 'pending',
                'danger' => 'rejected',
                'gray' => null,
            ])
             // ✅ THE TOOLTIP LOGIC APPLIED TO ALL
            ->tooltip(fn ($state) => match ($state) {
                'accepted' => 'Approved',
                'pending' => 'Pending Review',
                'rejected' => 'Rejected',
                default => 'Not Submitted',
            });
    }
}
