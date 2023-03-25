<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkResource;
use App\LinkTypes\Social;
use App\Models\Link;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class SocialLinkController extends Controller
{
    public function index(): Response
    {
        return inertia('SocialLinks/Index', [
            'title' => __('Social Links'),
            'preview' => true,
            'links' => LinkResource::collection(
                $this->getUser()->socialLinks()->where('is_active', 1)->get()
            ),
            'platforms' => Social::PLATFORMS,
        ]);
    }

    public function store(): RedirectResponse
    {
        $link = new Link();
        $link->type = 'Social';

        request()->validateWithBag('socialLink', $link->type()->rules());

        $link->user_id = $this->getUser()->id;
        $link->data = [
            'platform' => request()->input('platform'),
            'url' => request()->input('url'),
        ];
        $link->sort = 0;
        $link->is_active = true;
        $link->save();

        return back();
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(Link $link): RedirectResponse
    {
        $this->authorize('delete', $link);

        $link->delete();

        return back();
    }
}
