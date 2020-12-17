<?php

namespace App\Exceptions;

use App\Models\Payment;
use Exception;

class PaymentException extends Exception
{
    /**
     * @var Payment
     */
    protected $payment;

    protected $retry;

    /**
     * PaymentException constructor.
     * @param Payment $payment
     * @param $message
     * @param bool $retry
     */
    public function __construct(Payment $payment, $message, $retry = true)
    {
        $this->payment = $payment;
        $this->retry = $retry;

        parent::__construct($message);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('user.receipt')->with([
            'success' => false,
            'payment' => $this->payment,
            'error' => $this->getMessage(),
            'retry' => $this->retry
        ]);
    }
}
