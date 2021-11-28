<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\EducationLevel;
use App\Models\Job;
use App\Models\User;
use App\Models\Geo;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $salary_from = $this->faker->numberBetween(15000, 150000);
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'salary_from' => $salary_from,
            'salary_to' => $this->faker->boolean ? $salary_from + $this->faker->numberBetween(10000, 50000) : null,
            'created_by' => $this->faker->randomDigitNotNull(),
            'company_id' => $this->faker->randomDigitNotNull(),
            'education_level_id' => $this->faker->randomDigitNotNull(),
            'country_id' => $this->faker->randomDigitNotNull(),
            'province_id' => $this->faker->randomDigitNotNull(),
            'city_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
