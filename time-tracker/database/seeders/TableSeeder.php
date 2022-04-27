<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timer;


class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timer::truncate();

        $timer =  [
            [
                'user_id' => 1,
                'worked_hours' => 7200,
                'started_at' => '2022-04-11 15:00:35',
                'stopped_at' => '2022-04-11 17:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 10800,
                'started_at' => '2022-04-11 18:00:35',
                'stopped_at' => '2022-04-11 21:00:35'
            ],
            [
                'user_id' => 2,
                'worked_hours' => 10800,
                'started_at' => '2022-04-11 18:00:35',
                'stopped_at' => '2022-04-11 21:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 10800,
                'started_at' => '2022-04-12 12:00:35',
                'stopped_at' => '2022-04-12 15:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 14400,
                'started_at' => '2022-04-13 12:00:35',
                'stopped_at' => '2022-04-13 16:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 18000,
                'started_at' => '2022-04-14 12:00:35',
                'stopped_at' => '2022-04-14 17:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 21600,
                'started_at' => '2022-04-15 12:00:35',
                'stopped_at' => '2022-04-15 18:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 21600,
                'started_at' => '2022-04-16 12:00:35',
                'stopped_at' => '2022-04-16 18:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 21600,
                'started_at' => '2022-04-17 12:00:35',
                'stopped_at' => '2022-04-17 18:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 21600,
                'started_at' => '2022-04-18 12:00:35',
                'stopped_at' => '2022-04-18 18:00:35'
            ],
            [
                'user_id' => 1,
                'worked_hours' => 21600,
                'started_at' => '2022-04-19 12:00:35',
                'stopped_at' => '2022-04-20 18:00:35'
            ],
          ];

          Timer::insert($timer);

    }
}