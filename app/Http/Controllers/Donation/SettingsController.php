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
            return redirect()->route('donation.settings')->with([
                'error' => __('برای فعال سازی ابتدا تنظیمات درگاه ریالی یا کریپتو رو تکمیل کنید')
            ]);
        }

        $request->user()->update([
            'donation' => [
                'active' => boolval($status)
            ]
        ]);

        return back()->with([
            'success' => __('ذخیره شد')
        ]);
    }

    /**
     * @param Request $request
     * @param $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function supportersStatus(Request $request, $status)
    {
        $request->user()->update([
            'donation' => [
                'show_supporters' => boolval($status)
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
     */
    public function thankYouMessageEn(Request $request)
    {
        $request->validateWithBag('thankYouMessageEn', [
            'text' => 'required|max:1000'
        ]);

        $request->user()->update([
            'donation' => [
                'thank_you_message_en' => $request->text
            ]
        ]);

        return back()->with([
            'success' => __('ذخیره شد')
        ]);
    }
}
