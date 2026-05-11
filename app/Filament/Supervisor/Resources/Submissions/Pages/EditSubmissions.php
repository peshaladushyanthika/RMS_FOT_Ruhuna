<?php

namespace App\Filament\Supervisor\Resources\Submissions\Pages;

use App\Filament\Supervisor\Resources\Submissions\SubmissionsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubmissions extends EditRecord
{
    protected static string $resource = SubmissionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
