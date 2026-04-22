<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Group;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Meeting;

class StatsOverview extends StatsOverviewWidget
{
    // protected int | string | array $columnSpan = 12;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Research Groups', Group::count())
                // ->description('Total Research Groups')
                ->color('success'),
            Stat::make('Students', Student::count()),
            Stat::make('Pending Submissions', Submission::where('status', 'pending')->count())
                ->color('danger'),
            Stat::make('Upcoming Meetings',
                Meeting::whereDate('next_meeting_date', '>=', now())->count(),
)
        ];
    }
}
