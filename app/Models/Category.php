<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 */

class Category extends Model
{
    use HasFactory;

    /*
     * The parent of the category
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    /*
     * The children of the category
     */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * The jobs that belong to the category.
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /*
     * Main categories (No parent)
     */
    static public function main(): Builder
    {
        return self::query()->where('parent_id', null);
    }
}
