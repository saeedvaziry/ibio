<?php

namespace App\Filament\Widgets;

use App\Models\Link;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';

    protected function getCards(): array
    {
        return [
            Card::make('Users', User::query()->count())
                ->descriptionIcon('heroicon-o-users')
                ->description('All registered users')
                ->color('success'),
            Card::make('Links', Link::query()->count())
                ->descriptionIcon('heroicon-o-link')
                ->description('All created links')
                ->color('primary'),
        ];
    }
}
