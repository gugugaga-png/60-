<?php

namespace App\Filament\Member\Resources\Items\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('available_stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('daily_rental_price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                Select::make('condition')
                    ->options(['good' => 'Good', 'damaged' => 'Damaged', 'maintenance' => 'Maintenance'])
                    ->default('good')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('photo'),
            ]);
    }
}
