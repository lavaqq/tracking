<?php

namespace App\Filament\Resources\IngredientResource\Pages;

use App\Filament\Resources\IngredientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIngredient extends CreateRecord
{
    protected static string $resource = IngredientResource::class;

    public static function canCreateAnother(): bool
    {
        return false;
    }

    public function getHeading(): string
    {
        return 'Créer un ingrédient';
    }
}
