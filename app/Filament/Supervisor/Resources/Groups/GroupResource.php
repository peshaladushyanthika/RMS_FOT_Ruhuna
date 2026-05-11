<?php

namespace App\Filament\Supervisor\Resources\Groups;

use App\Filament\Supervisor\Resources\Groups\Pages\CreateGroup;
use App\Filament\Supervisor\Resources\Groups\Pages\EditGroup;
use App\Filament\Supervisor\Resources\Groups\Pages\ListGroups;
use App\Filament\Supervisor\Resources\Groups\Schemas\GroupForm;
use App\Filament\Supervisor\Resources\Groups\Tables\GroupsTable;
use App\Models\Group;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('supervisor_id', auth()->id())
            ->orWhere('co_supervisor_id', auth()->id());
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'supervisor groups';

    public static function form(Schema $schema): Schema
    {
        return GroupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GroupsTable::configure($table);
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
            'index' => ListGroups::route('/'),
            'create' => CreateGroup::route('/create'),
            'edit' => EditGroup::route('/{record}/edit'),
        ];
    }
}
