<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;


class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();

        $department =  [
            [
                'department' => 'Sales',
            ],
            [
                'department' => 'IT',
            ],
            [
                'department' => 'Marketing',
            ],
            [
                'department' => 'Human Resources',
            ],
            [
                'department' => 'Production',
            ],
            [
                'department' => 'Logistics',
            ],
            
          ];

          Department::insert($department);

    }
}