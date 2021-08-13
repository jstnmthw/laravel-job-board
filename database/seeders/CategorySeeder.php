<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->truncate();

        // Need to manually insert time into created_at and updated_at
        $now = now('UTC');

        // Seed top categories first
        Category::query()->insert(
            [
                [
                    'title' => 'Accounting',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Admin & HR',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Banking / Finance',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Beauty Care / Health',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Building & Construction',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Design',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'E-commerce',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Education',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Engineering',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Hospitality / F & B',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Information Technology (IT)',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Insurance',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Manufacturing',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Marketing / Public Relations',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Media & Advertising',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Medical Services',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Merchandising & Purchasing',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Professional Services',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Property',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Public / Civil',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Sales, CS & Business Dev',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Sciences, Lab, R&D',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Telecom',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Transportation & Logistics',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                ],
            ]
        );

        // Then seed child categories
        $cat = Category::query()->select('id')->where('title', 'Accounting')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'General Accounting',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Audit',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Credit Control',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Taxation',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Admin & HR')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Administration / Operation / Clerical Support',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Compensation & Benefits',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Employee Relations',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Recruitment / Executive Search',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Secretary / Personal Assistant',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Training & Development',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Banking / Finance')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Analysis',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Asset Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Bancassurance',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Corporate Banking',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Corporate Finance',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Credit Analysis / Approval',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Credit Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Equities / Capital Markets',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Financial Services',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Fund Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Investment',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Loan',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Mortgage',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Private Banking',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Risk Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Retail Banking',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Treasury',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Wealth Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Beauty Care / Health')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Spa Therapist / Fitness / Sports & Recreation',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Building & Construction')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Architectural Servicesn',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Building / Construction / QS',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Civil / Structural',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Design')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Fashion',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Graphics',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Industrial / Product',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Interior',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Multi-media',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Visual Merchandising',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Web Design',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'E-commerce')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Business Development',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Marketing - Brand / Product Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Product Management / Business Analyst',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Software Development',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Supply Chain',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Education')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Lecturer / Professor',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Librarian',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Teacher',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Tutor / Instructor',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Engineering')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Chemical',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Electrical / Electronics',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Energy / Natural Resources',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Engineering Project Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Health / Safety / Environmental',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Industrial',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Maintenance',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Manufacturing & Production',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Mechanical',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Telecommunication / Wireless / Radio',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Hospitality / F & B')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'F & B',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Operation',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Tourism / Travel Agency',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Information Technology (IT)')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Application Specialist - Network',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Application Specialist - Software',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Data Scientist',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'DBA',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Hardware',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Internet / SEO',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'IT Auditing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'MIS',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'IT Project Management / Team Lead',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Mobile / Wireless Communications',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Network & System',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Security',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Programming',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Frontend Developer',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Backend Developer',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Software Development',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Webmaster',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Web Designer',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Support',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'IT Consulting',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Testing / QA',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'UI/UX Designer',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Insurance')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Actuarial',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Claims Officer',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Insurance Agent / Broker',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Underwriter',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Management')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'General Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Management Trainee',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Top Executives (CEO, CFO, CTO, GM, MD etc.)',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Manufacturing')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Garment/ Textile',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'General / Production',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Gems & Jewelry',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Manufacturing Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Printing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Product Development / Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Production Planning / Control',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Quality Assurance, Control & Testing / ISO',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Marketing / Public Relations')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Marketing / Public Relations',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Digital Marketing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Brand / Product Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Direct Marketing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Marketing General',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Market Research',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Marketing Communication',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Copy-writing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Event Marketing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'PR General',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Media & Advertising')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Editorial / Journalism',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Broadcasting - TV / Radio',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Creative / Design',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Photography / Video',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Print Media',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Production',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Strategic Planning',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Medical Services')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Doctor / Practitioner / Surgeon',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Medical Services Technician',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Nursing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Pharmaceutical',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Specialist',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Veterinarian',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Merchandising & Purchasing')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Garment',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Household',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Procurement / Purchasing / Sourcing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Industrial',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Merchandising - Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
            ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Professional Services')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Business Analysis / Data Analysis',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Business Consultancy',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Legal & Compliance',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Translation',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Property')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Property Consultancy',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Property Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Public / Civil')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Civil Services',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Military / defense',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Social Services / Non-profit Organization',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Utilities',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Sales, CS & Business Dev')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Account Servicing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Business Development',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Call Centre',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Channel / Distribution',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Customer Service',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Direct',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Retail Sales',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Sales Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Sales Administration',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Technical Sales / Sales Engineer',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Tele-sales (Telemarketing)',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Wholesale',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Sciences, Lab, R&D')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Biotechnology',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Chemical',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Energy / Natural Resources / Oil & Gas',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Environmental Science / Waste Management',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Food Science',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Laboratory',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Life Science',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Research & Development (R&D)',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Telecom')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'GSM Engineering',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Network Administration',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'O & M Engineering',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'RF - Planning / Installation / Administration',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Switching Engineering',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'System Administration',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'System Engineering',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Systems Security',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Telecommunications Technical support',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Transportation & Logistics')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Airline',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Automotive',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Aviation Services',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Export Import',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Freight Forwarding',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Inventory / Warehousing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Shipping',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Supply Chain',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );

        $cat = Category::query()->select('id')->where('title', 'Others')->firstOrFail();
        Category::query()->insert(
            [
                [
                    'title' => 'Agriculture / Forestry / Fishing',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Artists / Singers / Musicians / Model',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Geologist',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Mining',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Skill worker',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Student / Fresh Graduate / No Experience',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Technician',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Trading',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
                [
                    'title' => 'Others',
                    'created_at' => $now,
                    'updated_at' => $now,
                    'parent_id' => $cat->id,
                ],
            ]
        );
    }
}
