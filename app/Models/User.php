<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'dob',
        'address',
        'country_id',
        'province_id',
        'city_id',
        'zipcode',
        'position',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's education.
     */
    public function education(): HasMany
    {
        return $this->hasMany(UserEducation::class);
    }

    /**
     * Get the user's experience.
     */
    public function experience(): HasMany
    {
        return $this->hasMany(UserExperience::class);
    }

    /**
     * Get the users' resumes.
     */
    public function resumes(): HasMany
    {
        return $this->hasMany(UserResume::class);
    }

    /**
     * Get the user's job applications.
     */
    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    /**
     * Get the user's country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Geo::class, 'country_id', 'id');
    }

    /**
     * Get the user's province.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Geo::class, 'province_id', 'id');
    }

    /**
     * Get the user's city.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(Geo::class, 'city_id', 'id');
    }

    /**
     * Get the user's avatar.
     */
    public function avatar(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the user's categories
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
