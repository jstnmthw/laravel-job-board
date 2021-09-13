<?php

namespace Database\Seeders;

use App\Models\Company;
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
        Company::factory()
            ->count(500)
            ->create()
            ->pluck('id')
            ->each(function($id) {
                $country = Geo::getCountry('TH');
                $province = $country->getChildren()->random();
                $city = $province->getChildren()->random();
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
                    'created_by' => $user->id,
                    'company_id' => $id,
                    'country_id' => $country->id,
                    'province_id' => $province->id,
                    'city_id' => $city->id
                ]);
            });
    }
}
