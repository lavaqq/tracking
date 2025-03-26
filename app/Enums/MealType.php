<?php

namespace App\Enums;

enum MealType: string
{
    case BREAKFAST = 'breakfast';
    case LUNCH = 'lunch';
    case DINNER = 'dinner';
    case SNACK = 'snack';

    /**
     * Get the human-readable label for the meal type in French.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::BREAKFAST => 'Petit-déjeuner',
            self::LUNCH => 'Déjeuner',
            self::DINNER => 'Dîner',
            self::SNACK => 'Snack',
        };
    }
}