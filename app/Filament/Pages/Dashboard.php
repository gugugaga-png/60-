<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getHeaderWidgets(): array
{
    return [
        \App\Filament\Widgets\StatsOverview::class,
    ];
}

public function getWidgets(): array
{
    return [
        \App\Filament\Widgets\BorrowedCategoryChart::class,
        \App\Filament\Widgets\ComparisonChart::class,
    ];
}
    public static function canAccess(): bool
    {
        return !auth()->user()?->isBorrower();
    }

    
}
