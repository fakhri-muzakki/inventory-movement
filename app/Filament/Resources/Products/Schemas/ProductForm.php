<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('supplier_id')
                    ->relationship('supplier', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                FileUpload::make('uploaded_image')
                    ->image()
                    ->imageEditor(),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('minimum_stock')
                    ->required()
                    ->numeric()
                    ->default(10),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Toggle::make('is_active')
                    ->default(true)
                    ->required(),
            ]);
    }
}
