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
                                now()->subMonth()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->subMonth()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        User::query()
                            ->whereBetween('created_at', [
                                now()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        User::query()
                            ->whereBetween('created_at', [
                                now()->addMonth()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->addMonth()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                    ],
                    'borderColor' => '#11b911',
                ],
            ],
            'labels' => [
                now()->subMonth()->monthName,
                now()->monthName,
                now()->addMonth()->monthName,
            ],
        ];
    }
}
