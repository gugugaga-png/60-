<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\Dashboard;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use App\Filament\Pages\MyBorrowings;
use App\Http\Middleware\OnlyAdmin;
use App\Filament\Widgets\BorrowedCategoryChart;
use App\Filament\Widgets\ComparisonChart;
use App\Filament\Widgets\StatsOverview;

class AdminPanelProvider extends PanelProvider
{
    public function boot()
    {
        // Mendaftarkan CSS kustom ke Filament
        FilamentView::registerRenderHook(
            'panels::head.done',
            fn (): string => Blade::render("@vite('resources/css/app.css')"),
        );
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->sidebarCollapsibleOnDesktop(true)
            ->login()
            ->colors([
                'primary' => Color::Indigo,
            ])
           
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->pages([
                Dashboard::class,
              
                MyBorrowings::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // Widget statistik di paling atas
                StatsOverview::class,
                // Chart di bawah widget statistik
                BorrowedCategoryChart::class,
                ComparisonChart::class,
                // Widget bawaan Filament dihapus (AccountWidget dan FilamentInfoWidget)
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                OnlyAdmin::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                \App\Http\Middleware\RedirectBorrower::class,
            ]);
    }
}