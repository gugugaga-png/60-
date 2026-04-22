<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Borrowing;
use App\Models\Item;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
     protected int|string|array $columnSpan = 'full';

    protected function getColumns(): int
    {
        return 3;
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Sedang Dipinjam', Borrowing::where('status', 'borrowed')->count())
                ->description('7 hari terakhir')
                ->chart($this->getBorrowedChart())
                ->color('primary'),

            Stat::make('Barang Tersedia', Item::where('stock', '>', 0)->count())
                ->description('Stok tersedia')
                ->chart($this->getStockChart())
                ->color('primary'),

            Stat::make('Sudah Dikembalikan', Borrowing::where('status', 'returned')->count())
                ->description('7 hari terakhir')
                ->chart($this->getReturnedChart())
                ->color('primary'),
        ];
    }

    private function getBorrowedChart(): array
    {
        return collect(range(6, 0))->map(function ($day) {
            return Borrowing::where('status', 'borrowed')
                ->whereDate('created_at', Carbon::now()->subDays($day))
                ->count();
        })->toArray();
    }

    private function getReturnedChart(): array
    {
        return collect(range(6, 0))->map(function ($day) {
            return Borrowing::where('status', 'returned')
                ->whereDate('updated_at', Carbon::now()->subDays($day))
                ->count();
        })->toArray();
    }

    private function getStockChart(): array
    {
        return collect(range(6, 0))->map(function ($day) {
            return Item::where('stock', '>', 0)->count();
        })->toArray();
    }
}