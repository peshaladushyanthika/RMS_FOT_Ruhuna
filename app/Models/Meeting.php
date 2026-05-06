<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

protected $fillable = [
        'group_id', 
        'supervisor_id',
        'meeting_date',
        'discussion_note',
        'next_actions',
        'next_meeting_date',
    ]; 

    public function group()
{
    return $this->belongsTo(Group::class);
}

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}
