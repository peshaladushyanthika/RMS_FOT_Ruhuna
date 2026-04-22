<?php

namespace App\Filament\Resources\Submissions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('group_id')
                    ->required()
                    ->numeric(),
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
                TextInput::make('version')
                    ->required()
                    ->numeric()
                    ->default(1),
                FileUpload::make('file_path')->label('Upload File')
                    ->disk('public')
                    ->directory('submissions')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
                TextInput::make('marks')
                    ->numeric(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'accepted' => 'Accepted', 'rejected' => 'Rejected'])
                    ->default('pending')
                    ->required(),
                Textarea::make('feedback')
                    ->columnSpanFull(),
                DateTimePicker::make('submitted_at'),
            ]);
    }
}
