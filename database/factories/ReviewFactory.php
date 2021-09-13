<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'likes' => $this->faker->numberBetween(1, 5),
            'dislikes' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph(),
            'company_id' => $this->faker->randomDigitNotNull(),
            'created_by' => $this->faker->randomDigitNotNull(),
        ];
    }
}
