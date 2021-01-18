<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use App\Rules\MD5;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CryptoGatewaySettingsController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Exception
     */
    public function index()
    {
        return inertia('donation/CryptoGatewaySettings', [
            'title' => __('حمایت مالی - تنظیمات درگاه کریپتو'),
            'menu' => 'donation',
            'subMenu' => 'gateway-crypto'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function amounts(Request $request)
    {
        $request->validateWithBag('amounts', [
            'amounts.*' => 'numeric|min:1'
        ]);

        $request->user()->update([
            'donation' => [
                'amounts_usd' => array_unique($request->amounts)
            ]
        ]);

        return back()->with([
            'success' => __('ذخیره شد')
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function jeebApi(Request $request)
    {
        $request->user()->update([
            'donation' => [
                'jeeb_api' => $request->jeeb_api
            ]
        ]);

        return back()->with([
            'success' => __('ذخیره شد')
        ]);
    }
}
