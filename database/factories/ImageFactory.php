<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(24) . '.jpg',
            'path' => storage_path('public/images'),
            'type' => 'jpg',
        ];

    }
}
