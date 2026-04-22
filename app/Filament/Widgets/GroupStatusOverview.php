<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use App\Models\Group;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\HtmlString;

class GroupStatusOverview extends TableWidget
{

protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Group::query()->with('submissions'))
            // ->description('🟢 Approved | 🟡 Submitted/Pending | 🔴 Rejected | ⚪ Not Started')
            ->columns([
                TextColumn::make('id')->weight('bold')
                    ->label('Group'),

                // We call the custom helper method for each column
                $this->getStatusIconColumn('proposal', 'Proposal'),
                $this->getStatusIconColumn('p_Pres', 'Presentation'),
                $this->getStatusIconColumn('progress1', 'Progress 01'),
                $this->getStatusIconColumn('progress2', 'Progress 02'),
                $this->getStatusIconColumn('thesis', 'Thesis'),
                $this->getStatusIconColumn('viva', 'Viva'),

                // ✅ Proposal
                // IconColumn::make('proposal')
                //     ->label('Proposal')
                //     ->getStateUsing(function ($record) {
                //         return $record->submissions
                //             ->where('type', 'proposal')
                //             ->first()?->status;
                //             return $submission?->status;
                //     })
                //     ->icons([
                //         'heroicon-o-check-circle' => 'accepted',
                //         'heroicon-o-clock' => 'pending',
                //         'heroicon-o-x-circle' => 'rejected',
                //         'heroicon-o-minus-circle' => null,
                //     ])
                //     ->colors([
                //         'success' => 'accepted',
                //         'warning' => 'pending',
                //         'danger' => 'rejected',
                //         'gray' => null,
                //     ]),
                    // ->boolean(),
                // ✅ Proposal presentation
                // IconColumn::make('p_Pres')
                //     ->label('Presentation')
                //     ->getStateUsing(function ($record) {
                //         return $record->submissions
                //             ->where('type', 'p_Pres')
                //             ->first()?->status;
                //             return $submission?->status;
                //     })
                //      ->icons([
                //         'heroicon-o-check-circle' => 'accepted',
                //         'heroicon-o-clock' => 'pending',
                //         'heroicon-o-x-circle' => 'rejected',
                //         'heroicon-o-minus-circle' => null,
                //     ])
                //     ->colors([
                //         'success' => 'accepted',
                //         'warning' => 'pending',
                //         'danger' => 'rejected',
                //         'gray' => null,
                //     ]),
                    // ✅ Progress1
                // IconColumn::make('progress1')
                //     ->label('Progress 01')
                //     ->getStateUsing(function ($record) {
                //         return $record->submissions
                //             ->where('type', 'progress1')
                //             ->first()?->status;
                //             return $submission?->status;
                //     })
                //      ->icons([
                //         'heroicon-o-check-circle' => 'accepted',
                //         'heroicon-o-clock' => 'pending',
                //         'heroicon-o-x-circle' => 'rejected',
                //         'heroicon-o-minus-circle' => null,
                //     ])
                //     ->colors([
                //         'success' => 'accepted',
                //         'warning' => 'pending',
                //         'danger' => 'rejected',
                //         'gray' => null,
                //     ]),
                    // ✅ Progress2
                // IconColumn::make('progress2')
                //     ->label('Progress 02')
                //     ->getStateUsing(function ($record) {
                //         return $record->submissions
                //             ->where('type', 'progress2')
                //             ->first()?->status;
                //             return $submission?->status;
                //     })
                //      ->icons([
                //         'heroicon-o-check-circle' => 'accepted',
                //         'heroicon-o-clock' => 'pending',
                //         'heroicon-o-x-circle' => 'rejected',
                //         'heroicon-o-minus-circle' => null,
                //     ])
                //     ->colors([
                //         'success' => 'accepted',
                //         'warning' => 'pending',
                //         'danger' => 'rejected',
                //         'gray' => null,
                //     ]),
                    // ✅ Thesis
                // IconColumn::make('thesis')
                //     ->label('Thesis')
                //     ->getStateUsing(function ($record) {
                //         return $record->submissions
                //             ->where('type', 'thesis')
                //             ->first()?->status;
                //             return $submission?->status;
                //     })
                //      ->icons([
                //         'heroicon-o-check-circle' => 'accepted',
                //         'heroicon-o-clock' => 'pending',
                //         'heroicon-o-x-circle' => 'rejected',
                //         'heroicon-o-minus-circle' => null,
                //     ])
                //     ->colors([
                //         'success' => 'accepted',
                //         'warning' => 'pending',
                //         'danger' => 'rejected',
                //         'gray' => null,
                //     ]),
                    // ✅ Viva
                // IconColumn::make('viva')
                //     ->label('Viva')
                //     ->getStateUsing(function ($record) {
                //         return $record->submissions
                //             ->where('type', 'viva')
                //             ->first()?->status;
                //             return $submission?->status;
                //     })
                //      ->icons([
                //         'heroicon-o-check-circle' => 'accepted',
                //         'heroicon-o-clock' => 'pending',
                //         'heroicon-o-x-circle' => 'rejected',
                //         'heroicon-o-minus-circle' => null,
                //     ])
                //     ->colors([
                //         'success' => 'accepted',
                //         'warning' => 'pending',
                //         'danger' => 'rejected',
                //         'gray' => null,
                //     ])
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
    /**
     * Helper method to generate status columns with the common tooltip
     */

    protected function getStatusIconColumn(string $type, string $label): IconColumn
    {
        return IconColumn::make($type)
            ->label($label)
            ->getStateUsing(function ($record) use ($type) {
                return $record->submissions->where('type', $type)->first()?->status;
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
