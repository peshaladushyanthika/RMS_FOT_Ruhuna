<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'group_name' => '001',
            'research_title' => 'Data Analysis',
            'supervisor_id' => '1',
            'co_supervisor_id' => null,
        ]);
    }
}
