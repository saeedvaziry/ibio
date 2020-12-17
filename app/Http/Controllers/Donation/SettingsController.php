<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use App\Rules\MD5;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Exception
     */
    public function settings()
    {
        return inertia('donation/Settings', [
            'title' => __('حمایت مالی - تنظیمات'),
            'menu' => 'donation',
            'subMenu' => 'settings'
        ]);
    }

    /**
     * @param Request $request
     * @param $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Request $request, $status)
    {
        if (!$request->user()->donation['payir_api']) {
            return back()->with([
                'error' => __('برای فعال سازی ابتدا تنظیمات درگاه پرداخت رو تکمیل کنید')
            ]);
        }

        $request->user()->update([
            'donation' => [
                'active' => $status
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
     */
    public function thankYouMessage(Request $request)
    {
        $request->validateWithBag('thankYouMessage', [
            'text' => 'required|max:1000'
        ]);

        $request->user()->update([
            'donation' => [
                'thank_you_message' => $request->text
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
                'required',
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
