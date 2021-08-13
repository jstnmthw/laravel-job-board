<?php

namespace Database\Factories;

use App\Models\EducationLevel;
use App\Models\Geo;
use App\Models\UserEducation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserEducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserEducation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $geo = Geo::getCountry('TH');
        $cities = $geo->cities()->get()->toArray();
        $studied_from = $this->faker->dateTimeBetween('-15 years', now());
        $studied_to = Carbon::parse($studied_from)->addYears(2)->format('Y-m-d');
        return [
            'field' => $this->faker->sentence(3),
            'university' => $this->faker->streetName(),
            'description' => $this->faker->paragraph(),
            'education_level_id' => EducationLevel::query()->inRandomOrder()->first()->id,
            'studied_from' => $studied_from,
            'studied_to' => $studied_to,
            'enrolled' => $this->faker->boolean(),
            'city_id' => $cities[$this->faker->numberBetween(0, count($cities) - 1)]['id'],
            'country_id' => $geo->id,
        ];
    }
}
