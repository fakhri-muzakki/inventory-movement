<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InventoryStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make(
                'Products',
                Product::count()
            )
                ->description('Total products')
                ->descriptionIcon('heroicon-m-cube'),

            Stat::make(
                'Categories',
                Category::count()
            )
                ->description('Total categories')
                ->descriptionIcon('heroicon-m-tag'),

            Stat::make(
                'Suppliers',
                Supplier::count()
            )
                ->description('Total suppliers')
                ->descriptionIcon('heroicon-m-building-office'),

            Stat::make(
                'Low Stock',
                Product::query()
                    ->whereColumn(
                        'stock',
                        '<=',
                        'minimum_stock'
                    )
                    ->count()
            )
                ->description('Need restock')
                ->descriptionIcon('heroicon-m-exclamation-triangle'),

        ];
    }
}
