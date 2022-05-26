<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    private static $order = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $projects = ['Utilitium', '2cents', 'Stanok'];
        //$number = $this->faker->unique()->numberBetween(0, 2);
        //$number = $this->faker->unique(true)->randomElement([0, 1, 2, 3]);
        return [
            'title' => $projects[self::$order++],
        ];
    }
}
