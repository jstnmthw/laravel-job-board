<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\EducationLevel;
use App\Models\EmploymentType;
use App\Models\Geo;
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
        Geo::query()->truncate();
        Artisan::call('geo:seed TH --append');

        Category::query()->truncate();
        $this->call([CategorySeeder::class]);

        $categories = Category::main()->get();

        EducationLevel::query()->truncate();
        $this->call([EducationLevelSeeder::class]);

        EmploymentType::query()->truncate();
        $this->call([EmploymentTypeSeeder::class]);

        $employmentTypes = EmploymentType::all();

        // Employers
        User::query()->truncate();
        User::factory(10)->create();

        Company::query()->truncate();
        Company::factory(10)->create();

        Job::query()->truncate();
        Job::factory(10)
            ->create();

        // Job seekers
        UserExperience::query()->truncate();
        UserEducation::query()->truncate();
        UserResume::query()->truncate();
        User::factory(10)
            ->has(UserExperience::factory()->count(2), 'experience')
            ->has(UserEducation::factory()->count(2), 'education')
            ->has(UserResume::factory()->count(3), 'resumes')
            ->has(JobApplication::factory()->count(2), 'applications')
            ->create();

//        UserResume::all()->each(function($resume) use ($employmentTypes) {
//            $resume->employmentTypes()->attach($employmentTypes->random(rand(1, 3))->pluck('id')->toArray());
//        });

        UserExperience::all()->each(function($experience) use ($categories) {
            $experience->categories()->sync($categories->random(rand(1, 3))->pluck('id')->toArray());
        });

        DB::table('employment_type_job')->truncate();
        Job::all()->each(function ($job) use ($employmentTypes, $categories) {
            $job->employmentTypes()->attach($employmentTypes->random(rand(1, 3))->pluck('id')->toArray());
            $job->categories()->sync($categories->random(rand(1, 3))->pluck('id')->toArray());
        });

        Review::query()->truncate();
        Review::factory(10)
            ->has(Review::factory()->count(1), 'children')
            ->create();
    }
}
