<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{

protected $fillable = [
        'submission_schedule_id',
        'group_id', 
        'type',
        'version',
        'file_path',
        'reviewed_file',
        'marks',
        'status',
        'feedback',
        'submitted_at',
    ]; 

    public function group()
{
    return $this->belongsTo(Group::class);
}

    public function schedule()
    {
        return $this->belongsTo(SubmissionSchedule::class, 'submission_schedule_id');
    }
}
