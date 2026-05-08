<?php

namespace App\Filament\Student\Widgets;

use Filament\Widgets\Widget;

class GroupOverview extends Widget
{
    protected string $view = 'filament.student.widgets.group-overview';

    protected function getViewData(): array
{
    $user = auth()->user();

    $student = $user?->student;

    if (!$student || !$student->group) {
        return [
            'group' => null,
            'students' => collect(),
            'supervisor' => null,
        ];
    }

    $group = $student->group;

    return [
        'group' => $group,
        'students' => $group->students ?? collect(),
        'supervisor' => $group->supervisor,
    ];
}
}
