<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FALaravel\Google2FA;

class SettingController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('settings/Index', [
            'title' => __('Settings'),
            'menu' => 'settings'
        ]);
    }

    /**
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function password(ChangePasswordRequest $request)
    {
        if ($request->user()->password != 'not_set') {
            if (!Hash::check($request->current_password, $request->user()->password)) {
                throw ValidationException::withMessages(['current_password' => __('Current password is invalid')])
                    ->errorBag('changePassword');
            }
        }

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with([
            'success' => __('Changes saved')
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable2FA()
    {
        $qr = auth()->user()->enableTwoFactor();

        return back()->with([
            'data' => [
                'qr' => $qr
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify2FA(Request $request)
    {
        $secretKey = Cache::get('two_factor_' . $request->user()->id);
        if (!$secretKey) {
            return $this->verify2FAErrorResponse();
        }

        $validator = Validator::make($request->input(), [
            'code' => 'required|numeric|digits:6'
        ]);
        if ($validator->fails()) {
            return $this->verify2FAErrorResponse($secretKey);
        }

        $verify = $request->user()->verifyTwoFactor($secretKey, $request->code);
        if (!$verify) {
            return $this->verify2FAErrorResponse($secretKey);
        }

        $twoFactor = new Google2FA($request);
        $twoFactor->login();

        return back()->with([
            'success' => __('2FA enabled')
        ]);
    }

    /**
     * @param null $secretKey
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function verify2FAErrorResponse($secretKey = null)
    {
        if (!$secretKey) {
            return back()->withErrors([
                '2fa' => __('Verification timeout!')
            ], 'verify2FA');
        }

        return back()
            ->withErrors(['2fa' => __('Invalid code')], 'verify2FA')
            ->with([
                'data' => [
                    'qr' => auth()->user()->enableTwoFactor($secretKey)
                ]
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function disable2FA(Request $request)
    {
        $this->validateWithBag('disable2FA', $request, [
            'code' => 'required|numeric|digits:6'
        ]);

        $verify = $request->user()->verifyTwoFactor($request->user()->two_factor_secret, $request->code);
        if (!$verify) {
            throw ValidationException::withMessages(['2fa' => __('Invalid code!')])
                ->errorBag('verify2FA');
        }

        $request->user()->disableTwoFactor();

        return back()->with([
            'success' => __('2FA disabled')
        ]);
    }

    /**
     * @param Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Exception
     */
    public function deleteAccount(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->user()->delete();
            DB::commit();

            auth()->logout();

            return $this->index();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
