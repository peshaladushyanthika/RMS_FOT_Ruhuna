<?php

namespace App\Filament\Student\Widgets;

use Filament\Widgets\Widget;
use App\Models\Meeting;
use App\Models\SubmissionSchedule;

class Alerts extends Widget
{
    protected string $view = 'filament.student.widgets.alerts';

    public function getAlerts(): array
    {
        $student = auth()->user()->student;

        $alerts = [];

        // Meeting Alerts
        $meeting = Meeting::where('group_id', $student->group_id)
            ->where('meeting_date', '>=', now())
            ->orderBy('meeting_date')
            ->first();

        if ($meeting) {
            $days = ceil(now()->diffInDays($meeting->meeting_date, false));
            $alerts[] = [
                'type' => 'meeting',
                'icon' => '📅',
                'title' => 'Supervisor Meeting',
                'message' => 
                    'You have only ' . $days . ' day' . ($days > 1 ? 's' : '') . ' until your meeting.',
            ];

        }

        // Submission Alerts

        $submissions = SubmissionSchedule::where('is_active', true)
            ->whereDoesntHave('submissions', function ($query) use ($student) {

                $query->where('group_id', $student->group_id);

            })
            ->orderBy('due_date')
            ->get();


        foreach ($submissions as $submission) {

            if ($submission->due_date >= now()) {

                // Upcoming submission
                $alerts[] = [
                    'type' => 'submission',
                    'icon' => '📄',
                    'title' => $submission->title . ' Submission',
                    'message' =>
                        'Due ' . now()->diffForHumans($submission->due_date),
                ];

            } else {

                // Late submission
                $alerts[] = [
                    'type' => 'late_submission',
                    'icon' => '🔴',
                    'title' => ' Late Submission - '. $submission->title,
                    'message' =>
                        'Deadline passed ' . '. Please submit immediately.',
                ];

            }

}

        return $alerts;
    }
}
