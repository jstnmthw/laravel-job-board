<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Geo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'social' => '{}',
            'size' => $this->faker->numberBetween(0, count(Company::$sizeLabelMap)),
            'created_by' => $this->faker->randomDigitNotNull(),
            'category_id' => Category::main()->inRandomOrder()->first(),
            'country_id' => $this->faker->randomDigit(),
            'province_id' => $this->faker->randomDigit(),
            'city_id' => $this->faker->randomDigit(),
        ];
    }
}
