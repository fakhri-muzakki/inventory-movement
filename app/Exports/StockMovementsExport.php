<?php

namespace App\Exports;

use App\Models\StockMovement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class StockMovementsExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return StockMovement::with(['product', 'product.supplier', 'user'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Product Name',
            'Supplier',
            'Type',
            'Quantity',
            'Notes',
            'Created At',
        ];
    }

    public function map($movement): array
    {
        return [
            $movement->id,
            $movement->product?->name,
            $movement->product?->supplier?->name,
            $movement->type,
            $movement->quantity,
            $movement->notes,
            $movement->created_at,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                // Header style
                $sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => '1F2937'], // dark gray
                    ],
                ]);

                // Auto size column
                foreach (range('A', 'G') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}
