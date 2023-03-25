<?php

namespace App\Http\Controllers;

use App\Actions\Links\CreateLink;
use App\Actions\Links\DeleteLink;
use App\Actions\Links\DeleteThumbnail;
use App\Actions\Links\UpdateLink;
use App\Actions\Links\UpdateSort;
use App\Actions\Links\UpdateThumbnail;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Throwable;

class LinkController extends Controller
{
    public function index(): Response
    {
        return inertia('Links/Index', [
            'title' => __('Links'),
            'preview' => true,
            'links' => LinkResource::collection(
                $this->getUser()
                    ->links()
                    ->whereIn('type', config('links.types_when_creating'))
                    ->orderBy('sort')
                    ->get()
            ),
            'linkTypes' => config('links.types_when_creating'),
        ]);
    }

    public function store(): RedirectResponse
    {
        app(CreateLink::class)->create($this->getUser());

        return redirect()->route('links');
    }

    public function updateSort(): RedirectResponse
    {
        app(UpdateSort::class)->update($this->getUser(), request()->input());

        return redirect()->route('links');
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Link $link): RedirectResponse
    {
        $this->authorize('update', $link);

        app(UpdateLink::class)->update($link, request()->input());

        return redirect()->route('links');
    }

    /**
     * @throws AuthorizationException
     */
    public function updateData(Link $link, $field): RedirectResponse
    {
        $this->authorize('update', $link);

        $link->type()->updateData(request()->input(), $field);

        return redirect()->route('links');
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(Link $link): RedirectResponse
    {
        $this->authorize('delete', $link);

        app(DeleteLink::class)->delete($link);

        return redirect()->route('links');
    }

    /**
     * @throws AuthorizationException|Throwable
     */
    public function updateThumbnail(Link $link): RedirectResponse
    {
        $this->authorize('update', $link);

        app(UpdateThumbnail::class)->update($link);

        return redirect()->route('links');
    }

    /**
     * @throws AuthorizationException|Throwable
     */
    public function deleteThumbnail(Link $link): RedirectResponse
    {
        $this->authorize('update', $link);

        app(DeleteThumbnail::class)->delete($link);

        return redirect()->route('links');
    }
}
