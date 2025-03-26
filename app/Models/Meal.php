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
        return $this->mealIngredients->sum(fn(MealIngredient $mealIngredient): int => $mealIngredient->ingredient->calories_per_unit * $mealIngredient->quantity);
    }

    /**
     * Calculate the total proteins for the meal.
     * This takes into account all ingredients and their respective quantities.
     *
     * @return int The total proteins in grams.
     */
    public function getTotalProteins(): int
    {
        return $this->mealIngredients->sum(fn(MealIngredient $mealIngredient): int => $mealIngredient->ingredient->proteins_per_unit * $mealIngredient->quantity);
    }

    /**
     * Calculate the total lipids for the meal.
     * This takes into account all ingredients and their respective quantities.
     *
     * @return int The total lipids in grams.
     */
    public function getTotalLipids(): int
    {
        return $this->mealIngredients->sum(fn(MealIngredient $mealIngredient): int => $mealIngredient->ingredient->lipids_per_unit * $mealIngredient->quantity);
    }

    /**
     * Calculate the total carbohydrates for the meal.
     * This takes into account all ingredients and their respective quantities.
     *
     * @return int The total carbohydrates in grams.
     */
    public function getTotalCarbohydrates(): int
    {
        return $this->mealIngredients->sum(fn(MealIngredient $mealIngredient): int => $mealIngredient->ingredient->carbohydrates_per_unit * $mealIngredient->quantity);
    }
}
