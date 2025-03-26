<?php

namespace App\Models;

use App\Enums\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingredient extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return ['unit' => Unit::class];
    }

    /**
     * The meal ingredients that belong to this ingredient.
     */
    public function ingredientMeals(): HasMany
    {
        return $this->hasMany(MealIngredient::class);
    }
}
