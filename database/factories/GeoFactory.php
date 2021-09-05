<?php

namespace Database\Factories;

use App\Models\Geo;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Geo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->randomDigit(),
            'left' => $this->faker->numberBetween(1,999),
            'right' => $this->faker->numberBetween(1,999),
            'depth' => $this->faker->numberBetween(0,2),
            'name' => $this->faker->city(),
            'alternames' => [$this->faker->city()],
            'country' => strtoupper($this->faker->languageCode()),
            'a1code' => $this->faker->numberBetween(0,99),
            'level' => Geo::LEVELS_ARRAY[$this->faker->numberBetween(0,4)],
            'population' => $this->faker->numerify('#########'),
            'lat' => $this->faker->latitude(),
            'long' => $this->faker->longitude(),
            'timezone' => $this->faker->timezone(),
        ];
    }
}
