<?php

namespace App\Filament\Resources;

use App\Enums\MealType;
use App\Filament\Resources\MealResource\Pages;
use App\Filament\Resources\MealResource\RelationManagers;
use App\Models\Ingredient;
use App\Models\Meal;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MealResource extends Resource
{
    protected static ?string $model = Meal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Fieldset::make('')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->required(),
                        Select::make('type')
                            ->label('Type')
                            ->options(MealType::class),
                        Repeater::make('mealIngredients')
                            ->label('Ingrédients')
                            ->addActionLabel('Ajouter un ingrédient')
                            ->minItems(1)
                            ->columnSpanFull()
                            ->relationship()
                            ->schema([
                                Select::make('ingredient_id')
                                    ->label('Ingrédient')
                                    ->relationship('ingredient', 'name')
                                    ->live(onBlur: false)
                                    ->required(),
                                TextInput::make('quantity')
                                    ->label('Quantité')
                                    ->numeric()
                                    ->suffix(fn(Get $get): ?string => filled($get('ingredient_id')) ? Ingredient::find($get('ingredient_id'))->unit->value : null)
                                    ->required(),
                            ])->columns(2),
                        RichEditor::make('recipe')
                            ->label('Recette')
                            ->columnSpanFull()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeals::route('/'),
            'create' => Pages\CreateMeal::route('/create'),
            'edit' => Pages\EditMeal::route('/{record}/edit'),
        ];
    }
}
