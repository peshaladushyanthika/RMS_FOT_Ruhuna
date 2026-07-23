<?php

namespace App\Filament\Student\Resources\Submissions\Pages;

use App\Filament\Student\Resources\Submissions\SubmissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Student\Resources\Submissions\Widgets\PendingSubmissions;

class ListSubmissions extends ListRecords
{
    protected static string $resource = SubmissionResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            PendingSubmissions::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
