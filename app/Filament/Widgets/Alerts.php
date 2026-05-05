<?php

namespace App\Filament\Widgets;

use App\Models\Submission;
use App\Models\Group;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class Alerts extends TableWidget
{
    // protected int | string | array $columnSpan = 2; 
    public function table(Table $table): Table
    {
        return $table
            ->query(function (): Builder {
    return Group::query()
        ->with(['submissions', 'meetings'])
        ->where(function ($query) {
            $query
                // No meetings
                ->whereDoesntHave('meetings')

                // Proposal rejected
                ->orWhereHas('submissions', function ($q) {
                    $q->where('type', 'proposal')
                      ->where('status', 'rejected');
                })

                // Presentation rejected
                ->orWhereHas('submissions', function ($q) {
                    $q->where('type', 'p_Pres')
                      ->where('status', 'rejected');
                })

                // Thesis pending
                ->orWhereHas('submissions', function ($q) {
                    $q->where('type', 'thesis')
                      ->where('status', 'pending');
                })

                // Viva pending
                ->orWhereHas('submissions', function ($q) {
                    $q->where('type', 'viva')
                      ->where('status', 'pending');
                })

                // Progress pending
                ->orWhereHas('submissions', function ($q) {
                    $q->where('type', 'progress1')
                      ->where('status', 'pending');
                });
        })
        ->limit(10);
})
            ->columns([
                TextColumn::make('id')
                    ->label('Group'),
                TextColumn::make('type')
                    ->label('Critical Issue')
                    ->getStateUsing(function ($record){
                        if ($record->meetings->count() == 0) {
                            return 'Meeting Required';
                        }
                         // Proposal rejected
                        if ($record->submissions->where('type', 'proposal')
                                ->where('status', 'rejected')
                                ->count() > 0
                        ) {
                            return 'Proposal Rejected';
                        }
                         // Proposal Presentation rejected
                        if (
                            $record->submissions
                                ->where('type', 'p_Pres')
                                ->where('status', 'rejected')
                                ->count() > 0
                        ) {
                            return 'Presentation Rejected';
                        }
                        // Thesis pending
                        if (
                            $record->submissions
                                ->where('type', 'thesis')
                                ->where('status', 'pending')
                                ->count() > 0
                        ) {
                            return 'Thesis Pending';
                        }

                        // Viva pending
                        if (
                            $record->submissions
                                ->where('type', 'viva')
                                ->where('status', 'pending')
                                ->count() > 0
                        ) {
                            return 'Viva Presentation Pending';
                        }
                         // Progress pending
                        if (
                            $record->submissions
                                ->where('type', 'progress1')
                                ->where('status', 'pending')
                                ->count() > 0
                        ) {
                            return 'Progress Report Pending';
                        }
                        // if ($record->type === 'thesis' && $record->status === 'pending') {
                        //     return 'Thesis Pending';
                        // }
                        // if ($record->type === 'viva' && $record->status === 'pending') {
                        //     return 'Viva Presentation Pending';
                        // }
                        // if ($record->type === 'progress1' && $record->status === 'pending') {
                        //     return 'Progress Report Pending';
                        // }
                        return 'No Critical Alerts';
                        
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Proposal Rejected', 'Presentation Rejected' => 'danger',
                        'Meeting Required' => 'warning',
                        'Thesis Pending' => 'info',
                        'Healthy' => 'success',
                        default => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'Proposal Rejected', 'Presentation Rejected' => 'heroicon-o-x-circle',
                        'Meeting Required' => 'heroicon-o-calendar-days',
                        'Thesis Pending' => 'heroicon-o-clock',
                        'Healthy' => 'heroicon-o-check-circle',
                        default => 'heroicon-o-information-circle',
                    }),
                // TextColumn::make('status')
                //     ->badge()
                //     ->colors([
                //         'danger' => 'rejected',
                //         'warning' => 'pending',
                //     ]),
                TextColumn::make('created_at')
                    ->since()
                    ->label('Last Updated')
                    ->color('gray'),
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
}
