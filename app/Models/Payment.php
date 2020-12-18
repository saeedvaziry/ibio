<?php

namespace App\Models;

use App\Exceptions\PaymentException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
     * @throws PaymentException
     * @throws \SaeedVaziry\Payir\Exceptions\VerifyException
     */
    public function verify()
    {
        switch ($this->provider) {
            case 'pay':
                $this->verifyPayir();
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
            $verify = Payir::verify($this->payir_token);
            $payment->payment_info = $verify;
            $payment->verified_at = now();
            $payment->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;

            throw new PaymentException($payment, __('خطای غیر منتظره ای پیش آمده. در صورت کسر وجه از حسابتون، مبلغ نهایت تا 72 ساعت به حسابتون بازگردانده میشود.'));
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

        return __('ناشناس');
    }
}
