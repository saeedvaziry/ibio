<?php

namespace App\Actions\Metrics;

use App\Enums\MetricReferenceType;
use App\Enums\MetricType;
use App\Models\Metric;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class GetVisits
{
    public function getResults(User $user, string $fromDate, string $toDate): Collection
    {
        return Metric::query()
            ->select(DB::raw('CAST(created_at AS DATE) as date, count(*) as value'))
            ->where('reference_type', MetricReferenceType::PAGE)
            ->where('reference_id', $user->id)
            ->where('type', MetricType::VISIT)
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->groupByRaw(DB::raw('CAST(created_at AS DATE)'))
            ->get();
    }
}
