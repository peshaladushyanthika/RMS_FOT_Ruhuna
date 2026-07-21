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


        /*
        |--------------------------------------------------------------------------
        | Meeting Alerts
        |--------------------------------------------------------------------------
        */

        $meeting = Meeting::where('group_id', $student->group_id)
            ->where('meeting_date', '>=', now())
            ->orderBy('meeting_date')
            ->first();


        if ($meeting) {

            $alerts[] = [
                'type' => 'meeting',
                'icon' => '📅',
                'title' => 'Supervisor Meeting',
                'message' => 
                    'Your meeting is ' .
                    now()->diffForHumans($meeting->meeting_date),
            ];

        }



        /*
        |--------------------------------------------------------------------------
        | Submission Alerts
        |--------------------------------------------------------------------------
        */

        $submission = SubmissionSchedule::where('is_active', true)
            ->where('due_date', '>=', now())
            ->whereDoesntHave('submissions', function ($query) use ($student) {

                $query->where('group_id', $student->group_id);

            })
            ->orderBy('due_date')
            ->first();



        if ($submission) {

            $alerts[] = [
                'type' => 'submission',
                'icon' => '📄',
                'title' => $submission->title . ' Submission',
                'message' =>
                    'Due ' .
                    now()->diffForHumans($submission->due_date),
            ];

        }


        return $alerts;
    }
}
