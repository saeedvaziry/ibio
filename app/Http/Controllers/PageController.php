<?php

namespace App\Http\Controllers;

use App\Enums\MetricReferenceType;
use App\Enums\MetricType;
use App\Models\Link;
use App\Models\User;
use App\Traits\WithMetrics;
use Illuminate\View\View;

class PageController extends Controller
{
    use WithMetrics;

    public function show(string $username): View
    {
        /** @var User $user */
        $user = User::query()->where('username', $username)->firstOrFail();

        $this->createMetric(
            request(),
            MetricReferenceType::PAGE,
            $user->id,
            MetricType::VISIT
        );

        return view('page', [
            'user' => $user,
        ]);
    }

    public function storeMetric(string $username, Link $link = null): void
    {
        /** @var User $user */
        $user = User::query()->where('username', $username)->firstOrFail();

        if ($link && $link->user_id === $user->id) {
            $this->createMetric(
                request(),
                MetricReferenceType::LINK,
                $link->id,
                MetricType::CLICK
            );

            return;
        }

        $this->createMetric(
            request(),
            MetricReferenceType::PAGE,
            $user->id,
            MetricType::VISIT
        );
    }
}
