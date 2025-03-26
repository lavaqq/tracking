<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MealIngredient extends Pivot
{
    public $table = 'meal_ingredient';

    public $incrementing = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * Get the meal that owns the MealIngredient
     *
     * @return BelongsTo
     */
    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class);
    }

    /**
     * Get the ingredient that is associated with this meal ingredient.
     *
     * @return BelongsTo
     */
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
