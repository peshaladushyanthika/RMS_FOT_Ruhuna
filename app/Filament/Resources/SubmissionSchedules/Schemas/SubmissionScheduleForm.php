<?php

namespace App\Filament\Resources\SubmissionSchedules\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;

class SubmissionScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                ->required(),

            Select::make('type')
                ->options([
                        'proposal' => 'Proposal Report', 
                        'p_Pres' => 'Proposal Presentation', 
                        'progress1' => 'Progress 01',
                        'progress2' => 'Progress 02',
                        'thesis' => 'Thesis',
                        'viva' => 'Viva Presentation'
                        ])
                ->required(),
            FileUpload::make('template_file')

                    ->label('Template File')

                    ->disk('public')

                    ->directory('submission-templates')

                    ->visibility('public')

                    ->acceptedFileTypes([
                        'application/pdf',
                        // 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ])

                    ->helperText('Upload PDF or DOCX template'),
// Textarea::make('instructions')

//     ->rows(5)

//     ->helperText('Instructions for students'),

            Textarea::make('description'),

            DateTimePicker::make('start_date')
                ->required(),

            DateTimePicker::make('due_date')
                ->required(),

            Toggle::make('is_active')
                ->default(true),

            Select::make('groups')
                ->multiple()
                ->relationship('groups', 'group_name')
                ->helperText('Leave empty to assign for ALL groups'),
            ]);
    }
}
