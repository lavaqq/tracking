<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MealType: string implements HasLabel
{
    case BREAKFAST = 'breakfast';
    case LUNCH = 'lunch';
    case DINNER = 'dinner';
    case SNACK = 'snack';

    /**
     * Get the human-readable label for the meal type in French.
     */
    public function getLabel(): ?string
    {
        return match ($this) {
            self::BREAKFAST => 'Petit-déjeuner',
            self::LUNCH => 'Déjeuner',
            self::DINNER => 'Dîner',
            self::SNACK => 'Snack',
        };
    }

    /**
     * Returns a random meal type.
     *
     * @return static
     */
    public static function random(): static
    {
        return self::cases()[random_int(0, count(self::cases()) - 1)];
    }
}
