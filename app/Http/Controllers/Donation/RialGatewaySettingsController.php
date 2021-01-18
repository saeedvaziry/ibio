<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use App\Rules\MD5;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RialGatewaySettingsController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Exception
     */
    public function index()
    {
        return inertia('donation/RialGatewaySettings', [
            'title' => __('حمایت مالی - تنظیمات درگاه ریالی'),
            'menu' => 'donation',
            'subMenu' => 'gateway-rial'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function amounts(Request $request)
    {
        $request->validateWithBag('amounts', [
            'amounts.*' => 'numeric|min:10000|max:50000000'
        ]);

        $request->user()->update([
            'donation' => [
                'amounts' => array_unique($request->amounts)
            ]
        ]);

        return back()->with([
            'success' => __('ذخیره شد')
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function payApi(Request $request)
    {
        if ($request->payir_api == 'test') {
            throw ValidationException::withMessages(['payir_api' => __('امکان استفاده از درگاه تست شبکه پرداخت پِی وجود ندارد ')])
                ->errorBag('payApi');
        }

        $request->validateWithBag('payApi', [
            'payir_api' => [
                new MD5()
            ]
        ]);

        $request->user()->update([
            'donation' => [
                'payir_api' => $request->payir_api
            ]
        ]);

        return back()->with([
            'success' => __('ذخیره شد')
        ]);
    }
}
