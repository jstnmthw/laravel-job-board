<?php

namespace App\Models;

use App\Indexes\JobIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use ScoutElastic\Searchable;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $salary_from
 * @property mixed $salary_to
 * @property mixed $educationLevel
 * @property mixed $created_by
 * @property mixed $country
 * @property mixed $country_id
 * @property mixed $company
 * @property mixed $company_id
 * @property mixed $province
 * @property mixed $province_id
 * @property mixed $city
 * @property mixed $city_id
 * @property mixed $deleted_at
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Job extends Model
{
    use HasFactory, Searchable;

    /**
     * ElasticSearch Job Index
     * @var string
     */
    protected string $indexConfigurator = JobIndex::class;

    /**
     * The categories that belong to the job.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
    * The employment types that belong to the job.
     *
     * @return BelongsToMany
    */
    public function employmentTypes(): BelongsToMany
    {
        return $this->belongsToMany(EmploymentType::class);
    }

    /**
     * Owner of the job.
     *
     * @return BelongsTo
     */
    public function createdBy(): belongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Company associated with the job.
     *
     * @return BelongsTo
     */
    public function company(): belongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Education level associated with the job.
     *
     * @return BelongsTo
     */
    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class);
    }

    /**
     * Country where the job is located.
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Geo::class);
    }

    /**
     * City where the job is located.
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(Geo::class);
    }

    /**
     * Province where the job is located.
     *
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Geo::class);
    }

    /**
     * Prepare model data for ElasticSearch indexing
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'salary_from' => $this->salary_from,
            'salary_to' => $this->salary_to,
            'education_level' => $this->educationLevel->title,

            'company_id' => $this->company_id,
            'country_id' => $this->country_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,

            'company' => $this->company->name,
            'country' => $this->country->name,
            'province' => $this->province->name,
            'city' => $this->city->name,

            'updated_at' => $this->updated_at->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            'created_by' => $this->created_by,
        ];
    }

    /**
     * ElasticSearch mapping of model
     *
     * @return array
     */
    protected array $mapping = [
        'properties' => [
            'title' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ],
                ],
            ],
            'description' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ],
                ],
            ],
            'salary_from' => [
                'type' => 'scaled_float',
                'scaling_factor' => 100,
            ],
            'salary_to' => [
                'type' => 'scaled_float',
                'scaling_factor' => 100,
            ],
            'education_level' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'company_id' => [
                'type' => 'integer'
            ],
            'country_id' => [
                'type' => 'integer'
            ],
            'province_id' => [
                'type' => 'integer'
            ],
            'city_id' => [
                'type' => 'integer'
            ],
            'company' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'country' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'province' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'city' => [
                'type' => 'text',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'updated_at' => [
                'type' => 'date',
            ],
            'created_at' => [
                'type' => 'date',
            ],
            'created_by' => [
                'type' => 'integer'
            ],
        ]
    ];
}
