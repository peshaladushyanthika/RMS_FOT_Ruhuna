<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Submission;

class ResearchProgressChart extends ChartWidget
{
    protected ?string $heading = 'Research Progress Chart';

    protected function getData(): array
    {
        $proposal = Submission::whereHas('schedule', function($query){
            $query->where('type','proposal');
        })
        ->where('status','accepted')
        ->count();

        $p_Pres = Submission::whereHas('schedule', function($query){
            $query->where('type','p_Pres');
        })
        ->where('status','accepted')
        ->count();

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

        $thesis = Submission::whereHas('schedule', function($query){
            $query->where('type','thesis');
        })
        ->where('status','accepted')
        ->count();

        $viva = Submission::whereHas('schedule', function($query){
            $query->where('type','viva');
        })
        ->where('status','accepted')
        ->count();

        return [
            'datasets' => [

                [
                    'label' => 'Research Groups',
                    'data' => [
                        $proposal,
                        $p_Pres,
                        $progress1,
                        $progress2,
                        $thesis,
                        $viva,
                    ],
                ],

            ],

             'labels' => [
                'Proposal',
                'Proposal_Pres',
                'Progress 1',
                'Progress 2',
                'Thesis',
                'Viva',

            ],

        
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
{
    return [
        'scales' => [
            'y' => [
                'beginAtZero' => true,
                'ticks' => [
                    'stepSize' => 1,
                    'precision' => 0,
                ],
            ],
        ],
    ];
}
}
