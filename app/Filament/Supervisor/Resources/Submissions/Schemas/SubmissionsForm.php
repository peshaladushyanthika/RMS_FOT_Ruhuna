<?php

namespace App\Filament\Supervisor\Resources\Submissions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\FileUpload;

class SubmissionsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //  Section::make('Submission Details')
            ])
            ->schema([
                // FileUpload::make('file_path')
                //     ->disabled(),

                FileUpload::make('reviewed_file')
                    ->label('Reviewed File')
                    ->disk('public')
                    ->directory('reviews'),

                TextInput::make('marks')
                    ->numeric(),

                Textarea::make('feedback'),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        // 'reviewed' => 'Reviewed',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ]),
         
            ]);
    }
}
