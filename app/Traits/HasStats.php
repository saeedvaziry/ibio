<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

trait HasStats
{
    /**
     * @param Request $request
     * @param $statable
     */
    protected function createStat(Request $request, $statable)
    {
        $country = '-';
        try {
            $country = strtolower(ip2location_country_code());
        } catch (\Exception $e) {
            //
        }
        $userAgent = new Agent();
        $userAgent->setUserAgent($request->userAgent());
        if (!$userAgent->isRobot()) {
            $statable->stats()->create([
                'device' => $this->getDevice($userAgent),
                'os' => $userAgent->platform(),
                'ip' => $request->ip(),
                'country' => $country,
                'is_mobile' => $userAgent->isMobile(),
                'is_desktop' => $userAgent->isDesktop(),
                'is_tablet' => $userAgent->isTablet(),
                'user_agent' => $request->userAgent(),
                'referer' => $this->getReferer($request),
                'date' => now()->format('Y-m-d')
            ]);
        }
    }

    /**
     * @param Agent $agent
     * @return string
     */
    protected function getDevice(Agent $agent)
    {
        if ($agent->isMobile()) {
            return 'mobile';
        }
        if ($agent->isTablet()) {
            return 'tablet';
        }
        if ($agent->isDesktop()) {
            return 'desktop';
        }

        return 'unknown';
    }

    /**
     * @param User $user
     * @param int $days
     * @return array
     * @throws \Exception
     */
    protected function getVisitsStats(User $user, $days = 7)
    {
        $stats = [];
        $dates = create_date_range(now()->subDays($days)->format('Y-m-d'), now()->format('Y-m-d'));
        foreach ($dates as $date) {
            array_push($stats, [
                'date' => jdate($date)->format('Y-m-d'),
                'visits' => $user->stats()->where('date', $date)->count()
            ]);
        }

        return $stats;
    }

    /**
     * @param User $user
     * @param int $days
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    protected function getVisits(User $user, $days = 7)
    {
        return $user->stats()
            ->where('date', '>', now()->subDays($days)->format('Y-m-d'));
    }

    /**
     * @param User $user
     * @param int $days
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    protected function getVisitsGroupByDevice(User $user, $days = 7)
    {
        return $this->getVisits($user, $days)
            ->select('device', DB::raw('count(*) as visits'))
            ->groupBy('device');
    }

    /**
     * @param User $user
     * @param int $days
     * @return array
     * @throws \Exception
     */
    protected function getClicksStats(User $user, $days = 7)
    {
        $stats = [];
        $dates = create_date_range(now()->subDays($days)->format('Y-m-d'), now()->format('Y-m-d'));
        foreach ($dates as $date) {
            array_push($stats, [
                'date' => jdate($date)->format('Y-m-d'),
                'clicks' => $user->clicks()->where('date', $date)->count()
            ]);
        }

        return $stats;
    }

    /**
     * @param User $user
     * @param int $days
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    protected function getClicks(User $user, $days = 7)
    {
        return $user->clicks()
            ->where('date', '>', now()->subDays($days)->format('Y-m-d'));
    }

    /**
     * @param Request $request
     * @return string|null
     */
    protected function getReferer(Request $request)
    {
        $referer = $request->headers->get('referer');
        if ($referer) {
            $referer = parse_url($referer);
            if ($referer && isset($referer['host'])) {
                $referer = $referer['host'];
            }
        }

        if (!$referer) {
            $referer = 'direct';
        }

        return $referer;
    }
}
