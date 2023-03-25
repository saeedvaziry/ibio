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
                                now()->months(-1)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->months(-1)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->months(0)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->months(0)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                        Metric::query()
                            ->where('type', MetricType::VISIT)
                            ->whereBetween('created_at', [
                                now()->months(1)->startOfMonth()->format('Y-m-d H:i:s'),
                                now()->months(1)->endOfMonth()->format('Y-m-d H:i:s'),
                            ])
                            ->count(),
                    ],
                    'borderColor' => '#91287f',
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
