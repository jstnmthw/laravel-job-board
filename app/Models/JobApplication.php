<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobApplication extends Model
{
    use HasFactory;

    // Job application status
    public const APP_SUBMITTED = 1;
    public const APP_VIEWED = 2;
    public const APP_REJECTED = 3;
    public const APP_INTERVIEW = 4;
    public const APP_HIRED = 5;

    // Job application status map
    public static $statusLabelMap = array(
        self::APP_SUBMITTED => 'submitted',
        self::APP_VIEWED => 'viewed',
        self::APP_REJECTED => 'rejected',
        self::APP_INTERVIEW => 'interview',
        self::APP_HIRED => 'hired',
    );

    /**
     * User who submitted the job application
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The job associated with application
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
