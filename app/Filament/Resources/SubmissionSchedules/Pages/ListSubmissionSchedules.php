<?php

namespace App\Filament\Resources\SubmissionSchedules\Pages;

use App\Filament\Resources\SubmissionSchedules\SubmissionScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubmissionSchedules extends ListRecords
{
    protected static string $resource = SubmissionScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
