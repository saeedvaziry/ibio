<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Route;

class Username implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $list = [];
        $routes = Route::getRoutes()->getRoutesByName();
        foreach ($routes as $key => $route) {
            $separate = explode('.', $key);
            foreach ($separate as $item) {
                array_push($list, $item);
            }
        }

        if (in_array($value, $list)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This username is not allowed, Pick another one';
    }
}
