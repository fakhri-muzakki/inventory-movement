<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LowStockProducts extends TableWidget
{
    protected static ?string $heading =
    'Low Stock Products';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Product::query()
                    ->whereColumn(
                        'stock',
                        '<=',
                        'minimum_stock'
                    )
            )
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('stock')
                    ->badge()
                    ->color('danger'),

                TextColumn::make('minimum_stock')
                    ->badge(),

                TextColumn::make('category.name')
                    ->label('Category'),

                TextColumn::make('supplier.name')
                    ->label('Supplier'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
