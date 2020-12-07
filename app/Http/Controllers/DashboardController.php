<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClickResource;
use App\Traits\HasStats;

class DashboardController extends Controller
{
    use HasStats;

    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Exception
     */
    public function index()
    {
        return inertia('Dashboard', [
            'title' => __('Dashboard'),
            'menu' => 'dashboard',
            'hasVisits' => auth()->user()->stats()->first() ? true : false,
            'visits' => $this->getVisitsStats(auth()->user()),
            'clicks' => $this->getClicksStats(auth()->user()),
            'recentClicks' => ClickResource::collection(auth()->user()->recentClicks()->with('statable')->take(10)->get())
        ]);
    }
}
