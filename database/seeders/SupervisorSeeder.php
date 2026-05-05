<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Supervisor;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'supervisor',
            'email' => 'sup@test.com',
            'password' => bcrypt('123456'),
            'role' => 'supervisor',
        ]);
        
        Supervisor::create([
            'user_id' => $user->id,
        ]);
    }
}
