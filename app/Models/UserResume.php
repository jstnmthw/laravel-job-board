<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserResume extends Model
{
    use HasFactory;

    // Resume status
    public const STATUS_DRAFT = 1;
    public const STATUS_PUBLISHED = 2;
    public const STATUS_ARCHIVED = 3;

    // Resume status map
    public static $resumeLabelMap = array(
        self::STATUS_DRAFT => 'draft',
        self::STATUS_PUBLISHED => 'published',
        self::STATUS_ARCHIVED => 'archived',
    );

    /**
     * User that owns the resume.
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
