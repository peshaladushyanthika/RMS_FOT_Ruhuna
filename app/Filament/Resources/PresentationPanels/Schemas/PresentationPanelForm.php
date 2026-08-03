<?php

namespace App\Filament\Resources\PresentationPanels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use App\Models\Supervisor;

class PresentationPanelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                            ->required(),
                DatePicker::make('presentation_date'),
                TextInput::make('location'),
                Select::make('supervisors')
                        ->multiple()
                        ->relationship('supervisors')
                        ->getOptionLabelFromRecordUsing(
                            fn (Supervisor $record) => $record->user->name
                        )
                        ->searchable()
                        ->preload()
                        ->required(),
            ]);
    }
}
