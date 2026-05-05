<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test Student',
            'email' => 'student@test.com',
            'password' => bcrypt('123456'),
            'role' => 'student',
        ]);

        Student::create([
            'user_id' => $user->id,
            'stu_number' => 'ST001',
            'group_id' => '1',
        ]);
    }
}
