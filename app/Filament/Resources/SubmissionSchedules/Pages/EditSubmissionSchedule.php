<?php

namespace App\Filament\Resources\SubmissionSchedules\Pages;

use App\Filament\Resources\SubmissionSchedules\SubmissionScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubmissionSchedule extends EditRecord
{
    protected static string $resource = SubmissionScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
