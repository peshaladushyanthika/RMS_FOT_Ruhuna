<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // Step 1: Create user
        $user = User::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => bcrypt('password123'), // default password
            'role' => 'student',
        ]);

        // Step 2: Create student
        return new Student([
            'user_id' => $user->id,
            'stu_number' => $row['stu_number'],
            'group_id' => $row['group_id'],
        ]);

        // return new Student([
        //     'stu_number' => $row['stu_number'],
        //     'name'       => $row['name'],
        //     'email'      => $row['email'],
        //     'group_id'   => $row['group_id'],
        // ]);
    }
}
