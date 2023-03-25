<?php

namespace App\Http\Middleware;

use App\Exceptions\CrawlerDetectException;
use Closure;
use Illuminate\Http\Request;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class BlockCrawlers
{
    /**
     * @throws CrawlerDetectException
     */
    public function handle(Request $request, Closure $next)
    {
        $crawlerDetect = new CrawlerDetect;
        if (! $crawlerDetect->isCrawler($request->userAgent())) {
            return $next($request);
        }

        throw new CrawlerDetectException();
    }
}
