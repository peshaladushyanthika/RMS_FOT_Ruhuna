<?php

namespace App\Filament\Resources\PresentationPanels\Pages;

use App\Filament\Resources\PresentationPanels\PresentationPanelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPresentationPanels extends ListRecords
{
    protected static string $resource = PresentationPanelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
