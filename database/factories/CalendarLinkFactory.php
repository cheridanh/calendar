<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalendarLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lnk1' => $this->faker->unique()->url(),
            'link2' => $this->faker->unique()->url(),
        ];
    }
}
