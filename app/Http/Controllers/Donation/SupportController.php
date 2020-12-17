<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * @param Request $request
     * @param Payment|null $payment
     * @return \Inertia\Response|\Inertia\ResponseFactory
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request, Payment $payment = null)
    {
        if ($payment) {
            $this->authorize('view', $payment);
        }

        $payments = $request->user()->successPayments()->orderBy('id', 'desc')->simplePaginate(15);

        return inertia('donation/Supports', [
            'title' => __('حمایت مالی - حمایت های انجام شده'),
            'menu' => 'donation',
            'subMenu' => 'supports',
            'payments' => PaymentResource::collection($payments),
            'payment' => $payment ? new PaymentResource($payment) : null
        ]);
    }
}
