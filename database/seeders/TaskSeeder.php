<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Task::create([
            'task_name' => 'Task 1',
            'priority' => 1,
            'project_id' => 1,
        ]);

        Task::create([
            'task_name' => 'Task 2',
            'priority' => 2,
            'project_id' => 2,
        ]);

        Task::create([
            'task_name' => 'Task 3',
            'priority' => 3,
            'project_id' => 3,
        ]);
    }
}
