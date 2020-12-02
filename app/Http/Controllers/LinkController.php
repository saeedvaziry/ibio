<?php

namespace App\Http\Controllers;

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

        return inertia('links/Index', [
            'title' => __('Links'),
            'menu' => 'links',
            'links' => LinkResource::collection(auth()->user()->links()->orderBy('order')->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Link::class);

        return inertia('links/Create', [
            'title' => __('Create new link'),
            'menu' => 'links',
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
            // $request->user()->links()->create(array_merge($request->validated(), [
            //     'avatar' => $this->uploadImage($request, 'avatar', 'public')
            // ]));

            $lastLink = $request->user()->links()->orderBy('order', 'desc')->first();
            $request->user()->links()->create(array_merge($request->validated(), [
                'order' => $lastLink ? $lastLink->order + 1 : 1
            ]));

            return redirect()->route('links')->with([
                'success' => __('Link created')
            ]);
        } catch (\Exception $e) {
            // $this->rollbackUpload();

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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Link $link
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Link $link)
    {
        $this->authorize('update', $link);

        return inertia('links/Edit', [
            'title' => __('Edit link'),
            'menu' => 'links',
            'link' => new LinkResource($link)
        ]);
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

        return redirect()->route('links')->with([
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

        return redirect()->route('links')->with([
            'success' => __('Link deleted')
        ]);
    }
}
