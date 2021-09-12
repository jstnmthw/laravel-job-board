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
        $geo = Geo::getCountry('TH');
        $cities = $geo->cities()->get()->toArray();
        $salary_from = $this->faker->numberBetween(15000, 150000);
        return [
            'title' => $this->faker->sentence(1).' '.$this->faker->jobTitle().' '.$this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'salary_from' => $salary_from,
            'salary_to' => $this->faker->boolean ? $salary_from + $this->faker->numberBetween(10000, 50000) : null,
            'created_by' => User::query()->inRandomOrder()->first()->id,
            'company_id' => Company::query()->inRandomOrder()->first()->id,
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
            'city_id' => $cities[$this->faker->numberBetween(0, count($cities) - 1)]['id'],
            'country_id' => $geo->id,
        ];
    }
}
