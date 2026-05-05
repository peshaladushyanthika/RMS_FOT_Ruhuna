<?php

namespace App\Filament\Resources\Supervisors\Pages;

use App\Filament\Resources\Supervisors\SupervisorResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;

class CreateSupervisor extends CreateRecord
{
    protected static string $resource = SupervisorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt('password123'),
            'role' => 'supervisor',
        ]);

        $data['user_id'] = $user->id;

        // remove fields not in students table
        unset($data['name'], $data['email']);

        return $data;
    }
}
