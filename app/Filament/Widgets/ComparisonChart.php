<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Borrowing;
use App\Models\Item;

class ComparisonChart extends ChartWidget
{
    protected ?string $heading = 'Perbandingan Kuantitas Barang';

   protected function getData(): array
{
    // total barang dari tabel items
    $totalStock = \App\Models\Item::sum('stock');

    // total yang sedang dipinjam
    $borrowedQty = \App\Models\Borrowing::where('status', 'approved')
        ->sum('quantity');

    // sisa tersedia
    $availableQty = $totalStock - $borrowedQty;

    return [
        'datasets' => [
            [
                'data' => [$borrowedQty, max($availableQty, 0)],
                'backgroundColor' => [
                    '#3F21AB', // dipinjam
                    '#8B65FE', // tersedia
                ],
            ],
        ],
        'labels' => ['Dipinjam', 'Tersedia'],
    ];
}

    protected function getType(): string
    {
        return 'doughnut';
    }
}