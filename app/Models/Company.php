<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    use HasFactory;

    // Company size
    public const SIZE_SMALL = 1;
    public const SIZE_MEDIUM = 2;
    public const SIZE_LARGE = 3;
    public const SIZE_XL = 4;
    public const SIZE_XXL = 5;

    // Company size map
    public static $sizeLabelMap = array(
        self::SIZE_SMALL => '25-50',
        self::SIZE_MEDIUM => '50-100',
        self::SIZE_LARGE => '250-500',
        self::SIZE_XL => '500-1000',
        self::SIZE_XXL => '1000+',
    );

    /**
     * Get the company's images.
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
