<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Borrowing;
use Carbon\Carbon;

class BorrowedCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Kuantitas Peminjaman per Kategori (7 Hari Terakhir)';

    protected function getData(): array
    {
        // Ambil kategori dan group (berdasarkan kuantitas tertinggi)
        $categories = Borrowing::with('item.category')
            ->get()
            ->groupBy(fn ($b) => optional($b->item?->category)->name ?? 'Tanpa Kategori')
            ->map(fn ($group) => $group->sum('quantity')) // hitung total kuantitas
            ->sortDesc()
            ->take(5)
            ->keys(); // ambil hanya nama kategorinya

        // Label hari (7 hari terakhir)
        $days = collect(range(6, 0))->map(fn ($day) => 
            Carbon::now()->subDays($day)->format('d M')
        )->toArray();

        // Warna tiap kategori
        $colors = [
            '#3F21AB', // ungu tua
            '#8B65FE', // ungu muda
            '#DE65FE', // pink
            '#7F21AB', // ungu medium
            '#FEA619', // orange
        ];

        $datasets = [];

        foreach ($categories as $index => $categoryName) {
            $data = collect(range(6, 0))->map(function ($day) use ($categoryName) {
                return Borrowing::whereHas('item.category', function ($q) use ($categoryName) {
                        $q->where('name', $categoryName);
                    })
                    ->whereDate('created_at', Carbon::now()->subDays($day))
                    ->sum('quantity'); // GANTI: count() -> sum('quantity')
            });

            $datasets[] = [
                'label' => $categoryName,
                'data' => $data,
                'borderColor' => $colors[$index % count($colors)],
                'backgroundColor' => $colors[$index % count($colors)],
                'fill' => false,
                'tension' => 0.4,
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $days,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}