<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserResume;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserResumeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserResume::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->firstOrFail();
        $fileTypes = ['pdf', 'docx', 'xls', 'ppt'];
        $fileType = $fileTypes[$this->faker->numberBetween(0, count($fileTypes) - 1)];
        return [
            'user_id' => $user->getKey(),
            'file_type' => $fileType,
            'path' => storage_path('app/public/'.Str::random().'.'.$fileType),
        ];
    }
}
