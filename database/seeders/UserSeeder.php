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
        User::factory()
            ->has(UserExperience::factory()->count(2), 'experience')
            ->has(UserEducation::factory()->count(2), 'education')
            ->has(UserResume::factory()->count(3), 'resumes')
            ->has(Review::factory()->count(3), 'reviews')
            ->has(JobApplication::factory()->count(2), 'applications')
            ->has(Image::factory()->count(1), 'avatar')
            ->count(5)
            ->create()
            ->pluck('id')
            ->each(function($id) {
                $country = Geo::getCountry('TH');
                $province = $country->getChildren()->random();
                $city = $province->getChildren()->random();
                User::query()->where('id', '=', $id)->update([
                    'country_id' => $country->id,
                    'province_id' => $province->id,
                    'city_id' => $city->id
                ]);
            });
    }

}
