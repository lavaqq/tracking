<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Unit: string implements HasLabel
{
    case GRAM = 'g';
    case KILOGRAM = 'kg';
    case MILLILITER = 'ml';
    case CENTILITER = 'cl';
    case LITER = 'l';
    case PIECE = 'piece';

    /**
     * Return the label of the unit.
     *
     * @return string|null the label of the unit, or null if the unit doesn't have a label.
     */
    public function getLabel(): ?string
    {
        return match ($this) {
            self::GRAM => 'Grammes',
            self::KILOGRAM => 'Kilogrammes',
            self::MILLILITER => 'Millilitres',
            self::CENTILITER => 'Centilitres',
            self::LITER => 'Litres',
            self::PIECE => 'Pièce',
            default => null,
        };
    }

    /**
     * Get a random unit case.
     *
     * @return static A randomly selected unit case.
     */
    public static function random(): static
    {
        return self::cases()[random_int(0, count(self::cases()) - 1)];
    }
}