<?php

namespace App\Filament\Supervisor\Resources\Submissions\Pages;

use App\Filament\Supervisor\Resources\Submissions\SubmissionsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubmissions extends ListRecords
{
    protected static string $resource = SubmissionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
