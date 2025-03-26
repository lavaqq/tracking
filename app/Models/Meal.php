<?php

namespace App\Models;

use App\Enums\MealType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends Model
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
        return ['type' => MealType::class];
    }

    /**
     * A meal has many meal ingredients.
     */
    public function mealIngredients(): HasMany
    {
        return $this->hasMany(MealIngredient::class);
    }
    /**
     * A meal belongs to a meal plan.
     */
    public function mealPlan(): BelongsTo
    {
        return $this->belongsTo(MealPlan::class);
    }

    /**
     * Calculate the total calories for the meal.
     * This takes into account all ingredients and their respective quantities.
     *
     * @return int The total calories.
     */
    public function getTotalCalories(): int
    {
        return $this->ingredients->sum(fn(Ingredient $ingredient): int => $ingredient->getCalories() * $ingredient->pivot->quantity);
    }
}
