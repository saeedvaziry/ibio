<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PragmaRX\Google2FALaravel\Google2FA;

class VerifyLoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function verify(Request $request)
    {
        if (!$request->user()->two_factor_enabled) {
            abort(404);
        }

        $this->validate($request, [
            'code' => 'required|numeric|digits:6'
        ]);

        $verify = $request->user()->verifyTwoFactor($request->user()->two_factor_secret, $request->code);
        if (!$verify) {
            throw ValidationException::withMessages(['2fa' => __('Invalid code!')]);
        }

        $twoFactor = new Google2FA($request);
        $twoFactor->login();

        return redirect()->back();
    }
}
