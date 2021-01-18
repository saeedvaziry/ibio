<?php

namespace App\Http\Controllers\User;

use App\Exceptions\PaymentException;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\PaymentReceived;
use App\Traits\HasStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Facades\Payir;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DonateController extends Controller
{
    use HasStats;

    /**
     * @param Request $request
     * @param $username
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, $username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        if (!$user->donation['active']) {
            abort(404);
        }

        return view('user.donate')->with([
            'title' => __('حمایت مالی از ') . $user->name,
            'user' => $user,
            'isEn' => $this->getLang($user, $request) === 'en'
        ]);
    }

    /**
     * @param Request $request
     * @param $username
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function supporters(Request $request, $username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        if (!$user->donation['active'] || !$user->donation['show_supporters']) {
            abort(404);
        }

        return view('user.supporters')->with([
            'title' => __('لیست حامیان ') . $user->name,
            'user' => $user,
            'payments' => $user->successPayments()->orderBy('id', 'desc')->get(),
            'isEn' => $this->getLang($user, $request) === 'en'
        ]);
    }


    /**
     * @param Request $request
     * @param $username
     * @return \Illuminate\Http\RedirectResponse
     * @throws PaymentException
     * @throws SendException
     */
    public function donate(Request $request, $username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        if ($this->getLang($user, $request) === 'en') {
            App::setLocale('en');
        }

        if ($request->type == 'irr') {
            return $this->donateIRR($request, $user);
        }

        if ($request->type == 'crypto') {
            return $this->donateCrypto($request, $user);
        }

        abort(404);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws PaymentException
     * @throws SendException
     */
    public function donateIRR(Request $request, User $user)
    {
        $request->validateWithBag('irr', [
            'irr_amount' => 'required|numeric|min:10000|max:50000000',
            'irr_name' => 'max:255',
            'irr_message' => 'max:1000'
        ]);

        if (!$user->donation['active']) {
            abort(404);
        }

        try {
            DB::beginTransaction();
            $payment = $user->payments()->create([
                'provider' => 'pay',
                'amount' => $request->irr_amount,
                'details' => [
                    'name' => $request->irr_name,
                    'message' => $request->irr_message
                ],
            ]);
            // send to provider
            $paymentRequest = Payir::send(
                $payment->amount * 10,
                route('user.donate.callback', [
                    'username' => $user->username,
                    'provider' => 'payir',
                    'payment' => $payment->id
                ]),
                $payment->id,
                null,
                $request->message,
                $user->donation['payir_api'],
            );

            // update payment
            $payment->payment_uid = 'PAYIR-' . $paymentRequest['token'];
            $payment->save();

            DB::commit();

            return redirect()->to($payment->payirUrl());
        } catch (SendException $e) {
            throw new PaymentException($payment, $e->getMessage());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws PaymentException
     */
    public function donateCrypto(Request $request, User $user)
    {
        $request->validateWithBag('irr', [
            'crypto_amount' => 'required|numeric|min:1|max:1000',
            'crypto_name' => 'max:255',
            'crypto_message' => 'max:1000'
        ]);

        if (!$user->donation['active']) {
            abort(404);
        }

        try {
            DB::beginTransaction();
            $payment = $user->payments()->create([
                'provider' => 'jeeb',
                'amount' => $request->crypto_amount,
                'details' => [
                    'name' => $request->crypto_name,
                    'message' => $request->crypto_message
                ],
            ]);
            // send to provider
            $paymentRequest = Http::withHeaders([
                'x-api-key' => $user->donation['jeeb_api']
            ])->post('https://core.jeeb.io/api/v3/payments/issue', [
                'baseCurrencyId' => 'USD',
                'baseAmount' => $payment->amount,
                'orderNo' => $payment->id,
                'language' => app()->getLocale(),
                'callbackUrl' => route('user.donate.callback', [
                    'username' => $user->username,
                    'provider' => 'jeeb',
                    'payment' => $payment->id
                ]),
                'allowTestNets' => app()->environment() !== 'production'
            ]);
            $response = $paymentRequest->json();

            if (!$paymentRequest->ok() || !isset($response['result'])) {
                if ($paymentRequest->status() == 401) {
                    throw new PaymentException($payment, __('API-KEY جیب اشتباه می باشد'), false);
                }

                throw new PaymentException($payment, __('خطا در ایجاد پرداخت'), false);
            }

            // update payment
            $payment->payment_uid = 'JEEB-' . $response['result']['token'];
            $payment->save();

            DB::commit();

            return redirect()->to($payment->jeebUrl());
        } catch (SendException $e) {
            throw new PaymentException($payment, $e->getMessage());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param Request $request
     * @param $username
     * @param $provider
     * @param Payment $payment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function callback(Request $request, $username, $provider, Payment $payment)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        if (!$user->donation['active']) {
            throw new NotFoundHttpException();
        }

        switch ($provider) {
            case 'payir':
                return $this->handlePayirCallback($request, $payment);
            case 'jeeb':
                return $this->handleJeebCallback($request, $payment);
        }

        throw new NotFoundHttpException();
    }

    /**
     * @param Request $request
     * @param Payment $payment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    protected function handlePayirCallback(Request $request, Payment $payment)
    {
        if ($request->token != $payment->payir_token) {
            throw new NotFoundHttpException();
        }

        if ($request->status == 1 && !$payment->paid_at) {
            $payment->paid_at = now();
            $payment->save();
        }

        if ($request->status == 1 && $payment->paid_at) {
            $payment->verify();

            $this->createStat($request, $payment);

            $payment->user->notify(new PaymentReceived($payment));
        }

        $payment = Payment::query()->find($payment->id);

        return view('user.receipt')->with([
            'success' => $payment->verified_at,
            'payment' => $payment,
            'isEn' => $this->getLang($payment->user, $request) === 'en'
        ]);
    }

    /**
     * @param Request $request
     * @param Payment $payment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    protected function handleJeebCallback(Request $request, Payment $payment)
    {
        if ($request->orderNo != $payment->id) {
            throw new NotFoundHttpException();
        }

        if ($request->state == 'PendingConfirmation' && $request->refund === 'false' && !$payment->paid_at) {
            $payment->paid_at = now();
            $payment->save();
        }

        if ($request->state == 'PendingConfirmation' && $request->refund === 'false' && $payment->paid_at) {
            $payment->verify();

            $this->createStat($request, $payment);

            $payment->user->notify(new PaymentReceived($payment));
        }

        $payment = Payment::query()->find($payment->id);

        return view('user.receipt')->with([
            'success' => $payment->verified_at,
            'payment' => $payment,
            'isEn' => $this->getLang($payment->user, $request) === 'en'
        ]);
    }
}
