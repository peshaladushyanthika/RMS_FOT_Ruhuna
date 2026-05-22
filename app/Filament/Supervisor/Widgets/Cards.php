<?php

namespace App\Filament\Supervisor\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Group;
use App\Models\Submission;

class Cards extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $supervisor = auth()->user()?->supervisor;
        $supervisorId = $supervisor->id;

        // Main supervised groups
        $mainGroups = Group::where('supervisor_id', $supervisorId)->count();
        // Co-supervised groups
        $coGroups = Group::where('co_supervisor_id', $supervisorId)->count();
        
        // Pending submissions
        $pending = Submission::where('status', 'pending')
            ->whereHas('group', function ($query) use ($supervisorId) {
                $query->where('supervisor_id', $supervisorId)
                      ->orWhere('co_supervisor_id', $supervisorId);
            })
            ->count();

        // Approved submissions
        $approved = Submission::where('status', 'accepted')
            ->whereHas('group', function ($query) use ($supervisorId) {
                $query->where('supervisor_id', $supervisorId)
                      ->orWhere('co_supervisor_id', $supervisorId);
            })
            ->count();

        // Rejected submissions
        $rejected = Submission::where('status', 'rejected')
            ->whereHas('group', function ($query) use ($supervisorId) {
                $query->where('supervisor_id', $supervisorId)
                      ->orWhere('co_supervisor_id', $supervisorId);
            })
            ->count();

        return [
            Stat::make('Main Groups', $mainGroups)
                ->description('Groups you supervise')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary')
                ->url(route('filament.supervisor.resources.groups.index')),
            
            Stat::make('Co-supervised Groups', $coGroups)
                ->description('Groups as co-supervisor')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Pending Review', $pending)
                ->description('Waiting')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Approved Submissions', $approved)
                ->description('Completed')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Rejected Submissions', $rejected)
                ->description('Need Attention')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
