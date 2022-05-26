<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    private static $order = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'user_id' => $names[$number],
            'status_id' => $this->faker->unique(true)->randomElement([0, 1, 2, 3, 4, 5]),
            'title' => $this->faker->numerify('sas-1##'),
            'description' => $this->faker->sentence(4),
        ];
    }
}
