<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentationPanel extends Model
{
    protected $fillable = [
        'name', 
        'presentation_date',
        'supervisor_id',
        'location',
    ]; 

    public function supervisors() 
    {
        return $this->belongsToMany(Supervisor::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
