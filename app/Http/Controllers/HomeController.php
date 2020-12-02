<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkResource;
use App\Http\Resources\PublicUserResource;
use App\Models\Link;
use App\Models\User;
use App\Traits\HasStats;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasStats;

    /**
     * @param Request $request
     * @param $username
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function user(Request $request, $username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        $this->createStat($request, $user);

        return inertia('User', [
            'title' => $user->name,
            'theUser' => new PublicUserResource($user),
            'links' => LinkResource::collection($user->links()->orderBy('order')->get())
        ]);
    }

    /**
     * @param Request $request
     * @param Link $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function go(Request $request, Link $link)
    {
        $this->createStat($request, $link);

        return redirect()->to($link->url);
    }
}
