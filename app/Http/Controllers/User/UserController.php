<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Models\User;
use App\Traits\HasStats;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use HasStats;

    /**
     * @param Request $request
     * @param $username
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index(Request $request, $username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        $this->createStat($request, $user);

        $lang = $request->session()->get('lang');
        if ($request->l && in_array($request->l, ['fa', 'en'])) {
            $lang = $request->l;
        }
        if (!$lang) {
            $lang = 'fa';
        }
        $request->session()->put('lang', $lang);

        return view('user.index')->with([
            'title' => $user->name,
            'user' => $user,
            'links' => LinkResource::collection($user->pageLinks()->orderBy('order')->get()),
            'socialLinks' => LinkResource::collection($user->socialLinks),
            'contactLinks' => LinkResource::collection($user->contactLinks),
            'isEn' => $lang === 'en'
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
