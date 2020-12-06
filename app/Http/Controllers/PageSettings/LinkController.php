<?php

namespace App\Http\Controllers\PageSettings;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkStoreRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny', Link::class);

        return inertia('page-settings/links/Index', [
            'title' => __('Links'),
            'menu' => 'page-settings',
            'subMenu' => 'links',
            'links' => LinkResource::collection(auth()->user()->pageLinks()->orderBy('order')->get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LinkStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function store(LinkStoreRequest $request)
    {
        $this->authorize('create', Link::class);

        try {
            $lastLink = $request->user()->links()->orderBy('order', 'desc')->first();
            $request->user()->links()->create(array_merge($request->validated(), [
                'order' => $lastLink ? $lastLink->order + 1 : 1
            ]));

            return redirect()->route('page-settings.links')->with([
                'success' => __('Link created')
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function sort(Request $request)
    {
        foreach ($request->links as $key => $link) {
            $link = $request->user()->links()->findOrFail($link['id']);
            $this->authorize('update', $link);
            $link->order = $key + 1;
            $link->save();
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LinkStoreRequest $request
     * @param \App\Models\Link $link
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(LinkStoreRequest $request, Link $link)
    {
        $this->authorize('update', $link);

        $link->update($request->validated());

        return redirect()->route('page-settings.links')->with([
            'success' => __('Link updated')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Link $link
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Link $link)
    {
        $this->authorize('delete', $link);

        $link->delete();

        return redirect()->route('page-settings.links')->with([
            'success' => __('Link deleted')
        ]);
    }
}
