<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\EducationLevel;
use App\Models\Geo;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::query()->truncate();
        Job::query()->truncate();
        User::query()->truncate();

        $educationLevels = EducationLevel::all();
        $country = Geo::query()->find(1605651);
        $provinces = Geo::query()
            ->where('parent_id', $country->id)
            ->orderBy('population', 'desc')
            ->limit(5)
            ->get();

        Company::factory()
            ->count(100)
            ->create()
            ->pluck('id')
            ->each(function($id) use ($educationLevels, $country, $provinces) {
                $province = $provinces->random();
                $city = Geo::query()->where('parent_id', $province->id)->get()->random();
                $user = User::factory()->count(1)->create([
                    'country_id' => $country->id,
                    'province_id' => $province->id,
                    'city_id' => $city->id
                ])->first();
                Company::query()->where('id', '=', $id)->update([
                    'created_by' => $user->id,
                    'country_id' => $country->id,
                    'province_id' => $province->id,
                    'city_id' => $city->id
                ]);
                Job::factory()->count(5)->create([
                    'education_level_id' => $educationLevels->random(),
                    'created_by' => $user->id,
                    'company_id' => $id,
                    'country_id' => $country->id,
                    'province_id' => $province->id,
                    'city_id' => $city->id
                ]);
            });
    }
}
