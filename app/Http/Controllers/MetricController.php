<?php

namespace App\Http\Controllers;

use App\Actions\Metrics\GetVisits;
use Inertia\Response;

class MetricController extends Controller
{
    public function index(): Response
    {
        return inertia('Metrics/Index', [
            'title' => __('Metrics'),
            'visits' => app(GetVisits::class)->getResults(
                auth()->user(),
                now()->subWeek()->startOfDay()->format('Y-m-d H:i:s'),
                now()->endOfDay()->format('Y-m-d H:i:s'),
            ),
        ]);
    }
}
