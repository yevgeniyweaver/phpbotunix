<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskTypeFactory extends Factory
{
    private static $order = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $types = ['SEO', 'Programming', 'Design', 'Testing'];
        $keys = array_keys($types);
        //$order = $this->faker->numberBetween(0, (count($types)-1));

        return [
            'type_id' => $keys[self::$order],
            'type_name' => $types[self::$order++],
        ];
    }
}
