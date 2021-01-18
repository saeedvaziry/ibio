<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Donation implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return $this->defaultValue(json_decode($value, true));
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        $current = $this->defaultValue($model->donation);

        return json_encode([
            'active' => isset($value['active']) ? $value['active'] : $current['active'],
            'show_supporters' => isset($value['show_supporters']) ? $value['show_supporters'] : $current['show_supporters'],
            'thank_you_message' => isset($value['thank_you_message']) ? $value['thank_you_message'] : $current['thank_you_message'],
            'thank_you_message_en' => isset($value['thank_you_message_en']) ? $value['thank_you_message_en'] : $current['thank_you_message_en'],
            'amounts' => isset($value['amounts']) ? $this->clearAmounts($value['amounts']) : $this->clearAmounts($current['amounts']),
            'amounts_usd' => isset($value['amounts_usd']) ? $this->clearAmounts($value['amounts_usd']) : $this->clearAmounts($current['amounts_usd']),
            'payir_api' => isset($value['payir_api']) ? $value['payir_api'] : $current['payir_api'],
            'jeeb_api' => isset($value['jeeb_api']) ? $value['jeeb_api'] : $current['jeeb_api'],
        ]);
    }

    /**
     * @param $donation
     * @return array
     */
    protected function defaultValue($donation)
    {
        if (isset($donation['amounts']) && is_array($donation['amounts'])) {
            asort($donation['amounts']);
        }

        return [
            'active' => isset($donation['active']) && $donation['active'],
            'show_supporters' => isset($donation['show_supporters']) ? $donation['show_supporters'] : true,
            'thank_you_message' => isset($donation['thank_you_message']) ? $donation['thank_you_message'] : __('خیلی ممنون بابت حمایتتون ❤️'),
            'thank_you_message_en' => isset($donation['thank_you_message_en']) ? $donation['thank_you_message_en'] : __('Thanks for your support ❤️'),
            'amounts' => isset($donation['amounts']) ? $donation['amounts'] : [10000, 30000, 50000, 100000],
            'amounts_usd' => isset($donation['amounts_usd']) ? $donation['amounts_usd'] : [1, 3, 5, 10],
            'payir_api' => isset($donation['payir_api']) ? $donation['payir_api'] : '',
            'jeeb_api' => isset($donation['jeeb_api']) ? $donation['jeeb_api'] : '',
        ];
    }

    /**
     * @param array $amounts
     * @return array
     */
    private function clearAmounts(array $amounts)
    {
        foreach ($amounts as $key => $amount) {
            $amounts[$key] = str_replace(',', '', $amount);
        }

        return $amounts;
    }
}
