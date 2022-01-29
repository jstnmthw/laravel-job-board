<?php

namespace Database\Seeders;

use App\Models\Geo;
use App\Models\Image;
use App\Models\JobApplication;
use App\Models\Review;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserResume;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Geo::query()->find(1605651);
        $provinces = Geo::query()
            ->where('parent_id', $country->id)
            ->orderBy('population', 'desc')
            ->limit(20)
            ->get();

        User::factory()
            ->has(UserExperience::factory()->count(1), 'experience')
            ->has(UserEducation::factory()->count(1), 'education')
            ->has(UserResume::factory()->count(1), 'resumes')
            ->has(Review::factory()->count(1), 'reviews')
            ->has(JobApplication::factory()->count(1), 'applications')
            ->has(Image::factory()->count(1), 'avatar')
            ->count(300)
            ->create()
            ->pluck('id')
            ->each(function($id) use ($country, $provinces) {
                $province = $provinces->random();
                $city = Geo::query()->where('parent_id', $province->id)->get()->random();
                User::query()->where('id', '=', $id)->update([
                    'country_id' => $country->id,
                    'province_id' => $province->id,
                    'city_id' => $city->id
                ]);
            });
    }
}
