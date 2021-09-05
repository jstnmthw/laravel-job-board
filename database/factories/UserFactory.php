<?php

namespace Database\Factories;

use App\Models\Geo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Randomize Country, Province and City ID's (relational)
//        $geo = Geo::getCountry('TH');
//        $provinces = $geo->children()->get();
//        $province = $provinces[$this->faker->numberBetween(0, count($provinces) - 1)]['id'];
//        $cities = Geo::query()->find($province)->children()->get();
//        $city = $cities[$this->faker->numberBetween(0, count($cities) - 1)];

        $geo = Geo::factory()->count(3)->create();

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'dob' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'country_id' => $geo[0]->getKey(),
            'province_id' => $geo[1]->getKey(),
            'city_id' => $geo[2]->getKey(),
            'address' => $this->faker->address(),
            'zipcode' => $this->faker->postcode(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
