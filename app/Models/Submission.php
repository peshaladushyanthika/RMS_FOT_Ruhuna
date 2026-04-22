<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{

protected $fillable = [
        'group_id', 
        'type',
        'version',
        'file_path',
        'marks',
        'status',
        'feedback',
        'submitted_at',
    ]; 

    public function group()
{
    return $this->belongsTo(Group::class);
}
}
