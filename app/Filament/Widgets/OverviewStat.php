<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Group;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Meeting;
use App\Models\SubmissionSchedule;

class OverviewStat extends StatsOverviewWidget
{
    protected function getStats(): array
    {
       $completedGroups = Group::whereHas('submissions', function ($query) {
            $query->whereHas('schedule', function ($q) {
                $q->where('type', 'viva');
            })
            ->where('status', 'accepted');
        })
        ->count();

        $delayedSubmissions = SubmissionSchedule::where('is_active', true)
            ->whereDate('due_date', '<', now())
            ->whereHas('groups')
            ->whereDoesntHave('submissions')
            ->count();
        return [
            Stat::make('Total Research Groups', Group::count())
                // ->description('Total Research Groups')
                ->color('success'),
            Stat::make('Students', Student::count()),
            Stat::make('Pending Submissions', Submission::where('status', 'pending')->count())
                ->color('danger'),
                
            Stat::make('Completed',$completedGroups)
                ->description('Groups completed all submissions')
                ->color('success'),
            Stat::make('Needs Attention',$delayedSubmissions)
                ->description('Groups missed deadlines')
                ->color('danger')
        ];
    }
}
