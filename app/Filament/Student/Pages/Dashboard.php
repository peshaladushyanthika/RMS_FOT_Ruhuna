<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    // protected string $view = 'filament.student.pages.dashboard';

    public function getHeading(): string
    {
        return 'Welcome, ' . auth()->user()->name . '!';
    }
}
