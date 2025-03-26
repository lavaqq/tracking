<?php

namespace Database\Seeders;

use App\Enums\Unit;
use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingredient::create([
            'name' => 'Filet de poulet',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 165 / 100,
            'lipids_per_unit' => 3.6 / 100,
            'carbohydrates_per_unit' => 0 / 100,
            'proteins_per_unit' => 31 / 100,
        ]);

        Ingredient::create([
            'name' => 'Riz blanc (cuit)',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 130 / 100,
            'lipids_per_unit' => 0.3 / 100,
            'carbohydrates_per_unit' => 28 / 100,
            'proteins_per_unit' => 2.7 / 100,
        ]);

        Ingredient::create([
            'name' => 'Flocons d\'avoine',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 379 / 100,
            'lipids_per_unit' => 6.5 / 100,
            'carbohydrates_per_unit' => 68 / 100,
            'proteins_per_unit' => 13 / 100,
        ]);

        Ingredient::create([
            'name' => 'Huile d\'olive',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 884 / 100,
            'lipids_per_unit' => 100 / 100,
            'carbohydrates_per_unit' => 0 / 100,
            'proteins_per_unit' => 0 / 100,
        ]);

        Ingredient::create([
            'name' => 'Lait demi-écremé (Auchan)',
            'unit' => Unit::CENTILITER,
            'calories_per_unit' => 47 / 10,
            'lipids_per_unit' => 1.6 / 10,
            'carbohydrates_per_unit' => 4.8 / 10,
            'proteins_per_unit' => 3.3 / 10,
        ]);

        Ingredient::create([
            'name' => 'Oeuf',
            'unit' => Unit::PIECE,
            'calories_per_unit' => 140 / 2,
            'lipids_per_unit' => 9.8 / 2,
            'carbohydrates_per_unit' => 0.5 / 2,
            'proteins_per_unit' => 13 / 2,
        ]);

        Ingredient::create([
            'name' => 'Steak haché pur bœuf 15% mg (Charal)',
            'unit' => Unit::PIECE,
            'calories_per_unit' => 209,
            'lipids_per_unit' => 15,
            'carbohydrates_per_unit' => 0,
            'proteins_per_unit' => 19,
        ]);

        Ingredient::create([
            'name' => 'Fromage blanc 0% MG (Auchan)',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 46 / 100,
            'lipids_per_unit' => 0,
            'carbohydrates_per_unit' => 3.4 / 100,
            'proteins_per_unit' => 8 / 100,
        ]);

        Ingredient::create([
            'name' => 'Julienne de légumes (Auchan)',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 31 / 100,
            'lipids_per_unit' => 0.5,
            'carbohydrates_per_unit' => 5.1 / 100,
            'proteins_per_unit' => 1 / 100,
        ]);

        Ingredient::create([
            'name' => 'Trio de poivrons en lanières (Auchan)',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 25 / 100,
            'lipids_per_unit' => 0.5,
            'carbohydrates_per_unit' => 3.6 / 100,
            'proteins_per_unit' => 1 / 100,
        ]);

        Ingredient::create([
            'name' => 'Oignons émincés (Auchan)',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 23 / 100,
            'lipids_per_unit' => 0.5,
            'carbohydrates_per_unit' => 1.5 / 100,
            'proteins_per_unit' => 1.5 / 100,
        ]);

        Ingredient::create([
            'name' => 'Mélange de fruits rouges entiers (Auchan)',
            'unit' => Unit::GRAM,
            'calories_per_unit' => 46 / 100,
            'lipids_per_unit' => 0.5,
            'carbohydrates_per_unit' => 6.1 / 100,
            'proteins_per_unit' => 1.3 / 100,
        ]);

        

    }
}
