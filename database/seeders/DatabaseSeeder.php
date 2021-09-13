<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\EducationLevel;
use App\Models\EmploymentType;
use App\Models\Geo;
use App\Models\Image;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Review;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserResume;
use Database\Factories\UserEducationFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('geo:seed TH --append');
        Artisan::call('geo:json Thailand');

        $this->call([RolesAndPermissionsSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([EducationLevelSeeder::class]);
        $this->call([EmploymentTypeSeeder::class]);
        $this->call([CompanySeeder::class]);
        $this->call([UserSeeder::class]);

        // Syncing relationships
        $this->command->comment('Syncing model relationships...');
        $categories = Category::main()->get();
        $employmentTypes = EmploymentType::all();
        User::all()->each(function($user) use ($categories) {
            $user->categories()->sync($categories->random(rand(1, 3))->pluck('id')->toArray());
        });
        UserExperience::all()->each(function($experience) use ($categories) {
            $experience->categories()->sync($categories->random(rand(1, 3))->pluck('id')->toArray());
        });
        Job::all()->each(function ($job) use ($employmentTypes, $categories) {
            $job->categories()->sync($categories->random(rand(1, 3))->pluck('id')->toArray());
            $job->employmentTypes()->attach($employmentTypes->random(rand(1, 2))->pluck('id')->toArray());
        });
        $this->command->info('Syncing complete.');
    }
}
