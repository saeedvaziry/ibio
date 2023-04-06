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
                                now()->subMonth()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->subMonth()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->addMonth()->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->addMonth()->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                    ],
                    'borderColor' => '#91287f',
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
