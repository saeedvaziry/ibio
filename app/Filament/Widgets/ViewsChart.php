<?php

namespace App\Filament\Widgets;

use App\Enums\MetricType;
use App\Models\Metric;
use Filament\Widgets\LineChartWidget;

class ViewsChart extends LineChartWidget
{
    protected static ?string $heading = 'Page Views';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Page Views',
                    'data' => [
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->subMonths(2)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->subMonths(2)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->subMonths()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->subMonths()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                    ],
                    'borderColor' => '#91287f',
                ],
            ],
            'labels' => [
                now()->subMonths(2)->monthName,
                now()->subMonths()->monthName,
                now()->monthName,            ],
        ];
    }
}
