<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionSchedule extends Model
{
     protected $fillable = [
        'title',
        'type',
        'template_file',
        'description',
        'start_date',
        'due_date',
        'is_active',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'submission_schedule_groups');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
