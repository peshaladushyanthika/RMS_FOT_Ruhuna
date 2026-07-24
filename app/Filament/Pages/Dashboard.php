<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getHeading(): string
    {
        return 'Welcome, ' . auth()->user()->name . '!';
    }

    // public function getSubheading(): ?string
    // {
    //     return 'Research Management System Dashboard';
    // }
}