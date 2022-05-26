<?php

namespace Database\Factories;

use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskStatusFactory extends Factory
{
//    /**
//     * Название модели, соответствующей фабрике.
//     *
//     * @var string
//     */
//    protected $model = TaskStatus::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $statuses = ['To Do', 'In Work', 'To Verify', 'Testing', 'Done', 'Backlog'];
        $keys = array_keys($statuses);
        $order = $this->faker->unique()->numberBetween(0, (count($statuses)-1));
//        $statuses = [
//            ['status_id' => 0, 'status_name' => 'To Do'],
//            ['status_id' => 1, 'status_name' => 'In Work'],
//            ['status_id' => 2 =>'To Verify'],
//            ['status_id' => 3 => 'Testing'],
//            ['status_id' => 4 => 'Done'],
//            ['status_id' => 5 => 'Backlog']
//        ];
        return [
            'status_id' => $keys[$order],
            'status_name' => $statuses[$order],
        ];
    }
}
