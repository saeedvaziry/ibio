<?php

namespace App\Http\Controllers\User;

use App\Exceptions\PaymentException;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\PaymentReceived;
use App\Traits\HasStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SaeedVaziry\Payir\Exceptions\SendException;
use SaeedVaziry\Payir\Facades\Payir;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DonateController extends Controller
{
    use HasStats;

    /**
     * @param $username
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($username)
    {
        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        if (!$user->donation['active']) {
            abort(404);
        }

        return view('user.donate')->with([
            'title' => __('حمایت مالی از ') . $user->name,
            'user' => $user
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
        $request->validate([
            'amount' => 'required|numeric|min:10000|max:50000000',
            'name' => 'max:255',
            'message' => 'max:1000'
        ]);

        $user = User::query()->where('username', $username)->where('active', 1)->firstOrFail();

        if (!$user->donation['active']) {
            abort(404);
        }

        try {
            DB::beginTransaction();
            $payment = $user->payments()->create([
                'provider' => 'pay',
                'amount' => $request->amount,
                'details' => [
                    'name' => $request->name,
                    'message' => $request->message
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
            throw new PaymentException($e->getMessage());
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

        return view('user.receipt')->with([
            'success' => $request->status,
            'payment' => Payment::query()->find($payment->id)
        ]);
    }
}
