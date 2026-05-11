<?php

namespace App\Filament\Supervisor\Resources\Submissions;

use App\Filament\Supervisor\Resources\Submissions\Pages\CreateSubmissions;
use App\Filament\Supervisor\Resources\Submissions\Pages\EditSubmissions;
use App\Filament\Supervisor\Resources\Submissions\Pages\ListSubmissions;
use App\Filament\Supervisor\Resources\Submissions\Schemas\SubmissionsForm;
use App\Filament\Supervisor\Resources\Submissions\Tables\SubmissionsTable;
use App\Models\Submission;
use App\Models\Supervisor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SubmissionsResource extends Resource
{
    protected static ?string $model = Submission::class;

    public static function getEloquentQuery(): Builder
    {
        $supervisorId = Supervisor::where('user_id', auth()->id())->value('id');

        return parent::getEloquentQuery()
        ->whereHas('group', function ($q) use ($supervisorId) {
            $q->where('supervisor_id', $supervisorId)
              ->orWhere('co_supervisor_id', $supervisorId);
        });
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Submission';

    public static function form(Schema $schema): Schema
    {
        return SubmissionsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubmissionsTable::configure($table);
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
            'index' => ListSubmissions::route('/'),
            'create' => CreateSubmissions::route('/create'),
            'edit' => EditSubmissions::route('/{record}/edit'),
        ];
    }
}
