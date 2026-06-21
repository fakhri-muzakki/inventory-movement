<?php

namespace App\Filament\Resources\StockMovements\Pages;

use App\Exports\StockMovementsExport;
use App\Filament\Resources\StockMovements\StockMovementResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListStockMovements extends ListRecords
{
    protected static string $resource = StockMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    return Excel::download(new StockMovementsExport, 'stockmovement.xlsx');
                }),
            CreateAction::make()->icon('heroicon-o-plus'),
        ];
    }
}
