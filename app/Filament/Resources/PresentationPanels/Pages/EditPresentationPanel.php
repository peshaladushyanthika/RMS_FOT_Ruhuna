<?php

namespace App\Filament\Resources\PresentationPanels\Pages;

use App\Filament\Resources\PresentationPanels\PresentationPanelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPresentationPanel extends EditRecord
{
    protected static string $resource = PresentationPanelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
