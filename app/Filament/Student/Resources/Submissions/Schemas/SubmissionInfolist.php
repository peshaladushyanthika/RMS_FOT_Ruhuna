<?php

namespace App\Filament\Student\Resources\Submissions\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

class SubmissionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Submission Details')
                ->icon('heroicon-o-document-text')
                ->schema([

                    TextEntry::make('schedule.title')
                        ->label('Submission')
                        ->size('lg')
                        ->weight('bold'),

                    TextEntry::make('submitted_at')
                        ->label('Submitted Date')
                        ->dateTime()
                        ->size('lg'),

                    TextEntry::make('status')
                        ->label('Status')
                        ->badge()
                        ->color(fn ($state) =>
                            match ($state) {
                                'accepted' => 'success',
                                'rejected' => 'danger',
                                default => 'warning',
                            }
                        ),

                ])
                ->columns(3),

                Section::make('Supervisor Feedback')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->schema([

                    TextEntry::make('feedback')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->size('lg'),

                ]),

                
                Section::make('Reviewed Document')
                ->icon('heroicon-o-paper-clip')
                ->schema([

                    TextEntry::make('reviewed_file')
                        ->hiddenLabel()
                        ->formatStateUsing(fn ($state) =>
                            $state ? 'Download Reviewed File' : 'No file attached'
                        )
                        ->url(fn ($record) =>
                            $record->reviewed_file
                                ? asset('storage/'.$record->reviewed_file)
                                : null
                        )
                        ->openUrlInNewTab(),

                ]),
            ]);
    }
}
