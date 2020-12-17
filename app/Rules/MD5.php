<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MD5 implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-f0-9]{32}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __(':attributes وارد شده اشتباه می باشد');
    }
}
