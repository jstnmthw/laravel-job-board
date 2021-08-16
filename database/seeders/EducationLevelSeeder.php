<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationLevel::query()->truncate();

        // Seed top categories first
        EducationLevel::query()->insert(
            [
                ['title' => 'High School'],
                ['title' => 'Associate Degree'],
                ['title' => 'Bachelor\'s Degree'],
                ['title' => 'Graduate Degree'],
                ['title' => 'Professional Degree'],
                ['title' => 'Master Degree'],
                ['title' => 'PhD'],
            ]
        );
    }
}
