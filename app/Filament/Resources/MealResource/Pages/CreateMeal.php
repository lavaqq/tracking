<?php

namespace App\Filament\Resources\MealResource\Pages;

use App\Filament\Resources\MealResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMeal extends CreateRecord
{
    protected static string $resource = MealResource::class;

    public static function canCreateAnother(): bool
    {
        return false;
    }

    public function getHeading(): string
    {
        return 'Créer un nouveau repas ou snack';
    }
}
