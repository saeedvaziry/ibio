<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkFullStatResource;
use App\Http\Resources\LinkStatResource;
use App\Models\Link;
use App\Traits\HasStats;

class StatController extends Controller
{
    use HasStats;

    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function visits()
    {
        return inertia('stats/Visits', [
            'title' => __('Stats - Visits'),
            'menu' => 'stats',
            'subMenu' => 'visits',
            'visitsByDevice' => $this->getVisitsGroupByDevice(auth()->user())->get()
        ]);
    }

    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function clicks()
    {
        return inertia('stats/Clicks', [
            'title' => __('Stats - Clicks'),
            'menu' => 'stats',
            'subMenu' => 'clicks',
            'links' => LinkStatResource::collection(auth()->user()->links)
        ]);
    }

    /**
     * @param Link $link
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function showLink(Link $link)
    {
        $this->authorize('view', $link);

        return inertia('stats/Clicks', [
            'title' => __('Stats - ') . $link->title,
            'menu' => 'stats',
            'subMenu' => 'clicks',
            'links' => LinkStatResource::collection(auth()->user()->links),
            'link' => new LinkFullStatResource($link)
        ]);
    }
}
