<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{

protected $fillable = [
        'user_id',
        // 'name',
        // 'email',
    ]; 

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function mainGroups()
{
    return $this->hasMany(Group::class, 'supervisor_id');
}

public function coGroups()
{
    return $this->hasMany(Group::class, 'co_supervisor_id');
}
}
