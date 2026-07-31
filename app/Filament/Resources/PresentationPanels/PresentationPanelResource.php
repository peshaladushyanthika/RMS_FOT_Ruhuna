<?php

namespace App\Filament\Resources\PresentationPanels;

use App\Filament\Resources\PresentationPanels\Pages\CreatePresentationPanel;
use App\Filament\Resources\PresentationPanels\Pages\EditPresentationPanel;
use App\Filament\Resources\PresentationPanels\Pages\ListPresentationPanels;
use App\Filament\Resources\PresentationPanels\Schemas\PresentationPanelForm;
use App\Filament\Resources\PresentationPanels\Tables\PresentationPanelsTable;
use App\Models\PresentationPanel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PresentationPanelResource extends Resource
{
    protected static ?string $model = PresentationPanel::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Presentation Management';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PresentationPanel';

    public static function form(Schema $schema): Schema
    {
        return PresentationPanelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PresentationPanelsTable::configure($table);
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
            'index' => ListPresentationPanels::route('/'),
            'create' => CreatePresentationPanel::route('/create'),
            'edit' => EditPresentationPanel::route('/{record}/edit'),
        ];
    }
}
