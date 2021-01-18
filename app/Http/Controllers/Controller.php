<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param User $user
     * @param Request $request
     * @return mixed|string
     */
    protected function getLang(User $user, Request $request)
    {
        $lang = $request->session()->get('lang-' . $user->id);
        if ($request->l && in_array($request->l, ['fa', 'en'])) {
            $lang = $request->l;
        }
        if (!$lang) {
            $lang = 'fa';
        }
        $request->session()->put('lang-' . $user->id, $lang);

        return $lang;
    }
}
