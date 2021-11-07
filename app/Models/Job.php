<?php

namespace App\Models;

use App\Indexes\JobIndex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use ScoutElastic\Searchable;

class Job extends Model
{
    use HasFactory, Searchable;

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
     * Prepare model data for ElasticSearch indexing
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return $this->toArray();
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
                'analyzer' => 'autocomplete',
                'search_analyzer' => 'autocomplete',
                'fields' => [
                    'raw' => [
                        'type' => 'keyword'
                    ],
                ],
            ],
        ]
    ];
}
