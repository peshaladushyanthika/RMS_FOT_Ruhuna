<?php

namespace App\Filament\Resources\Students\Pages;

use App\Filament\Resources\Students\StudentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Models\User;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
{
    $student = $this->record;

    // update user table
    $student->user->update([
        'name' => $data['name'],
        'email' => $data['email'],
    ]);

    // remove non-student fields
    unset($data['name'], $data['email']);

    return $data;
}

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
