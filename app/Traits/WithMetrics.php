<?php

namespace App\Traits;

use App\Enums\Device;
use App\Enums\MetricReferenceType;
use App\Enums\MetricType;
use App\Models\Metric;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

trait WithMetrics
{
    protected function createMetric(Request $request, string $referenceType, mixed $referenceId, string $type): void
    {
        if ($this->checkMetricExists($request, $referenceType, $referenceId, $type)) {
            return;
        }
        $country = '-';
        try {
            $country = strtolower(ip2location_country_code());
        } catch (\Exception $e) {
            //
        }
        $userAgent = new Agent();
        $userAgent->setUserAgent($request->userAgent());
        if (! $userAgent->isRobot()) {
            $metric = new Metric();
            $metric->reference_type = MetricReferenceType::fromValue($referenceType);
            $metric->reference_id = $referenceId;
            $metric->type = MetricType::fromValue($type);
            $metric->device = Device::fromValue($userAgent->deviceType());
            $metric->ip = $request->ip();
            $metric->country = $country;
            $metric->user_agent = $request->userAgent();
            $metric->referer = $this->getReferer($request);
            $metric->save();
        }
    }

    protected function getReferer(Request $request): ?string
    {
        $referer = $request->headers->get('referer');
        if ($referer) {
            $referer = parse_url($referer);
            if ($referer && isset($referer['host'])) {
                $referer = $referer['host'];
            }
        }

        if (! $referer) {
            $referer = 'direct';
        }

        return $referer;
    }

    protected function checkMetricExists(Request $request, string $referenceType, mixed $referenceId, string $type): bool
    {
        return (bool) Metric::query()
            ->where('reference_type', $referenceType)
            ->where('reference_id', $referenceId)
            ->where('type', $type)
            ->where('ip', $request->ip())
            ->whereBetween('created_at', [
                now()->format('Y-m-d').' 00:00:00',
                now()->format('Y-m-d').' 23:59:59',
            ])
            ->first();
    }
}
