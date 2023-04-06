<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\LineChartWidget;

class UsersChart extends LineChartWidget
{
    protected static ?string $heading = 'Users Growing';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Registered Users',
                    'data' => [
                        User::query()
                            ->whereBetween('created_at', [
                                now()->subMonths(2)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->subMonths(2)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        User::query()
                            ->whereBetween('created_at', [
                                now()->subMonths()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->subMonths()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        User::query()
                            ->whereBetween('created_at', [
                                now()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                    ],
                    'borderColor' => '#11b911',
                ],
            ],
            'labels' => [
                now()->subMonths(2)->monthName,
                now()->subMonths()->monthName,
                now()->monthName,
            ],
        ];
    }
}
