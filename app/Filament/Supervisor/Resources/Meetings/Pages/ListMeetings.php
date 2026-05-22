<?php

namespace App\Filament\Supervisor\Resources\Meetings\Pages;

use App\Filament\Supervisor\Resources\Meetings\MeetingsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMeetings extends ListRecords
{
    protected static string $resource = MeetingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
