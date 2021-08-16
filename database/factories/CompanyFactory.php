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
        $geo = Geo::getCountry('TH');
        $cities = $geo->cities()->get()->toArray();
        return [
            'name' => $this->faker->company(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'social' => '{}',
            'size' => $this->faker->numberBetween(0, count(Company::$sizeLabelMap)),
            'created_by' => User::query()->inRandomOrder()->first(),
            'category_id' => Category::main()->inRandomOrder()->first(),
            'country_id' => $geo->id,
            'city_id' => $cities[$this->faker->numberBetween(0, count($cities) - 1)]['id'],
        ];
    }
}
