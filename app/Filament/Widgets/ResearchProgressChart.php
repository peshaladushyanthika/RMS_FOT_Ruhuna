<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Submission;

class ResearchProgressChart extends ChartWidget
{
    protected ?string $heading = 'Research Progress Chart';

    protected function getData(): array
    {
        $progress1 = Submission::whereHas('schedule', function($query){
            $query->where('type','progress1');
        })
        ->where('status','accepted')
        ->count();

         $progress2 = Submission::whereHas('schedule', function($query){
            $query->where('type','progress2');
        })
        ->where('status','accepted')
        ->count();

        $viva = Submission::whereHas('schedule', function($query){
            $query->where('type','viva');
        })
        ->where('status','accepted')
        ->count();

//         dd(
//     \App\Models\SubmissionSchedule::pluck('type')
// );

        // $completed = Group::where('progress_stage', 'Completed')->count();

        return [
            'datasets' => [

                [
                    'label' => 'Research Groups',
                    'data' => [
                        $progress1,
                        $progress2,
                        $viva,
                        // $completed,
                    ],
                ],

            ],

             'labels' => [

                'Progress 1',
                'Progress 2',
                'Viva',
                // 'Completed',

            ],

        
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
