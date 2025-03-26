<?php

namespace App\Filament\Resources;

use App\Enums\Unit;
use App\Filament\Resources\IngredientResource\Pages;
use App\Filament\Resources\IngredientResource\RelationManagers;
use App\Models\Ingredient;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IngredientResource extends Resource
{
    protected static ?string $model = Ingredient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Ingrédient')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->columnSpanFull()
                            ->required(),
                        Select::make('unit')
                            ->label('Unité')
                            ->required()
                            ->options(Unit::class),
                        TextInput::make('calories_per_unit')
                            ->required()
                            ->label('Calories par unité')
                            ->suffix('kcal')
                            ->numeric(),
                            TextInput::make('lipids_per_unit')
                            ->required()
                            ->label('Lipides par unité')
                            ->suffix('g')
                            ->numeric(),
                            TextInput::make('carbohydrates_per_unit')
                            ->required()
                            ->label('Glucides par unité')
                            ->suffix('g')
                            ->numeric(),
                            TextInput::make('proteins_per_unit')
                            ->required()
                            ->label('Proteines par unité')
                            ->suffix('g')
                            ->numeric(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('unit')
                    ->label('Unité')
                    ->searchable(),
                TextColumn::make('calories_per_unit')
                    ->label('Calories par unité')
                    ->suffix(' kcal')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lipids_per_unit')
                    ->label('Lipides par unité')
                    ->suffix(' g')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('carbohydrates_per_unit')
                    ->label('Glucides par unité')
                    ->suffix(' g')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proteins_per_unit')
                    ->label('Proteines par unité')
                    ->suffix(' g')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListIngredients::route('/'),
            'create' => Pages\CreateIngredient::route('/create'),
            'edit' => Pages\EditIngredient::route('/{record}/edit'),
        ];
    }
}
