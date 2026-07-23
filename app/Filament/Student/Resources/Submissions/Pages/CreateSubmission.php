<?php

namespace App\Filament\Student\Resources\Submissions\Pages;

use App\Filament\Student\Resources\Submissions\SubmissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubmission extends CreateRecord
{
    protected static string $resource = SubmissionResource::class;
}
