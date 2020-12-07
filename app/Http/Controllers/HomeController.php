<?php

namespace App\Http\Controllers;

use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Models\User;
use App\Traits\HasStats;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HasStats;

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function privacy()
    {
        return view('home.privacy');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function terms()
    {
        return view('home.terms');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function cookie()
    {
        return view('home.cookie');
    }

    /**
     * @param Request $request
     * @param $username
     * @return \Illuminate\Contracts\View\Factory
     */
    public function user(Request $request, $username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        $this->createStat($request, $user);

        return view('user')->with([
            'title' => $user->name,
            'user' => $user,
            'links' => LinkResource::collection($user->pageLinks()->orderBy('order')->get()),
            'socialLinks' => LinkResource::collection($user->socialLinks),
            'contactLinks' => LinkResource::collection($user->contactLinks),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function go(Request $request)
    {
        $link = Link::query()->findOrFail(decrypt_string(config('links.key'), $request->link));

        $this->createStat($request, $link);

        return redirect()->to($link->generate());
    }
}
