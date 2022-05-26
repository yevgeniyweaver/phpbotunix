<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Database\Factories\TaskStatusFactory;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::factory()->count(6)->create();
    }
}
