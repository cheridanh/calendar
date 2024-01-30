<?php

namespace Database\Factories;

use App\Models\Calendar;
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
            'url' => $this->faker->unique()->url(),
            'calendar_id' => Calendar::factory(),
        ];
    }
}
