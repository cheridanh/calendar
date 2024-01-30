<?php

namespace Database\Seeders;

use App\Models\Calendar;
use App\Models\CalendarLink;
use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendar = Calendar::factory()->count(5)
            ->has(CalendarLink::factory()->count(2), 'links')
            ->create();
    }
}
