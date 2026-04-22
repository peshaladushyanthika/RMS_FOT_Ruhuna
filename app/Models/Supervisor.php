<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{

protected $fillable = [
        'name',
        'email',
    ]; 

    public function mainGroups()
{
    return $this->hasMany(Group::class, 'supervisor_id');
}

public function coGroups()
{
    return $this->hasMany(Group::class, 'co_supervisor_id');
}
}
