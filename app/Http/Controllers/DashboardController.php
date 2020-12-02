<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('Dashboard', [
            'title' => __('Dashboard'),
            'menu' => 'dashboard',
            'todayVisits' => auth()->user()->stats()->whereDate('created_at', now()->format('Y-m-d'))->count()
        ]);
    }
}
