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
                                now()->months(-1)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->months(-1)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        User::query()
                            ->whereBetween('created_at', [
                                now()->months(0)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->months(0)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        User::query()
                            ->whereBetween('created_at', [
                                now()->months(1)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->months(1)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count()
                    ],
                    'borderColor' => '#11b911',
                ],
            ],
            'labels' => [
                now()->months(-1)->monthName,
                now()->months(0)->monthName,
                now()->months(1)->monthName,
            ],
        ];
    }
}
