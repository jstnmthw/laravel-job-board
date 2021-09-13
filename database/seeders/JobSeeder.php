<?php

namespace Database\Seeders;

use App\Models\Geo;
use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::query()->truncate();
        Job::factory()
            ->count(1000)
            ->create()
            ->pluck('id')
            ->each(function($id) {
                $job = Job::query()->findOrFail($id);
                $country = Geo::getCountry('TH');
                $province = $country->getChildren()->random();
                $city = $province->getChildren()->random();
                $job->country_id = $country->id;
                $job->province_id = $province->id;
                $job->city_id  = $city->id;
                $job->save();
            });
    }
}
