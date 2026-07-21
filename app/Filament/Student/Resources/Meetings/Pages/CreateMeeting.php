<?php

namespace App\Filament\Student\Resources\Meetings\Pages;

use App\Filament\Student\Resources\Meetings\MeetingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMeeting extends CreateRecord
{
    protected static string $resource = MeetingResource::class;
}
