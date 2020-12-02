<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

trait HasStats
{
    protected function createStat(Request $request, $statable)
    {
        $userAgent = new Agent();
        $userAgent->setUserAgent($request->userAgent());
        if (!$userAgent->isRobot()) {
            $statable->stats()->create([
                'device' => $userAgent->device(),
                'os' => $userAgent->platform(),
                'ip' => $request->ip(),
                'country' => ip2location_country_code(),
                'is_mobile' => $userAgent->isMobile(),
                'is_desktop' => $userAgent->isDesktop(),
                'is_tablet' => $userAgent->isTablet(),
                'user_agent' => $request->userAgent()
            ]);
        }
    }
}
