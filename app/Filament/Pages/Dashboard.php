<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\UsersChart;
use App\Filament\Widgets\ViewsChart;
use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?int $navigationSort = -2;

    protected function getWidgets(): array
    {
        return [
            StatsOverview::class,
            UsersChart::class,
            ViewsChart::class,
        ];
    }

    protected function getColumns(): int|array
    {
        return 2;
    }
}
