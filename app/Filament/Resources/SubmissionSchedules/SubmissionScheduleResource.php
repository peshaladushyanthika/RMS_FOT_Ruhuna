<?php

namespace App\Filament\Resources\SubmissionSchedules;

use App\Filament\Resources\SubmissionSchedules\Pages\CreateSubmissionSchedule;
use App\Filament\Resources\SubmissionSchedules\Pages\EditSubmissionSchedule;
use App\Filament\Resources\SubmissionSchedules\Pages\ListSubmissionSchedules;
use App\Filament\Resources\SubmissionSchedules\Schemas\SubmissionScheduleForm;
use App\Filament\Resources\SubmissionSchedules\Tables\SubmissionSchedulesTable;
use App\Models\SubmissionSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubmissionScheduleResource extends Resource
{
    protected static ?string $model = SubmissionSchedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'submission schedule';

    public static function form(Schema $schema): Schema
    {
        return SubmissionScheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubmissionSchedulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubmissionSchedules::route('/'),
            'create' => CreateSubmissionSchedule::route('/create'),
            'edit' => EditSubmissionSchedule::route('/{record}/edit'),
        ];
    }
}
