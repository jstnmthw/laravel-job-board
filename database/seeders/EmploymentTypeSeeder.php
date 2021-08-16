<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmploymentType::query()->truncate();

        // Seed top categories first
        EmploymentType::query()->insert(
            [
                ['title' => 'Full time'],
                ['title' => 'Part time'],
                ['title' => 'Contract'],
                ['title' => 'Intern'],
                ['title' => 'Temporary'],
            ]
        );
    }
}
