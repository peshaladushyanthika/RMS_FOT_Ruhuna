<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionScheduleGroups extends Model
{
     protected $fillable = [
        'submission_schedule_id',
        'group_id',
    ];

}
