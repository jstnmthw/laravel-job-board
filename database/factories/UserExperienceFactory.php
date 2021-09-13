<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Geo;
use App\Models\UserExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserExperience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $bool = $this->faker->boolean();
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'end_date' => $bool ? null : $this->faker->date(),
            'employed' => $bool,
            'company_id' => $bool ? Company::query()->inRandomOrder()->firstOrFail() : null,
            'company_name' => $bool ? null : $this->faker->company(),
            'city_id' => $this->faker->randomDigitNotNull(),
            'country_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
