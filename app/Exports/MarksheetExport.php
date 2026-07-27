<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Submission;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MarksheetExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Submission::query()
            ->join(
                'submission_schedules',
                'submissions.submission_schedule_id',
                '=',
                'submission_schedules.id'
            )
            ->select(
                'submissions.group_id',

                DB::raw("
                    MAX(
                        CASE 
                            WHEN submission_schedules.type = 'proposal' 
                            THEN submissions.marks 
                        END
                    ) AS proposal
                "),

                DB::raw("
                    MAX(
                        CASE 
                            WHEN submission_schedules.type = 'p_Pres' 
                            THEN submissions.marks 
                        END
                    ) AS p_Pres
                "),

                DB::raw("
                    MAX(
                        CASE 
                            WHEN submission_schedules.type = 'progress1' 
                            THEN submissions.marks 
                        END
                    ) AS progress1
                "),

                DB::raw("
                    MAX(
                        CASE 
                            WHEN submission_schedules.type = 'progress2' 
                            THEN submissions.marks 
                        END
                    ) AS progress2
                "),

                DB::raw("
                    MAX(
                        CASE 
                            WHEN submission_schedules.type = 'thesis' 
                            THEN submissions.marks 
                        END
                    ) AS thesis
                "),

                DB::raw("
                    MAX(
                        CASE 
                            WHEN submission_schedules.type = 'viva' 
                            THEN submissions.marks 
                        END
                    ) AS viva
                "),

                DB::raw("
                    SUM(submissions.marks) AS total
                ")
            )
            ->groupBy('submissions.group_id')
            ->orderBy('submissions.group_id')
            ->get();
    
    }
     public function headings(): array
    {
        return [
            'Group ID',
            'Proposal',
            'Proposal Presentation',
            'Progress 1',
            'Progress 2',
            'Thesis',
            'Viva',
            'Total'
        ];
    }
}
