<?php

namespace App\Enums;

enum Unit: string
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
     * Get an associative array of unit values and their labels.
     *
     * @return array<string, string> An associative array where the key is the unit value and the value is the corresponding label.
     *
     */
    public static function select(): array
    {
        foreach (self::cases() as $case) {
            $data[$case->value] = $case->getLabel();
        }
        return $data;
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

    /**
     * Return all the cases of the Unit enum.
     *
     * @return array<int, static> An array of all the cases of the Unit enum.
     */
    public static function all(): array
    {
        return self::cases();
    }
}