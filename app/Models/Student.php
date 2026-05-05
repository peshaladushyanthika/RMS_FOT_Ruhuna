<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'stu_number', 
        // 'name',
        // 'email',
        'group_id',
    ]; 

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function group()
{
    return $this->belongsTo(Group::class);
}
}
