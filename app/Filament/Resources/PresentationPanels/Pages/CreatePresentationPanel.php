<?php

namespace App\Filament\Resources\PresentationPanels\Pages;

use App\Filament\Resources\PresentationPanels\PresentationPanelResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePresentationPanel extends CreateRecord
{
    protected static string $resource = PresentationPanelResource::class;

//    public function getGroups()
//     {
//         $supervisorIds = $this->record
//             ->supervisors()
//             ->pluck('supervisors.id');

//         return Group::with('supervisor.user')
//             ->whereIn('supervisor_id', $supervisorIds)
//             ->get();
//     }
}
