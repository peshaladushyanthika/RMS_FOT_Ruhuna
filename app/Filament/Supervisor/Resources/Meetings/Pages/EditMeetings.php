<?php

namespace App\Filament\Supervisor\Resources\Meetings\Pages;

use App\Filament\Supervisor\Resources\Meetings\MeetingsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMeetings extends EditRecord
{
    protected static string $resource = MeetingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
