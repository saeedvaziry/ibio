<?php

namespace App\Http\Controllers\PageSettings;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        $socialMedias = config('links.social_medias');
        $havingItems = [];
        $notHavingItems = [];
        foreach ($socialMedias as $key => $socialMedia) {
            $link = auth()->user()->socialLinks()->where('title', $socialMedia['value'])->first();
            if ($link) {
                $socialMedia['link'] = new LinkResource($link);
                array_push($havingItems, $socialMedia);
            } else {
                array_push($notHavingItems, $socialMedia);
            }
        }
        return inertia('page-settings/social-media/Index', [
            'title' => __('Page settings - Social media'),
            'menu' => 'page-settings',
            'subMenu' => 'social-media',
            'socialMedias' => array_merge($havingItems, $notHavingItems)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validateWithBag('add', [
            'media' => 'required'
        ]);

        $link = $request->user()->socialLinks()->where('title', $request->media)->first();
        if ($link) {
            if ($request->url) {
                $link->update([
                    'url' => $request->url
                ]);
            } else {
                $link->delete();
            }
        } else {
            $request->validateWithBag('add', [
                'url' => 'required'
            ]);
            $request->user()->socialLinks()->create([
                'type' => 'social',
                'title' => $request->media,
                'url' => $request->url
            ]);
        }

        return back()->with([
            'success' => __('Link added')
        ]);
    }
}
