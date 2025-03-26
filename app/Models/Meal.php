<?php

namespace App\Models;

use App\Enums\MealType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * The ingredients associated with this meal.
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'meal_ingredients')
            ->withPivot('quantity')
            ->withTimestamps();
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
