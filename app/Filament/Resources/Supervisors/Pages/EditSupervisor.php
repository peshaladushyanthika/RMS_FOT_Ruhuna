<?php

namespace App\Filament\Resources\Supervisors\Pages;

use App\Filament\Resources\Supervisors\SupervisorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSupervisor extends EditRecord
{
    protected static string $resource = SupervisorResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
{
    $supervisor = $this->record;

    // update user table
    $supervisor->user->update([
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
