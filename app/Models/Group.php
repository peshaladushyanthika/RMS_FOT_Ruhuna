<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

protected $fillable = [
        'group_name', 
        'research_title',
        'supervisor_id',
        'co_supervisor_id',
    ]; 

    public function supervisor()
{
    return $this->belongsTo(Supervisor::class, 'supervisor_id');
}

public function coSupervisor()
{
    return $this->belongsTo(Supervisor::class, 'co_supervisor_id');
}

public function students()
{
    return $this->hasMany(Student::class);
}

public function submissions()
{
    return $this->hasMany(Submission::class);
}

public function meetings()
{
    return $this->hasMany(Meeting::class);
}
}
