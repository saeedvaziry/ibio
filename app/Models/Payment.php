<?php

namespace App\Models;

use App\Exceptions\PaymentException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use SaeedVaziry\Payir\Facades\Payir;

class Payment extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'provider',
        'amount',
        'payment_info',
        'details',
        'payment_uid',
        'paid_at',
        'verified_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'user_id' => 'integer',
        'payment_info' => 'json',
        'details' => 'json',
        'paid_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'sender'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function stats()
    {
        return $this->morphMany('App\Models\Stat', 'statable');
    }

    /**
     * @return mixed|string|string[]
     */
    public function getPayirTokenAttribute()
    {
        return str_replace('PAYIR-', '', $this->payment_uid);
    }

    /**
     * @return string
     */
    public function payirUrl()
    {
        return 'https://pay.ir/pg/' . str_replace('PAYIR-', '', $this->payir_token);
    }

    /**
     * @return mixed|string|string[]
     */
    public function getJeebTokenAttribute()
    {
        return str_replace('JEEB-', '', $this->payment_uid);
    }

    /**
     * @return string
     */
    public function jeebUrl()
    {
        return 'https://core.jeeb.io/api/v3/payments/invoice?token=' . str_replace('JEEB-', '', $this->jeeb_token);
    }

    /**
     * @throws PaymentException
     * @throws \SaeedVaziry\Payir\Exceptions\VerifyException
     */
    public function verify()
    {
        switch ($this->provider) {
            case 'pay':
                $this->verifyPayir();
                break;
            case 'jeeb':
                $this->verifyJeeb();
                break;
        }
    }

    /**
     * @throws PaymentException
     * @throws \SaeedVaziry\Payir\Exceptions\VerifyException
     */
    private function verifyPayir()
    {
        DB::beginTransaction();
        $payment = self::query()->lockForUpdate()->find($this->id);

        try {
            if ($payment->verified_at) {
                throw new PaymentException($payment, __('این تراکنش تکراری می باشد'), false);
            }
            if (!$payment->paid_at) {
                throw new PaymentException($payment, __('این تراکنش پرداخت نشده است'));
            }
            $verify = Payir::verify($this->payir_token, $payment->user->donation['payir_api']);
            $payment->payment_info = $verify;
            $payment->verified_at = now();
            $payment->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            if (app()->environment() == 'local') {
                throw $e;
            }

            throw new PaymentException($payment, __('خطای غیر منتظره ای پیش آمده. در صورت کسر وجه از حسابتون، مبلغ نهایت تا 72 ساعت به حسابتون بازگردانده میشود.'));
        }
    }

    /**
     * @throws PaymentException
     */
    private function verifyJeeb()
    {
        DB::beginTransaction();
        $payment = self::query()->lockForUpdate()->find($this->id);

        try {
            if ($payment->verified_at) {
                throw new PaymentException($payment, __('این تراکنش تکراری می باشد'), false);
            }
            if (!$payment->paid_at) {
                throw new PaymentException($payment, __('این تراکنش پرداخت نشده است'), false);
            }

            $verifyRequest = Http::withHeaders([
                'x-api-key' => $this->user->donation['jeeb_api']
            ])->post('https://core.jeeb.io/api/v3/payments/status', [
                'token' => $this->jeeb_token
            ]);
            $response = $verifyRequest->json();
            if (!$verifyRequest->ok() || !isset($response['result'])) {
                throw new PaymentException($payment, __('خطا در تایید پرداخت'));
            }

            if (!in_array($response['result']['state'], ['PendingConfirmation', 'Completed']) || $response['result']['refund']) {
                throw new PaymentException($payment, __('پرداخت با خطا مواجه شده و یا لغو شده است'), false);
            }

            if ($response['result']['baseBtcAmount'] != $response['result']['paidBtcAmount']) {
                throw new PaymentException($payment, __('مبلغ پرداختی اشتباه می باشد'), false);
            }

            $payment->payment_info = $response['result'];
            $payment->verified_at = now();
            $payment->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            if (app()->environment() == 'local') {
                throw $e;
            }

            throw new PaymentException($payment, __('خطای غیر منتظره ای پیش آمده. لطفا با پشتیبانی در آدرس ibio.link تماس بگیرید'), false);
        }
    }

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|mixed|string|null
     */
    public function getSenderAttribute()
    {
        if (isset($this->details['name'])) {
            return $this->details['name'];
        }

        $isEn = session()->has('lang-' . $this->user_id) && session()->get('lang-' . $this->user_id) == 'en';

        return $isEn ? __('Unknown') : __('ناشناس');
    }

    /**
     * @return mixed
     */
    public function getDisplayCurrencyAttribute()
    {
        $isEn = session()->has('lang-' . $this->user_id) && session()->get('lang-' . $this->user_id) == 'en';

        switch ($this->provider) {
            case 'pay':
                return $isEn ? __('IRT') : __('تومان');
            case 'jeeb':
                return $isEn ? __('USD') : __('دلار');
        }

        return '';
    }
}
